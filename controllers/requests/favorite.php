<?php

header("Content-Type: application/json");

require("models/adfavorites.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {

  $body = json_decode(file_get_contents("php://input"), true);

  if(
    isset($body["user_id"]) &&
    !empty($body["user_id"]) &&
    !empty($body["ad_id"]) &&
    isset($body["ad_id"]) &&
    intval($body["ad_id"]) > 0 &&
    intval($body["user_id"]) > 0 &&
    is_numeric($body["user_id"]) &&
    is_numeric($body["ad_id"])
    ) {
      
      $modelAdFavorites = new AdFavorites();
      $adFavorited = $modelAdFavorites->getAdFavorited($body);

      if( empty($adFavorited) ) {

        $ad_was_favorited = $modelAdFavorites->addToFavorites($body);

        if(!empty($ad_was_favorited)) {
          http_response_code(200);
          echo '{"message": "Anúncio adicionado aos seus favoritos"}';
        }

      } else {

        http_response_code(400);
        echo '{"message": "Este anúncio já está nos seus favoritos!"}';

      }
    
  } else {
    http_response_code(400);
    echo '{"message": "Invalid JSON data"}';
  }
  
} else {
  http_response_code(400);
  echo '{"message": "Bad Request"}';
}