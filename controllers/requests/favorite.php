<?php

header("Content-Type: application/json");

require("models/adfavorites.php");
require("validators/validators.php");

if(isset($_SESSION[ "logged" ]["user_id"])) {

  if($_SERVER["REQUEST_METHOD"] === "POST") {

    $body = json_decode(file_get_contents("php://input"), true);
  
    if( requestsValidator($body) ) {
        
      $modelAdFavorites = new AdFavorites();
      $adFavorited = $modelAdFavorites->getAdFavorited($body);

      if( empty($adFavorited) ) {

        $ad_was_favorited = $modelAdFavorites->addToFavorites($body);

        if(!empty($ad_was_favorited)) {
          http_response_code(200);
          echo '{"message": "Anúncio adicionado aos seus favoritos"}';
        }

      } else {

        http_response_code(200);
        echo '{"message": "Este anúncio já está nos seus favoritos!"}';

      }
      
    } else {
      http_response_code(400);
      echo '{"message": "Invalid JSON data"}';
    }
    
  } else if($_SERVER["REQUEST_METHOD"] === "DELETE") {
  
    $body = json_decode(file_get_contents("php://input"), true);
    
    if ( requestsValidator($body) ) {
      
      $modelAdFavorites = new AdFavorites();
      $ad_was_deleted = $modelAdFavorites->deleteAdFavorite($body);
  
      if(!empty($ad_was_deleted)) {
        http_response_code(200);
        echo '{"message": "Anúncio removido dos seus favoritos"}';
      }

    } else {
      http_response_code(400);
      echo '{"message": "Invalid JSON data"}';
    }

    
  } else {
    http_response_code(400);
    echo '{"message": "Bad Request"}';
  }

} else {
  http_response_code(400);
  echo '{"message": "Bad Request"}';
}

