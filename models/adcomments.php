<?php

require_once("base.php");

class AdComments extends Base
{

  public function getCommentsByAdId($id) {

    $sql = "
    SELECT a.description, a.created_at, u.first_name, u.last_name
    FROM ad_comments as a
    INNER JOIN users as u USING(user_id)
    WHERE ad_id = ?
    ";

    $query = $this->db->prepare($sql);
    $query->execute([ $id ]);

    return $query->fetchAll( PDO::FETCH_ASSOC );

  }

}