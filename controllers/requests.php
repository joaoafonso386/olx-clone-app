<?php

$requests_controllers = [
  "favorite"
];

$requests_controller = !empty($url_parts[2]) ? $url_parts[2] : "";

if(!in_array($requests_controller, $requests_controllers)) {

  http_response_code(404);
  exit("404: This page was not found.");

}

require("controllers/requests/${requests_controller}.php");