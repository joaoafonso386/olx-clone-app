<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My OLX</title>
</head>
<body>

  <?php require("templates/navigation.php"); ?>

  <main>

  <?php
   echo "
    <h2>{$user["first_name"]} {$user["last_name"]}</h2>
    <p>Idade: {$user["age"]}</p>
    <p>Morada: {$user["address"]}</p>
    <p>Contacto Telefónico: {$user["phone"]}</p>
    <p>Localização: {$user["city"]}</p>
    <p>Código Postal: {$user["postal_code"]}</p>
    <p>Data de criação de conta: {$user["created_at"]}</p>
  ";
  ?>
  </main>
</body>
</html>