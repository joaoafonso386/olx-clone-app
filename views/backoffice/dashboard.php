<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OLX Admin - Dashboard</title>
</head>
<body>
  <?php require("views/backoffice/navigation.php"); ?> 

  <h1>Dashboard</h1>
  <div style="display:flex; justify-content:space-between">
    <div>
      <h3>Numero de anúncios na aplicação: <?php echo $numberOfAds["ads_number"] ?> anúncios</h3>
      <h3>Numero de utilizadores registados: <?php echo $numberOfUsers["users_number"] ?> utilizadores</h3>
      <div style="border: 1px solid black; text-align: center">
        <?php
        echo "
          <h3>Anúncio mais comentado</h3>
          <a href='/ads/detail/{$mostCommentedAd["permalink"]}'>{$mostCommentedAd["title"]}</a>
          <p>{$mostCommentedAd["description"]}</p>
          <p>Número de comentários: {$mostCommentedAd["comments"]}</p>";
        ?>
      </div>
      <div style="margin-top: 20px; border: 1px solid black; text-align: center">
        <?php
        
        $formated_date = dateFormatter($lastCreatedAd["created_at"]);

        echo "
          <h3>Último anúncio criado</h3>
          <a href='/ads/detail/{$lastCreatedAd["permalink"]}'>{$lastCreatedAd["title"]}</a>
          <p>{$lastCreatedAd["description"]}</p>
          <p>Data de criação: {$formated_date}</p>";
        ?>
      </div>
      <div style="margin-top: 20px; border: 1px solid black; text-align: center">
        <?php
        
        $formated_date = dateFormatter($lastCreatedUser["created_at"]);

        echo "
          <h3>Último utilizador criado</h3>
          <p>{$lastCreatedUser["first_name"]} {$lastCreatedUser["last_name"]}</p>
          <p>Data de criação: {$formated_date}</p>";
        ?>
      </div>
    </div>
    <div style="margin: 0 100px 0 0;">
      <?php
          
          $formated_date = dateFormatter($admin["created_at"]);
          
          echo "
          <h2>{$admin["full_name"]}</h2>
          <p>Email: {$admin["email"]}</p>
          <p>Posição: {$admin["position"]}</p>
          <p>Data de criação de conta: {$formated_date}</p>
          ";
      ?>
      </div>
  </div>

</body>
</html>