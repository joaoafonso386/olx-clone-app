<?php 

require("sanitizers/sanitizers.php");
require("models/users.php");
require("models/admin.php");


if( !isset($_SESSION[ "logged" ]) ) {
  
  if(isset($_POST["login"]) ) {

    foreach($_POST as $key => $value) {
      
      $_POST[$key] = defaultSanitizer( $value );
      
    }
    
    $modelUsers = new Users();
    $user = $modelUsers->loginUser( $_POST );

    if( !empty($user) && password_verify($_POST["password"], $user["password"]) ) {

      $_SESSION[ "logged" ]["user_id"] = $user["user_id"];
      $_SESSION[ "logged" ][ "user_name"] = $user["first_name"];
      
      header("Location: /");
      
    } else if(empty($user)) {
      
      $modelAdmin = new Admin();
      $admin = $modelAdmin->loginAdmin( $_POST );
      
      if(!empty($admin) && password_verify($_POST["password"], $admin["password"])) {

        $_SESSION[ "logged" ]["admin_id"] = $admin["admin_id"];
        $_SESSION[ "logged" ]["admin_name"] = $admin["full_name"];
        
        header("Location: /backoffice/dashboard");

      } else {
        $message = "Dados incorretos";
      }
    } else {
      $message = "Dados incorretos";
    }
    
  } 
  
  require("views/login.php");
  
} else {
  
  header("Location: /");
  exit;
}


