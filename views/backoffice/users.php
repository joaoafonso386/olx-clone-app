<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/styles/main.css">
  <title>OLX Admin - Utilizadores</title>
</head>
<body>
  <main>

    <?php require("views/backoffice/navigation.php"); ?>

    <h1>Controlo de Utilizadores</h1>

    <table class="admin-users-table">
      <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>LOCALIZAÇÃO</th>
        <th>DATA DE CRIAÇÃO DE CONTA</th>
        <th>EDITAR UTILIZADOR</th>
        <th>REMOVER UTILIZADOR</th>
      </tr>
      <?php

      if(!empty($users)) {

        foreach($users as $user) {
        
          echo"
              <tr>
                <td>{$user["user_id"]}</td>
                <td>{$user["first_name"]} {$user["last_name"]}</td>
                <td>{$user["city"]}, {$user["postal_code"]}</td>
                <td>{$user["created_at"]}</td>
                <td>
                  <a href='/backoffice/users/edit?user_id={$user["user_id"]}' class='remove'>Editar</a>
                </td>
                <td>
                  <button class='remove' type='button'>X</button>
                </td>
              </tr>
              ";
          }

      ?>
      <tr>
    </table>
      <?php 
      } else {
          echo "<p>Ainda não tens nada no do carro</p>";
      }
      ?>
  </main>
</body>
</html>