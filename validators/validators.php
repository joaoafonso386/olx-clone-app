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
    intval($user["age"]) > 0 &&
    is_numeric($user["age"]) &&
    mb_strlen((string)$user["age"]) >= 2 &&
    mb_strlen((string)$user["age"]) <= 3 &&
    mb_strlen($user["city"]) >= 3 &&
    mb_strlen($user["city"]) <= 60 &&
    mb_strlen($user["postal_code"]) >= 4 &&
    mb_strlen($user["postal_code"]) <= 20 &&
    mb_strlen($user["phone"]) >= 4 &&
    mb_strlen($user["phone"]) <= 60 &&
    intval($user["phone"]) > 0 &&
    is_numeric($user["phone"]) &&
    mb_strlen($user["password"]) >= 8 &&
    mb_strlen($user["password"]) <= 255 &&
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


function validateUploadImg($detected_format, $allowed_formats, $file) {
  if(
  $file["error"] === 0 &&
  $file["size"] > 0 &&
  $file["size"] < 4000000 && 
  in_array($detected_format, $allowed_formats)
  ) {
    return true;
  } else {
    return false;
  }
}

function validateCreateAd( $ad ) {

  if(
  !empty($ad["title"]) &&
  !empty($ad["description"]) &&
  !empty($ad["price"]) &&
  intval($ad["price"]) > 0 &&
  is_numeric($ad["price"]) &&
  mb_strlen($ad["title"]) <=120
  ) {
    return true;
  } else {
    return false;
  }

}

function requestsValidator( $requestBody ) {

  if(
    isset($requestBody["user_id"]) &&
    !empty($requestBody["user_id"]) &&
    !empty($requestBody["ad_id"]) &&
    isset($requestBody["ad_id"]) &&
    intval($requestBody["ad_id"]) > 0 &&
    intval($requestBody["user_id"]) > 0 &&
    is_numeric($requestBody["user_id"]) &&
    is_numeric($requestBody["ad_id"])
    ) {
      return true;
    } else {
      return false;
    }

}

function requestsValidatorDelete( $requestBody ) {
  if(
    isset($requestBody["user_id"]) &&
    !empty($requestBody["user_id"]) &&
    intval($requestBody["user_id"]) > 0 &&
    is_numeric($requestBody["user_id"])
    ) {
      return true;
    } else {
      return false;
    }

}

function validateUpdateUser( $user ) {

  if(
    mb_strlen($user["first_name"]) >= 3 &&
    mb_strlen($user["last_name"]) <= 60 &&
    mb_strlen($user["city"]) >= 3 &&
    mb_strlen($user["city"]) <= 60 &&
    mb_strlen($user["phone"]) >= 4 &&
    mb_strlen($user["phone"]) <= 60 &&
    intval($user["phone"]) > 0 &&
    is_numeric($user["phone"]) &&
    mb_strlen($user["current_password"]) >= 8 &&
    mb_strlen($user["current_password"]) <= 255 &&
    password_verify($user["current_password"], $user["db_password"]) &&
    mb_strlen($user["new_password"]) >= 8 &&
    mb_strlen($user["new_password"]) <= 255 &&
    filter_var($user["email"], FILTER_VALIDATE_EMAIL) &&
    is_numeric($user["user_id"])
    ) { 
      return true;
    } else {
      return false;
    }

}
