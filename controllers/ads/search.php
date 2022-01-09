<?php

require("models/categories.php");
require("models/ads.php");
require("validators/validators.php");
require("sanitizers/sanitizers.php");

$modelAds = new Ads();

$query_outputs = [];
$query_name = "";


if( isset($_GET["query"]) && validateSearchTerm($_GET["query"]) ) {
  
  $sanitize_query = strtolower(defaultSanitizer($_GET["query"]));
    
  $query_name = $sanitize_query;
  $query_outputs = $modelAds->getAdsByCategory( $sanitize_query );
  
  if(empty($query_outputs)) {
    $query_name = $sanitize_query;
    $query_outputs = $modelAds->getAdsBySearchTerm( $query_name );
  }

} else if(empty($_GET)) {

  $query_name = $search_term;
  $query_outputs = $modelAds->getAdsByCategory( $query_name );

  if(empty($query_outputs)) {
    $query_outputs = $modelAds->getAdsBySearchTerm( $query_name );
  }

} else {
  
  $message = "Insira uma query com mais de 3 caracteres";

}

require("views/adsearch.php");


?>