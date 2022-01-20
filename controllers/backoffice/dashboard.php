<?php

if(isset($_SESSION[ "logged" ]["admin_id"])) {

  


} else {
  http_response_code(403);
  die("403: Acesso negado");
}