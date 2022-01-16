<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="/javascript/userfavorites.js" defer></script>
  <title>Anúncios Favoritos</title>
</head>
<body>

  <?php require("templates/navigation.php"); ?>

  <main>
    <h1>Anúncios Favoritos</h1>
 

  <?php 

   if(!empty($message)) {
    echo '<p role="alert">'. $message .'</p>';
  }

  foreach($favoritedAds as $favoritedAd) {
    echo "
      <div class='container'>
        <div style='display:flex; flex-direction: column; gap:10px;'>
          <a href='/ads/detail/{$favoritedAd["permalink"]}'>{$favoritedAd["title"]}</a>
          <img width='100px' src='/assets/images/ads/{$favoritedAd["image"]}'>
          <span>{$favoritedAd["category_name"]}</span>
          <span>{$favoritedAd["price"]}€</span>
          <span>{$favoritedAd["user_city"]}</span>
          <span>{$favoritedAd["created_at"]}</span>
        </div>
        <button 
          style=' margin: 10px 0 20px 0;' width='10px' 
          type='button'
          class='remove-favorite'
          data-user-id='{$_SESSION[ "logged" ]["user_id"]}'
          data-ad-id='{$favoritedAd["ad_id"]}'>Remover dos Favorios</button>
      </div>
      <div class='message'>
      </div>
    ";
  }

  ?>

  </main>
</body>
</html>