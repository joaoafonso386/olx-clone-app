<?php 

function validateSearchTerm($search_term) {

  if(
    isset($search_term) && 
    !empty($search_term) &&
    mb_strlen($search_term) <=100 &&
    mb_strlen($search_term) >= 3 
    ) {
    return true;
  } else {
    return false;
  }

}