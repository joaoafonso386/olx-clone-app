<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/styles/main.css">
    <title>Criar Anúncio</title>
  </head>
  <body>

<?php require("templates/navigation.php"); ?>

<?php if(!empty($message)) echo $message ?>
      <h1>Criar Anúncio</h1>

    <form enctype="multipart/form-data"  action="/ads/create" method="POST">
      <div class="field">
        <label>
          Titulo do Anúncio
          <input type="text" name="title" required maxlength="120">
        </label>
      </div>
      <div class="field">
        <label>
          Descrição
          <textarea name="description" rows="4" cols="50" required></textarea>
        </label>
      </div>
      <div class="field">
        <label>
          Preço
          <input type="number" step=".01" name="price" required>
        </label>
      </div>
      <div class="field">
        <label>
          Categoria
          <select name="category">
<?php 
  foreach($categories as $category) {
    $selected="";

    if($category["category_id"] === 1) {
      $selected = "selected";
    }

    print_r($categories);
    echo "<option value='{$category["category_id"]} {$selected}'> {$category["name"]} </option>";

  }
?>
            
          </select>
        </label>
      </div>
      <div class="field">
      <label>
        Imagem do anúncio
        <br>
        <input type="file" accept=".jpg, .png" name="image" required>
      </label>
    </div>
      <div class="field">
        <button type="submit" name="create">Criar</button>
      </div>
    </form>
  </body>
</html>