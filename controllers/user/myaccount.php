<?php

require("models/users.php");
require("utils/utils.php");

if(isset($_SESSION[ "logged" ]["user_id"])) {


  $modelUser = new Users();
  $user = $modelUser->getUserById($_SESSION);

  require("views/usermyaccount.php");

} else {
  header("Location: /login");
  exit;
}