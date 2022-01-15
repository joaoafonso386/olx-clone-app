<?php
require("models/countries.php");
require("models/users.php");
require("sanitizers/sanitizers.php");

$modelCountries = new Countries();
    
$countries = $modelCountries->getAllCountries();
$country_codes = [];

foreach($countries as $country) {
  $country_code[] = $country["country_code"];
}

if( isset($_POST["register"]) && in_array($_POST["country"], $country_code) ) {
  
  foreach($_POST as $key => $value) {
    $_POST[ $key ] = defaultSanitizer($value);
  }
  
  $modelUsers = new Users();
  $user_id = $modelUsers->createUser( $_POST );
  
  if(!empty($user_id)) {

    $_SESSION[ "logged" ]["user_id"] = $user_id;
    $_SESSION[ "logged" ]["user_name"] = $_POST["first_name"];
    
    header("Location: /home");
  } else {
    $message= 'Informação obgrigatoria incorretamente preenchida';
  }
  
}

require("views/register.php");