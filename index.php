<?php 

session_start();

define("CONFIG", $config = parse_ini_file(".env"));

$url_parts = explode("/", $_SERVER["REQUEST_URI"]);

$main_controllers = [
  "home",
  "user",
  "login",
  "register",
  "ads",
  "backoffice",
  "logout"
];

$no_secondary_controllers = [
  "home",
  "register",
  "login",
  "logout"
];


$main_controller = !empty($url_parts[1]) ? $url_parts[1] : "home";

$secondary_controller = !empty($url_parts[2]) ? $url_parts[2] : "";

$search_term = !empty($url_parts[3]) ? $url_parts[3] : "";


if( !in_array($main_controller, $main_controllers) ) {
  
  http_response_code(404);
  exit("404: This page was not found.");

}

if( !empty($secondary_controller) && in_array($main_controller, $no_secondary_controllers) ) {

  http_response_code(404);
  exit("404: This page was not found.");

}

  require("controllers/${main_controller}.php");


?>