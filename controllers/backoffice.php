<?php

$backoffice_controllers = [
  "dashboard",
  "users",
];

$backoffice_controller = !empty($url_parts[2]) ? $url_parts[2] : "";

if(!in_array($backoffice_controller, $backoffice_controllers)) {

  http_response_code(404);
  exit("404: This page was not found.");

}

require("controllers/backoffice/${backoffice_controller}.php");