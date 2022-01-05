<?php 

header("Content-Type: text/html; charset=utf-8");

function defaultSanitizer($element) {

  return trim(htmlspecialchars((strip_tags($element))));
}



?>