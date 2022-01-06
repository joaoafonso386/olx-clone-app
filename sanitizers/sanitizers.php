<?php 

function defaultSanitizer($element) {

  return trim(htmlspecialchars((strip_tags($element))));
}



?>