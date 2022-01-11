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

  public function createComment($comment, $user_id) {
   
    $sql = "
    INSERT INTO 
      ad_comments (description, ad_id, user_id) 
    VALUES 
      (?, ?, ?)
    ";

    $query= $this->db->prepare($sql);
        
    $result = $query->execute([$comment["description"], $comment["ad_id"], $user_id]);
        
    return $result ? $this->db->lastInsertId() : 0;

  }

}