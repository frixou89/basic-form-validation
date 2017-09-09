<?php
require_once 'DB.php';

/**
* Class Form contains form functions
*/
class Form
{

	const TYPE_INDIVIDUAL = 1;
	const TYPE_COMPANY = 2;
	/**
	 * Checks if a value exists in the $_POST request and returns it
	 * @param string $name The input name
	 * @return string|null
	 */
	public static function getValue($name) {
		if (isset($_POST[$name])) {
			return $_POST[$name];
		} else {
			return null;
		}
	}

	/**
	 * Validates form
	 * @return bool|array Returns true if form is valid or an array with error messages if invalid
	 */
	public static function validate() {
		$values = self::getValues();
	 	$errors = [];

	 	// Get options from database
		$db = new Db();
		$optionsClientTypes = $db->select("SELECT * FROM `client_type`;");
		$optionsTitles = $db->select("SELECT * FROM `title`;");
		$optionsCountries = $db->select("SELECT * FROM `country`;");

		if (empty($values['title_id'])) { $errors['title_id'] = 'Please enter a title'; }
		// Check if title_id exists in the database
		if ($values['title_id'] && !in_array($values['title_id'], array_values(array_column($optionsTitles, 'id')))) {
			$errors['title_id'] = 'Not a valid title';
		}
		if (empty($values['firstname'])) { $errors['firstname'] = 'Please enter your name'; }
		if (empty($values['dob'])) { $errors['dob'] = 'Please enter your date of birth'; }
		// Check if older than 18
		if ($values['dob'] && (time() < strtotime('+18 years', strtotime($values['dob']))) ) {
        	$errors['dob'] = 'You have to be older than 18 years old!'; 
		}
		if (empty($values['client_type'])) { $errors['client_type'] = 'Please select a type'; }
		// Check if client_type exists in the database
		if ($values['client_type'] && !in_array($values['client_type'], array_values(array_column($optionsClientTypes, 'id')))) {
			$errors['client_type'] = 'Not a valid client type';
		}
		// Validate company details if client_type is set
		if ($values['client_type'] == self::TYPE_COMPANY) {
			if (empty($values['company_phone'])) { $errors['company_phone'] = 'Please enter a company phone'; }
			if (empty($values['company_name'])) { $errors['company_name'] = 'Please enter a company name'; }
			if (empty($values['company_country'])) { $errors['company_country'] = 'Please enter a country'; }
		}
		if (empty($values['country_id'])) { $errors['country_id'] = 'Please enter a country'; }
		// Check if country_id exists in the database
		if ($values['country_id'] && !in_array($values['country_id'], array_values(array_column($optionsCountries, 'id')))) {
			$errors['country_id'] = 'Not a valid country';
		}
		if (empty($values['surname'])) { $errors['surname'] = 'Please enter your surname'; }
		if (empty($values['phone'])) { $errors['phone'] = 'Please enter your phone'; }
		if (empty($values['email'])) { $errors['email'] = 'Please enter your email'; }
		if (empty($values['confirm-email'])) { $errors['confirm-email'] = 'Please confirm your email'; }
		// Make Sure emails match
		if ($values['email'] !== $values['confirm-email']) { 
			$errors['confirm-email'] = 'Emails do not match';
		}

		// Allow only latin characters
		foreach ($values as $key => $value) {
			if (preg_match('/[^\\p{Common}\\p{Latin}]/u', $value)) {
				$errors[$key] = 'Only latin characters are allowed';
			}
			
		}

		if ($errors) {
			return $errors;
		} else {
			return true;
		}
	}

	/**
	 * Saves form input to database
	 */
	public static function save() {
		// Connect to database
		$db = new Db();
		// Get values
		$values = self::getValues();
		// Unset values we don't want to save in database
		unset($values['confirm-email']);
		// Set additional database fields (not included in the form)
		date_default_timezone_set('Europe/Athens'); // Set timezone to our timezone
		$values['created_at'] = date('Y-m-d H:i:s');

		// Quote and escape form submitted values
		foreach ($values as $key => $value) {
			// Change date of birth to mysql format
			if ($key == 'dob') {
				$value = date('Y-m-d H:i:s', strtotime($value));
			}
			$values[$key] = $db->quote($value);
		}

		// Get fields from array keys into string
		$fields = implode(',', array_keys($values));
		// Get entries from array values into string
		$entries = implode(',', array_values($values));
		// Insert the values into the database
		$result = $db->query("INSERT INTO `requests` ($fields) VALUES ($entries)");
		
		// Check if row was inserted to the database
		if($result !== false) {
			// Send email to user
		    $to = $values['email'];
		    // $to = 'test@localhost';
			$subject = 'Your enquiry has been received';

			// Get Title
			$title_id = $values['title_id'];
			$titleQuery = $db->select("SELECT `name` FROM `title` where `id` = $title_id;");
			$titleStr = $titleQuery[0]['name'];

			// Get full name
			$fullname = str_replace("'", "", $values['firstname']) . ' ' . str_replace("'", "", $values['surname']);

			// Compose message
			$message = "Dear $titleStr $fullname, You have successfully asked for more information";

			$headers = 'From: test@localhost' . "\r\n" .
			    'Reply-To: test@localhost' . "\r\n" .
			    'X-Mailer: PHP/' . phpversion();

			mail($to, $subject, $message, $headers);
		}
	}

	/**
	 * Returns an error message
	 * @param array|bool $validation Array containing validation messages or TRUE if none
	 * @param string $name The field name to return error messages for
	 * @return string|null
	 */
	public static function getError($validation, $name) {
		// Don't return any error messages if validation is true
		if ($validation === true) {
			return null;
		}
		// Return validation error message
		if (isset($validation[$name])) {
			return $validation[$name];
		} else {
			return null;
		}
	}

	/**
	 * Returns values from post request
	 * @return array The set values
	 */
	protected static function getValues() 
	{
		$values = [
			'title_id' => isset($_POST['title_id']) ? $_POST['title_id'] : null,
			'firstname' => isset($_POST['firstname']) ? $_POST['firstname'] : null,
			'dob' => isset($_POST['dob']) ? $_POST['dob'] : null,
			'client_type' => isset($_POST['client_type']) ? $_POST['client_type'] : null,
			'company_phone' => isset($_POST['company_phone']) ? $_POST['company_phone'] : null,
			'country_id' => isset($_POST['country_id']) ? $_POST['country_id'] : null,
			'surname' => isset($_POST['surname']) ? $_POST['surname'] : null,
			'phone' => isset($_POST['phone']) ? $_POST['phone'] : null,
			'company_name' => isset($_POST['company_name']) ? $_POST['company_name'] : null,
			'company_country' => isset($_POST['company_country']) ? $_POST['company_country'] : null,
			'email' => isset($_POST['email']) ? $_POST['email'] : null,
			'confirm-email' => isset($_POST['confirm-email']) ? $_POST['confirm-email'] : null,
		];
		
		return $values;
	}
}