<?php


/**
 * Formater for dates
 * @param format_type string
 * @param time_stamp TIME_STAMP
 */

function dateFormater($time_stamp, $format_type = "j/n/Y") {

  $create_date = date_create($time_stamp);
  $ad_date = date_format($create_date, $format_type);

  return $ad_date;

}