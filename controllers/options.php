<?php
require_once 'DB.php';
// Connect to database with our reusable class
$db = new Db();

// Get client type options from database
$optionsClientTypes = $db->select("SELECT * FROM `client_type`;");

// Get titles options
$optionsTitles = $db->select("SELECT * FROM `title`;");

// Get countries options
$optionsCountries = $db->select("SELECT * FROM `country`;");