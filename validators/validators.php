<?php

/**
 * Validate the search term used in the input search
 * @param {string} search_term
 */

function validateSearchTerm( $search_term ) {

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

/**
 * Validate a user registration before inserting into the database
 * @param {array} user
 */

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
    mb_strlen($user["city"]) <= 60 &&
    mb_strlen($user["postal_code"]) >= 4 &&
    mb_strlen($user["postal_code"]) <= 20 &&
    mb_strlen($user["phone"]) >= 4 &&
    mb_strlen($user["phone"]) <= 60 &&
    mb_strlen($user["password"]) >= 8 &&
    mb_strlen($user["password"]) <= 1000 &&
    filter_var($user["email"], FILTER_VALIDATE_EMAIL) &&
    $user["password"] === $user["repeat_password"] &&
    isset( $user["agrees"] ) &&
    $user["captcha"] === $_SESSION["captcha"]
    ) { 
      return true;
    } else {
      return false;
    }

}

/**
 * Validate a user login
 * @param {array} user || admin
 */

function validateLogin( $user ) {
  if(
  filter_var($user["email"], FILTER_VALIDATE_EMAIL) &&
  mb_strlen($user["password"]) >= 8 &&
  mb_strlen($user["password"]) <= 255
  ) {
    return true;
  } else {
    return false;
  }
}
