<?php

require("models/categories.php");
require("models/ads.php");
require("validators/searchValidator.php");

$modelCategories = new Categories();
$categories = $modelCategories->getAll();
$permalinks = [];
foreach($categories as $category) {
  $permalinks[] = $category["permalink"];
}

$query_outputs = [];

if( in_array($search_term, $permalinks) ) {

  $modelAds = new Ads();
  $query_outputs = $modelAds->getByCategory( $search_term );
  
  require("views/search.php");

} else if( !empty($search_term ) && validateGet ($_GET["query"] ) ) {

  $query = htmlspecialchars((strip_tags((strtolower($_GET["query"])))));
  echo $query . " buscar por termo de pesquisa";

} else {

  http_response_code(404);
  echo "Não foram encontrados quaisquer anúncios";

}

?>