<?php

$backoffice_controllers = [
  "deleteuser",
];

$backoffice_controller = !empty($url_parts[3]) ? $url_parts[3] : "";

if(!in_array($backoffice_controller, $backoffice_controllers)) {

  http_response_code(404);
  exit("404: This page was not found.");

}

require("controllers/requests/backoffice/${backoffice_controller}.php");