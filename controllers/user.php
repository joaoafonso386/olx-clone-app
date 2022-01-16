<?php

$user_controllers = [
  "favorites",
  "myaccount"
];

$user_controller = !empty($url_parts[2]) ? $url_parts[2] : "";

if(!in_array($ads_controller, $ads_controllers)) {

  http_response_code(404);
  exit("404: This page was not found.");

}

require("controllers/user/${user_controller}.php");