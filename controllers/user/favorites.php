<?php

require("models/adfavorites.php");

if(isset($_SESSION[ "logged" ]["user_id"])) {
  
  $modelAdFavorites = new AdFavorites();
  $favoritedAds = $modelAdFavorites->getAllAdsFavorited($_SESSION);

  if(empty($favoritedAds)) {
    $message = 'Não tem nenhum anúncio como favorito';
  }

  require("views/userfavorites.php");

} else {
  header("Location: /login");
  exit;
}