<?php

require("models/categories.php");
require("models/ads.php");
require("validators/searchValidator.php");

$modelCategories = new Categories();
$modelAds = new Ads();
$categories = $modelCategories->getAll();

$permalinks = [];
foreach($categories as $category) {
  $permalinks[] = $category["permalink"];
}

$query_outputs = [];
$query_name = "";

if( in_array($search_term, $permalinks) ) {

  $query_name = $search_term;
  $query_outputs = $modelAds->getByCategory( $query_name );
  
  require("views/search.php");

} else if( validateGet($_GET["query"]) ) {

  $get_query = htmlspecialchars((strip_tags((strtolower(trim($_GET["query"]))))));

  foreach($permalinks as $permalink) {

    if( in_array($get_query, $permalinks) || strpos($get_query, $permalink) !== false ) {

      $query_name = $get_query;
      $query_outputs = $modelAds->getByCategory( $permalink );
    
      require("views/search.php");
      exit;
    }

  }

  $query_name = $get_query;
  $query_outputs = $modelAds->getByTitleOrDescription( $query_name );
  print_r($query_outputs);
  require("views/search.php");

} else {

  http_response_code(404);
  exit("Não foram encontrados quaisquer anúncios");

}

?>