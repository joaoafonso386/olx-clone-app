<?php

require_once("base.php");

class Categories extends Base
{

  public function getAllCategories() {

    $sql = "
      SELECT category_id, name, image, permalink
      FROM categories
    ";

    $query = $this->db->prepare($sql);
    $query->execute();

    return $query->fetchAll( PDO::FETCH_ASSOC );

  }

}