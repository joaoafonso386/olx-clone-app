<?php

if(isset($_GET["user_id"])) {

  //primeiro fazer o update
  if(isset($_POST["edit"])) {
    echo "lets update";
  }

  //ir buscar a base de dados depois
  $modelUsers = new Users();
  $user = $modelUsers->getUserById($_GET);

  require("views/backoffice/usersedit.php");

} else {
  http_response_code(400);
  die("400: Bad Request");
}