<?php

header("Content-Type: application/json");

require("models/users.php");


$messageError = '{"message": "400 Bad Request"}';
$messageSuccess = '{"message": "Utilizador eliminado"}';
$messageWrongInfo = '{"message": "Informação incorreta"}';

if(isset($_SESSION[ "logged" ]["admin_id"])) {

  if($_SERVER["REQUEST_METHOD"] === "DELETE") {

    $body = json_decode(file_get_contents("php://input"), true);

    if( requestsValidatorDelete($body) ) {

      $modelUsers = new Users();
      $userWasDeleted = $modelUsers->deleteUser($body);

      if(!empty($userWasDeleted)) {
        http_response_code(200);
        echo $messageSuccess;
      }


    } else {
      http_response_code(400);
      echo $messageWrongInfo;
    }
    
  }


} else {
  http_response_code(400);
  echo $messageError;
}