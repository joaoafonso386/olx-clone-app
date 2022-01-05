<?php

require("models/countries.php");
require("sanitizers/sanitizers.php");


//Passar para a view o select dos países para a pessoa escolher de que país é + codigo de geração do captcha (controller)
$modelCountries = new Countries();
    
$countries = $modelCountries->getAllCountries();
$country_codes = [];

foreach($countries as $country) {
  $country_code[] = $country["country_code"];
}

echo "<pre>"; 
print_r($_POST); 
echo"</pre>";

if( isset($_POST["register"]) && in_array($_POST["country"], $country_code) ) {
      
  
  // foreach($_POST as $key => $value) {
  //   $_POST[ $key ] = trim(htmlspecialchars((strip_tags($value))));
  // }
  
  $user_id = $modelUsers->create( $_POST );
  
  if(!empty($user_id)) {
    $_SESSION["user_id"] = $user_id;
    $_SESSION["user_name"] = $_POST["name"];
    
    header("Location: /home");
  } else {
    $message= 'info obgrigatoria nao preenchida corretamente';
  }
  
}



require("views/register.php");
//Form de registo (view)

//Verificar se a variavel post existe (controller)

//sanitizar a informação do form (controller)

//validar se a informação corresponde ao indicado na db passando a variavel post para o metodo do model (model)

//inserir na base de dados

//iniciar a sessão do utilizador