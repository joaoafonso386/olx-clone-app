<?php
require_once("base.php");

class Countries extends Base {

  public function getAllCountries() {
    $query = $this->db->prepare("
    SELECT country_code, name
    FROM countries
    ORDER BY name
  ");

  $query->execute();

  return $query->fetchAll( PDO::FETCH_ASSOC );
  }

} 