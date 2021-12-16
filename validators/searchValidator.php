<?php 

function validateGet($search_term) {

  if(
    isset($search_term) && 
    !empty($search_term) &&
    mb_strlen($search_term) <=100
    ) {
    return true;
  } else {
    return false;
  }

}