<?php

require("models/categories.php");

$modelCategories = new Categories();
$categories = $modelCategories->getAll();
$permalinks = [];
foreach($categories as $category) {
  $permalinks[] = $category["permalink"];
}

//busca por categoria
if( in_array($search_term, $permalinks) ) {
  //Buscar os anuncios por categoria

  echo "buscar por categoria";

  //buscar por termo de pesquisa
} else if( !empty($search_term) ) {
  
  echo "buscar por termo de pesquisa";

} else {

  http_response_code(404);
  echo "404: This page was not found.";

}

?>