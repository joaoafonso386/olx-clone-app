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

    <h2>Categorias</h2>

   <?php
   foreach($categories as $category) {

    echo 
    "<div>
      <a href='/categories/${category["permalink"]}'>
        <h3>${category["name"]}</h3>
        <img width='100px' src='/assets/images/categories/${category["image"]}'>
      </a>
    </div>";  

   }

   ?>

   <h2>Anúncios</h2>

   <?php

   foreach($ads as $ad) {

    $create_date = date_create($ad["created_at"]);
    $ad_date = date_format($create_date, "j/n/Y");

    echo
    "<div>
      <img width='100px' src='/assets/images/ads/${ad["image"]}'>
      <a href='#'>${ad["title"]}</a>
      <p>Preço: ${ad["price"]}€</p>
      <p>Data de criação: ${ad_date}</p>
    </div>";

   }
   
   ?>
    
  </main>  
</body>
</html>
