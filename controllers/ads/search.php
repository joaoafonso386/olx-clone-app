<?php

require("models/categories.php");
require("models/ads.php");
require("validators/searchValidator.php");

$modelAds = new Ads();

$query_outputs = [];
$query_name = "";


if( isset($_GET["query"]) && validateSearchTerm($_GET["query"]) ) {
  
  $sanitize_query = htmlspecialchars((strip_tags((strtolower(trim($_GET["query"]))))));
    
  $query_name = $sanitize_query;
  $query_outputs = $modelAds->getByCategory( $sanitize_query );
  
  if(empty($query_outputs)) {
    $query_name = $sanitize_query;
    $query_outputs = $modelAds->getByTitleOrDescription( $query_name );
  }

} else if(empty($_GET)) {

  $query_name = $search_term;
  $query_outputs = $modelAds->getByCategory( $query_name );

} else {

  http_response_code(400);
  exit("400 Bad Request");

}

require("views/adsearch.php");


?>