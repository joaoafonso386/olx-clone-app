<?php

//criar método no model para criar uma anuncio (insert)

//Inserir

//Ter área de visualização de ads criados

require("models/categories.php");
require("models/ads.php");
require("validators/validators.php");

if(isset($_SESSION["user_name"])) {

  $modelCategories = new Categories();
  $categories = $modelCategories->getAllCategories();
  $category_ids = [];

  foreach($categories as $category) {
    $category_ids[] = $category["category_id"];
  }

  if(isset($_POST["create"]) && in_array($_POST["category"], $category_ids)) {

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $detected_format = finfo_file($finfo, $_FILES["image"]["tmp_name"]);

    $allowed_formats = [
      "jpg" => "image/jpeg",
      "png" => "image/png",
    ];


    if( validateUploadImg($detected_format, $allowed_formats, $_FILES["image"]) && validateCreateAd($_POST) ) {
      
      $new_file_name = date("YmHis") . "_" . bin2hex( random_bytes(4) );
      $extension = "." . array_search($detected_format, $allowed_formats);
      $format_price = number_format($_POST["price"], 2);

      $modelAds = new Ads();
      $ad_was_inserted = $modelAds->createAd($_POST, $format_price);

      if(!empty($ad_was_inserted)) {
        $message = "O seu anúncio foi criado!";
      }
      
    } else {
      $message = "dados incorretamente inseridos";
    }

  }


  require("views/adscreate.php");

} else {
  header("Location: /login");
  exit;
}