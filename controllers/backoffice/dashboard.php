<?php

if(isset($_SESSION[ "logged" ]["admin_id"])) {

  require("views/backoffice/dashboard.php");


} else {
  http_response_code(403);
  die("403: Acesso negado");
}