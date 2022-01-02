<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $ad["title"] ?></title>
</head>
<body>

  <?php 
  require("views/templates/navigation.php"); 
  
  ?>

  <main>
    <div>
      <div>
      <?php 

        $title = mb_strtoupper($ad["title"],'UTF-8');

        echo "
          <img width='350' src='/assets/images/ads/${ad["image"]}'>
          <br>
          <span style='font-size: 15px; color: grey'>${ad["created_at"]}</span>
          <h1>${title}</h1>
          <p style='font-size: 30px'>${ad["price"]} €</p>
          <p style='font-size: 20px'>${ad["description"]}</p>
        ";
      ?>
      </div>
      <div>
      <!-- Informações sobre o utilizador -->
      </div>
    </div>
    <div>
      <!-- comentários -->
    </div>
    <p><?php echo $message ?></p>
    <!-- //verificar na view se devo mostrar ou não um formulário que depende do utilizador estar logado -->
  </main>  

</body>
</html>