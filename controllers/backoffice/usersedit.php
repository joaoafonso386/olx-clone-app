<?php

require("sanitizers/sanitizers.php");
$modelUsers = new Users();

if(isset($_GET["user_id"])) {

  if(isset($_POST["edit"])) {

    foreach($_POST as $key => $value) {
      
      $_POST[$key] = defaultSanitizer($value);
      
    }

    if( validateUpdateUser($_POST) ) {

      $user_was_updated = $modelUsers->updateUser($_POST);
      
      if(!empty($user_was_updated)) {
        $message = "Utilizador atualizado";
      } else {
        http_response_code(400);
        $message = "Ocorreu um erro a processar os dados";
      }
    } else {
      $message = "Dados incorretamente inseridos";
    }

  }
  
  $user = $modelUsers->getUserById($_GET);

  require("views/backoffice/usersedit.php");

} else {
  http_response_code(400);
  die("400: Bad Request");
}