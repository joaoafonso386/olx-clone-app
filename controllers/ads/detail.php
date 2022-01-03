<?php

require("models/ads.php");
require("models/adcomments.php");
require("models/users.php");
require("utils/utils.php");

$message = "";

if(!empty($search_term)) {

  $modelAds = new Ads();
  $ad = $modelAds->getAdByPermalink( $search_term );
  
  if(empty($ad)) {
    http_response_code(404);
    die("404 Este anúncio não existe");
  }

  $modelUsers = new Users();
  $user = $modelUsers->getUserByAdId( $ad["ad_id"] );

  $modelComments = new AdComments();
  $ad_comments =  $modelComments->getCommentsByAdId( $ad["ad_id"] );

  if(empty( $ad_comments )) {
    $message = "Não existem comentários para este anúncio";
  }
  
  //Apenas mostrar com base no login de um utilizador
  //Verificar se POST existe (isset)
  //caso exista sanitizar os dados (criar função de sanitização)
  //Inserir na base de dados

  require("views/addetail.php");

} else {
  http_response_code(404);
  die("404 Not Found");

}
