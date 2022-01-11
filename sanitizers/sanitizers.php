<?php 

/**
 * Removes spaces in the beginning of an element, html/JS tags to avoid SQL Injection, and special caracters like <,&,>,"",'' to HTML entities  
 * @param {*} 
 * @return {string} 
 */

function defaultSanitizer($element) {

  return trim(htmlspecialchars((strip_tags($element))));
}

?>