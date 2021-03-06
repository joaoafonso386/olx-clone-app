<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Criar Conta</title>
    <link rel="stylesheet" href="styles/main.css">
  </head>
  <body>

<?php require("templates/navigation.php"); ?>

      <h1>Registar</h1>
<?php 

  if(isset($message)) {
    echo '<p role="alert">' . $message .' </p>';
  }

?>
      <p>Se já tem uma conta de utilizador, <a href="/login">Efetue login.</a>
    </p>
    <form action="/register" method="POST">
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
          Idade
          <input type="number" name="age" required minlength="2" maxlength="3">
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
          Password
          <input type="password" name="password" minlength="8" maxlength="255" required>
        </label>
      </div>
      <div class="field">
        <label>
          Repetir Password
          <input type="password" name="repeat_password" minlength="8" maxlength="255" required>
        </label>
      </div>
      <div class="field">
        <label>
          Morada
          <input type="text" name="address" required minlength="10" maxlength="120">
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
          Código Postal
          <input type="text" name="postal_code" required minlength="4" maxlength="20">
        </label>
      </div>
      <div class="field">
        <label>
          País
          <select name="country">
<?php 
  foreach($countries as $country) {
    $selected="";

    if($country["country_code"]=== "PT") {
      $selected = "selected";
    }

    echo "<option value='{$country["country_code"]}' {$selected}> {$country["name"]} </option>";
  }
?>
            
          </select>
        </label>
      </div>
      <div class="field">
        <label>
          Telefone/Telemóvel
          <input type="text" name="phone" required minlength="9" maxlength="11">
        </label>
      </div>
      <div class="field">
        <img src="/controllers/captcha.php">
      <label>
          Captcha
          <input type="text" name="captcha" required>
      </label>
      </div>
      <div class="field">
        <label>
          <input type="checkbox" name="agrees" required>
          Concordo com os termos e condições
        </label>
      </div>
      <div class="field">
        <button type="submit" name="register">Registar</button>
      </div>
    </form>
  </body>
</html>