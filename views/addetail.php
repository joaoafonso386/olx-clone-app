<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/styles/main.css">
  <title><?php echo $ad["title"] ?></title>
  <script src="/javascript/addetail.js" defer></script>
</head>
<body>

  <?php 
  require("views/templates/navigation.php"); 
  
  ?>

  <main>
    <div style="display: flex;">
      <div>
      <?php 
        //mb_strtoupper é necessário para codificicação UTF-8
        $title = mb_strtoupper($ad["title"],'UTF-8');

        echo "
          <img width='350' src='/assets/images/ads/{$ad["image"]}'>
          <br>
          <span style='font-size: 15px; color: grey'>{$ad["created_at"]}</span>
          <h1>{$title}</h1>
          <p style='font-size: 30px'>{$ad["price"]} €</p>
          <p style='font-size: 20px'>{$ad["description"]}</p>
        ";

        if(isset($_SESSION[ "logged" ]["user_id"])) { 
          echo "<div>
                 <button
                  data-ad-id='{$ad["ad_id"]}'
                  data-user-id='{$_SESSION[ "logged" ]["user_id"]}' 
                  class='add-favorite' 
                  type='button'>Adicionar aos favoritos</button>
               </div>
               <div class='message'>
               </div>
               ";
        }

      ?>
      </div>
      <div>
        <h2>Utilizador</h2>
        <?php 
          
          $formated_date_month = dateFormatter($user["created_at"], "F");
          $formated_date_year = dateFormatter($user["created_at"], "Y");
          
          echo "
            <h3>{$user["first_name"]} {$user["last_name"]}</h3>
            <p>No OLX desde {$formated_date_month} de {$formated_date_year}</p>
            <p>Contacto Telefónico: {$user["phone"]}</p>
            <p>Localização: {$user["city"]}, {$user["postal_code"]}</p>
          ";
        ?>
      </div>
    </div>
    <hr>
    <div>
      <h2>Comentários</h2>
      <?php
        foreach($ad_comments as $ad_comment) {
          echo "
            <h3>{$ad_comment["first_name"]}</h3>
            <p>Data: <time>{$ad_comment["created_at"]}</time></p>
            <p>{$ad_comment["description"]}</p>
          ";
        }
        
      ?>
    </div>
    <p><?php echo $message ?></p>

    <?php if(isset($_SESSION[ "logged" ]["user_id"])) { ?>
    <hr>
    <form action="<?php echo '/ads/detail/' . $ad["permalink"] ?>" method="POST">
      <div class="field">
        <label>Escreva um comenário</label>
        <textarea name="description" rows="4" cols="50" required></textarea>
      </div>
      <input type="hidden" name="ad_id" value="<?php echo $ad["ad_id"] ?>">
      <div class="field">
        <button type="submit" name="comment">Submeter</button>
      </div>
    </form>
    <?php } ?>
    
  </main>  

</body>
</html>