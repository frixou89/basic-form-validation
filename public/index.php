<?php 
require_once '../controllers/Form.php';
require_once '../controllers/options.php';
require_once '../controllers/T.php';

$errors = [];
$validation = false;
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 	 // Handle form submission
	 $validation = Form::validate();
	 if ($validation === true) {
	 	Form::save();
	 }
 }

 // Switch language from ?lang= get param
 if (isset($_GET['lang'])) {
	$lang = $_GET['lang'];
 } else {
 	$lang = 'en';
 }
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tickmill Test</title>

	<!-- Bootstrap -->
	<link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Plugins -->
	<link href="plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">	
	<!-- Custom -->
	<link href="css/custom.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<?= strtoupper($lang) ?> <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="/index.php?lang=el">Ελληνικά</a></li>
							<li><a href="/index.php?lang=en">English</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	<div class="pull-right"></div>
	<h1 class="text-center"><?= T::trn('Enquiry Form', $lang) ?></h1>
	<?php if ($validation === true): ?>
		<div class="container">
			<div class="alert alert-success">
				<h4 class="text-center"><?= T::trn('We have received your request! A representative will contact you soon...', $lang) ?></h4 class="text-center">
			</div>
		</div>
	<?php else: ?>
	<form id="form-test" class="form-test" autocomplete="off" method="post" action="index.php">
		<H2 class="form-heading text-center"><?= T::trn('WANT TO KNOW MORE', $lang) ?></H2>
		<div class="row">

			<div class="col-md-6">
				<!-- Title -->
				<div class="form-group">
					<label for="input-title"><?= T::trn('Title', $lang) ?>:</label>
					<?php $titleSelection = Form::getValue('title_id'); ?>
					<select class="form-control" name="title_id" id="input-title">
						<option value=""><?= T::trn('Select your title', $lang) ?></option>
						<?php foreach ($optionsTitles as $title): ?>
						<option value="<?= $title['id'] ?>" <?= ($titleSelection == $title['id']) ? 'selected' : '' ?>>
							<?= T::trn($title['name'], $lang) ?>
						</option>
						<?php endforeach ?>
					</select>
					<div class="error text-danger"><?= Form::getError($validation, 'title_id') ?></div>
				</div>
				<!-- First Name -->
				<div class="form-group">
					<label for="input-firstname"><?= T::trn('Name', $lang) ?>:</label>
					<input type="text" class="form-control" value="<?= Form::getValue('firstname') ?>" name="firstname" id="input-firstname">
					<div class="error text-danger"><?= Form::getError($validation, 'firstname') ?></div>
				</div>
				<!-- D.O.B-->
				<div class="form-group">
					<label for="input-dob"><?= T::trn('Date of birth', $lang) ?>:</label>
					<div class="input-group date" data-provide="datepicker">
					    <input type="text" value="<?= Form::getValue('dob') ?>" name="dob" class="form-control" id="input-dob">
					    <div class="input-group-addon">
					        <span class="glyphicon glyphicon-th"></span>
					    </div>
					</div>
					<div class="error text-danger"><?= Form::getError($validation, 'dob') ?></div>
				</div>
				<!-- Client Type -->
				<div class="form-group">
					<label for="input-client-type"><?= T::trn('Client Type', $lang) ?>:</label>
					<?php $clientTypeSelection = Form::getValue('client_type'); ?>
					<select class="form-control" name="client_type" id="input-client-type">
						<option value=""><?= T::trn('Select type', $lang) ?></option>
						<?php foreach ($optionsClientTypes as $type): ?>
						<option value="<?= $type['id'] ?>" <?= ($clientTypeSelection == $type['id']) ? 'selected' : '' ?>>
							<?= T::trn($type['name'], $lang) ?>							
						</option>
						<?php endforeach ?>
					</select>
					<div class="error text-danger"><?= Form::getError($validation, 'client_type') ?></div>
				</div>
				<!-- Comapny Phone -->
				<div class="form-group show-only-for-company hidden">
					<label for="input-company-phone"><?= T::trn('Comapny Phone', $lang) ?>:</label>
					<input type="text" class="form-control numeric" value="<?= Form::getValue('company_phone') ?>" name="company_phone" id="input-company-phone">
					<div class="error text-danger hidden"><?= T::trn('Please enter a valid phone number', $lang) ?></div>
					<div class="error text-danger"><?= Form::getError($validation, 'company_phone') ?></div>
				</div>
			</div>

			<div class="col-md-6">
				<!-- Country -->
				<div class="form-group">
					<label for="input-country"><?= T::trn('Country', $lang) ?>:</label>
					<?php $countrySelection = Form::getValue('country_id'); ?>
					<select class="form-control" value="<?= Form::getValue('country') ?>" name="country_id" id="input-country">
						<option value=""><?= T::trn('Select country', $lang) ?></option>
						<?php foreach ($optionsCountries as $country): ?>
						<option value="<?= $country['id'] ?>" <?= ($countrySelection == $country['id']) ? 'selected' : '' ?>>
							<?= $country['country'] ?> <?= $country['iso_code_short'] ? ' - '. $country['iso_code_short'] : '' ?>								
						</option>
						<?php endforeach ?>
					</select>
					<div class="error text-danger"><?= Form::getError($validation, 'country_id') ?></div>
				</div>
				<!-- Last Name -->
				<div class="form-group">
					<label for="input-surname"><?= T::trn('Surname', $lang) ?>:</label>
					<input type="text" class="form-control" value="<?= Form::getValue('surname') ?>" name="surname" id="input-surname">
					<div class="error text-danger"><?= Form::getError($validation, 'surname') ?></div>
				</div>
				<!-- Phone Number -->
				<div class="form-group">
					<label for="input-phone"><?= T::trn('Phone Number', $lang) ?>:</label>
					<input type="text" class="form-control numeric" value="<?= Form::getValue('phone') ?>" name="phone" id="input-phone">
					<div class="error text-danger hidden"><?= T::trn('Please enter a valid phone number', $lang) ?></div>
					<div class="error text-danger"><?= Form::getError($validation, 'phone') ?></div>
				</div>
				<!-- Comapny Name -->
				<div class="form-group show-only-for-company hidden">
					<label for="input-company-name"><?= T::trn('Comapny Name', $lang) ?>:</label>
					<input type="text" class="form-control" value="<?= Form::getValue('company_name') ?>" name="company_name" id="input-company-name">
					<div class="error text-danger"><?= Form::getError($validation, 'company_name') ?></div>
				</div>
				<!-- Comapny Country -->
				<div class="form-group show-only-for-company hidden">
					<label for="input-company-country"><?= T::trn('Comapny Country', $lang) ?>:</label>
					<input type="text" class="form-control" value="<?= Form::getValue('company_country') ?>" name="company_country" id="input-company-country">
					<div class="error text-danger"><?= Form::getError($validation, 'company_country') ?></div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<!-- Email -->
				<div class="form-group">
					<label for="input-email"><?= T::trn('Email', $lang) ?>:</label>
					<input type="email" class="form-control" value="<?= Form::getValue('email') ?>" name="email" id="input-email">
					<div class="error text-danger"><?= Form::getError($validation, 'email') ?></div>
				</div>
			</div>
			<div class="col-md-6">
				<!-- Confirm Email -->
				<div class="form-group">
					<label for="input-email-confirm"><?= T::trn('Confirm E-mail', $lang) ?>:</label>
					<input type="email" class="form-control" value="<?= Form::getValue('confirm-email') ?>" name="confirm-email" id="input-email-confirm">
					<div class="error text-danger"><?= Form::getError($validation, 'confirm-email') ?></div>
				</div>
			</div>
		</div>

		<div class="actions">
			<button type="submit" class="btn btn-primary"><?= T::trn('Submit', $lang) ?></button>
			<button type="button" id="btn-reset" class="btn btn-danger"><?= T::trn('Reset', $lang) ?></button>
		</div>

	</form>
	<?php endif ?>
	<script src="plugins/jquery/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap -->
	<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- Plugins -->
	<script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<!-- Custom -->
	<script src="js/app.js"></script>


	<script type="text/javascript">
		$('.datepicker').datepicker();
	</script>
</body>
</html>