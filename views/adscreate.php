<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Criar Anúncio</title>
    <style>

      .field {
        margin-bottom: 10px;
      }

    </style>
  </head>
  <body>

<?php require("templates/navigation.php"); ?>

      <h1>Criar Anúncio</h1>

    <form action="/register" method="POST">
      <div class="field">
        <label>
          Titulo do Anúncio
          <input type="text" name="first_name" required minlength="3" maxlength="60">
        </label>
      </div>
      <div class="field">
        <label>
          Descrição
          <input type="text" name="first_name" required minlength="3" maxlength="60">
        </label>
      </div>
      <div class="field">
        <label>
          Preço
          <input type="text" name="first_name" required minlength="3" maxlength="60">
        </label>
      </div>
      <div class="field">
        <label>
          Categoria do anúncio

          <!-- loop com select --->

        </label>
      </div>
      <div class="field">
        <button type="submit" name="login">Criar</button>
      </div>
    </form>
  </body>
</html>