<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo ucfirst($search_term); ?> - OLX Clone</title>
</head>
<body>

  
  <?php 
  require("views/templates/navigation.php"); 
  require("views/templates/search.php"); 
  
  ?>

  <h2>Anúncios para o termo: "<?php echo ucfirst($search_term); ?>"</h2>

  <?php 

    echo count($query_outputs) === 1 ? "<h3>Encontrado "  . count($query_outputs) . " anúncio</h3>" : "<h3>Encontrados "  . count($query_outputs) . " anúncios</h3>";
  
    foreach($query_outputs as $output) {

    $create_date = date_create($output["created_at"]);
    $ad_date = date_format($create_date, "j/n/Y");

      echo
      "<div>
        <img width='100px' src='/assets/images/ads/${output["image"]}'>
        <h3>${output["title"]}</h3>
        <p>${output["price"]}</p>
        <p>${ad_date}</p>
      </div>";  

    }

  ?>


</body>
</html>