<?php


//Formater for TIME_STAMP type dates
function dateFormater($time_stamp, $format_type = "j/n/Y") {

  $create_date = date_create($time_stamp);
  $ad_date = date_format($create_date, $format_type);

  return $ad_date;

}