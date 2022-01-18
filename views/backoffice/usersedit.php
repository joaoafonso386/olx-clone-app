<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/styles/main.css">
  <title>OLX Admin - Editar Utilizadores</title>
</head>
<body>
  
<?php require("views/backoffice/navigation.php"); ?>

<?php 

  if(isset($message)) {
    echo '<p role="alert">' . $message .' </p>';
  }

?>
    <h1>Editar Informação do utilizador <?php echo $user["first_name"]; ?></h1>
    <form action="/backoffice/users/edit?user_id=<?php echo $user["user_id"] ?>" method="POST">
      <div class="field">
        <label>
          Primeiro Nome
          <input type="text" name="first_name" required minlength="3" maxlength="60">
        </label>
      </div>
      <div class="field">
        <label>
          Apelido
          <input type="text" name="last_name" required minlength="3" maxlength="60">
        </label>
      </div>
      <div class="field">
        <label>
          Email
          <input type="email" name="email" required>
        </label>
      </div>
      <div class="field">
        <label>
          Password Atual
          <input type="password" name="current_password" minlength="8" maxlength="255" required>
        </label>
      </div>
      <div class="field">
        <label>
          Nova Password
          <input type="password" name="new_password" minlength="8" maxlength="255" required>
        </label>
      </div>
      <div class="field">
        <label>
          Cidade
          <input type="text" name="city" required minlength="3" maxlength="60">
        </label>
      </div>
      <div class="field">
        <label>
          Telefone/Telemóvel
          <input type="text" name="phone" required minlength="9" maxlength="60">
        </label>
      </div>
      <div class="field">
        <button type="submit" name="edit">Guardar</button>
      </div>
    </form>
    </form>
</body>
</html>