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
      <h3>Numero de Anúncios do site: <?php echo $numberOfAds["ads_number"] ?></h3>
    </div>
    <div style="margin: 0 100px 0 0;">
      <?php 
          echo "
          <h2>{$admin["full_name"]}</h2>
          <p>Email: {$admin["email"]}</p>
          <p>Posição: {$admin["position"]}</p>
          <p>Data de criação de conta: {$admin["created_at"]}</p>
          ";
      ?>
      </div>
  </div>

</body>
</html>