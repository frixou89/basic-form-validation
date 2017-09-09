<?php
/**
* Translations class
*/
class T
{
	/**
	 * Returns a translated string
	 * @param string $text The string to translate
	 * @param string $lang The language code
	 * @return string The translated string
	 */
	public static function trn($text, $lang) {
		$messagesDIR = '../messages/';
		$file = $messagesDIR . $lang .'.php';
		if (!file_exists($file)) {   
			return $text;                         
		}

		$messages = require($file);

		if (isset($messages[$text]) && !empty($messages[$text])) {
			return $messages[$text];
		}

		// Fallback
		return $text;
	}
}