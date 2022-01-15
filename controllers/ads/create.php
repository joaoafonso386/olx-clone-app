<?php

require("models/categories.php");
require("models/ads.php");
require("validators/validators.php");
require("utils/utils.php");

if(isset($_SESSION[ "logged" ])) {

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
      
      $new_filename = date("Y-m-H-i-s") . "_" . bin2hex( random_bytes(4) );
      $extension = "." . array_search($detected_format, $allowed_formats);
      $image = $new_filename . $extension;
      $_POST["price"] = number_format($_POST["price"], 2);
      $create_permalink = createPermalink($_POST["title"]);

      move_uploaded_file($_FILES["image"]["tmp_name"], "assets/images/ads/" . $new_filename . $extension);
      
      $modelAds = new Ads();
      $ad_was_inserted = $modelAds->createAd($_POST, $_SESSION, $create_permalink, $image);

      if(!empty($ad_was_inserted)) {
        $message = "O seu anúncio foi criado!";
      }
      
    } else {
      $message = "Dados incorretamente inseridos";
    }

  }


  require("views/adscreate.php");

} else {
  header("Location: /login");
  exit;
}