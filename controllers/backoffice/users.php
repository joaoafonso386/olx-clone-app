<?php

require("models/users.php");

if(isset($_SESSION[ "logged" ]["admin_id"])) {

  if(!empty($url_parts[3])) {

    require("controllers/backoffice/usersedit.php");

  } else {

    $modelUsers = new Users();
    $users = $modelUsers->getAllUsers();
  
    require("views/backoffice/users.php");
  }


} else {
  http_response_code(403);
  die("403: Acesso negado");
}