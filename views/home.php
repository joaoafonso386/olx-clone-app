<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-with, initial-scale=1.0">
  <title>Home</title>
</head>
<body>
  <main>

    <?php require("templates/navigation.php"); ?>

    <p>Olá <?php 
      if(isset($_SESSION["user_name"])) echo $_SESSION["user_name"]; 
      if(isset($_SESSION["admin_name"])) echo  $_SESSION["admin_name"];
    ?></p>

    <?php require("templates/search.php"); ?>

    <h2>Categorias</h2>

   <?php
   foreach($categories as $category) {

    echo 
    "<div>
      <a href='/ads/search/${category["permalink"]}'>
        <h3>${category["name"]}</h3>
        <img width='100px' src='/assets/images/categories/${category["image"]}'>
      </a>
    </div>";  

   }

   ?>

   <h2>Anúncios</h2>

   <?php
   
   foreach($ads as $ad) {

    $formated_date = dateFormatter($ad["created_at"]);

    echo
    "<div>
      <img width='100px' src='/assets/images/ads/${ad["image"]}'>
      <a href='/ads/detail/${ad["permalink"]}'>${ad["title"]}</a>
      <p>Preço: ${ad["price"]}€</p>
      <p>Data de criação: ${formated_date}</p> 
    </div>";

   }

   ?>
    
  </main>  
</body>
</html>
