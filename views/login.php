<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Efetuar Login</title>
    <link rel="stylesheet" href="/styles/main.css">
  </head>
  <body>
  <?php require("templates/navigation.php"); ?>

      <h1>Login</h1>
      <p>Se ainda não tem conta de utilizador, <a href="/register">Efetue registo</a></p>
    <?php 
      if(isset($message)) {
        echo "<p role='alert'>
                <strong>{$message}</strong>
              </p>";
      }
    ?>
    <form action="/login" method="POST">
      <div class="field">
        <label>
          Email
          <input type="email" name="email" required>
        </label>
      </div>
      <div class="field">
        <label>
          Password
          <input type="password" name="password" required>
        </label>
      </div>
      <div class="field">
        <button type="submit" name="login">Login</button>
      </div>
    </form>
  </body>
</html>