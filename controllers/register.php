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

$image = imagecreate(210, 100);

imagecolorallocate($image, 190, 190, 190);

$font ="assets/fonts/DailyChallenge.otf";

$color = imagecolorallocate($image, 0, 0, 0);

$text = bin2hex( random_bytes(4) );

$_SESSION["captcha"] = $text;

imagettftext($image, 30, 0, 35, 60, $color, $font, $text);

imagepng($image);

echo "<pre>"; 
print_r($_POST); 
echo"</pre>";

if( isset($_POST["register"]) && in_array($_POST["country"], $country_code) ) {
      
  
  foreach($_POST as $key => $value) {
    $_POST[ $key ] = defaultSanitizer($value);
  }
  
  $modelUsers = new Users();
  $user_id = $modelUsers->createUser( $_POST );
  
  if(!empty($user_id)) {
    $_SESSION["user_id"] = $user_id;
    $_SESSION["user_name"] = $_POST["first_name"];
    
    header("Location: /home");
  } else {
    $message= 'Informação obgrigatoria não preenchida corretamente';
  }
  
}

require("views/register.php");