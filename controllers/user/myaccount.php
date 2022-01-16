<?php

if(isset($_SESSION[ "logged" ]["user_id"])) {
  

} else {
  header("Location: /login");
  exit;
}