<?php 

session_start();

define("CONFIG", $config = parse_ini_file(".env"));

$url_parts = explode("/", $_SERVER["REQUEST_URI"]);

$controllers = [
  "home"
];

$controller = !empty($url_parts[1]) ? $url_parts[1] : "home";

if( !in_array($controller, $controllers) ) {
  http_response_code(404);
  die("Página não encontrada");
}

require("controllers/" . $controller . ".php");

?>