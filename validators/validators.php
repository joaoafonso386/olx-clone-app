<?php

/**
 * Validate the search term used in the input search
 * @param (string) search_term
 */

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

function validateRegisterUser( $user ) {

  if(
    mb_strlen($user["first_name"]) >= 3 &&
    mb_strlen($user["last_name"]) <= 60 &&
    mb_strlen($user["address"]) >= 10 &&
    mb_strlen($user["address"]) <= 120 &&
    intval($user["age"]) &&
    is_numeric($user["age"]) &&
    mb_strlen((string)$user["age"]) >= 2 &&
    mb_strlen((string)$user["age"]) <= 3 &&
    mb_strlen($user["city"]) >= 3 &&
    mb_strlen($user["city"]) <= 40 &&
    mb_strlen($user["postal_code"]) >= 4 &&
    mb_strlen($user["postal_code"]) <= 20 &&
    mb_strlen($user["vat_code"]) >= 9 &&
    mb_strlen($user["vat_code"]) <= 60 &&
    mb_strlen($user["password"]) >= 8 &&
    mb_strlen($user["password"]) <= 1000 &&
    filter_var($user["email"], FILTER_VALIDATE_EMAIL) &&
    $user["password"] === $user["repeat_password"] &&
    isset( $user["agrees"] )
    ) { 
      return true;
    } else {
      return false;
    }

}