<?php


/**
 * Formatter for dates
 * @param {string} $format_type 
 * @param {string} $time_stamp 
 */

function dateFormatter($time_stamp, $format_type = "j/n/Y") {

  $create_date = date_create($time_stamp);
  $ad_date = date_format($create_date, $format_type);

  return $ad_date;

}

/**
 * Function to create a permalink. Ideally we would use a library like Slugify
 * @param {string} $text 
 * @param {string} $divider
 */

function createPermalink($text, $divider = "-") {
  
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  $text = preg_replace('~[^-\w]+~', '', $text);

  $text = trim($text, $divider);

  $text = preg_replace('~-+~', $divider, $text);

  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;

}

?>