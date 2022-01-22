<?php

require("models/admin.php");
require("models/analytics.php");

if(isset($_SESSION[ "logged" ]["admin_id"])) {

  $modelAdmin = new Admin();
  $admin = $modelAdmin->getAdminById($_SESSION[ "logged" ]["admin_id"]);

  require("views/backoffice/dashboard.php");


} else {
  http_response_code(403);
  die("403: Acesso negado");
}