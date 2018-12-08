<?php 

class comments extends database {

    public $id;
    public $date;
    public $message;
    public $id_DZOPD_users;
    public $id_DZOPD_books;

    /**
     * Méthode qui permet à un utilisateur de poster un commentaire sur un livre
     */

    public function insertComments(){
        $query = 'INSERT INTO `DZOPD_comments` (`message`, `date`, `id_DZOPD_users`, `id_DZOPD_books`) VALUES (:message, NOW(), :id_DZOPD_users, :id_DZOPD_books)';
        $comments = Database::getInstance()->prepare($query);
        $comments->bindValue(':message', $this->message, PDO::PARAM_STR);
        $comments->bindValue(':id_DZOPD_users', $this->id_DZOPD_users, PDO::PARAM_INT);
        $comments->bindValue(':id_DZOPD_books', $this->id_DZOPD_books, PDO::PARAM_INT);
        return $comments->execute();
    }

    /**
     * Méthode qui permet d'afficher tous les commentaires liés à un livre et à son utilisateur
     */

    public function displayCommentsByBook(){
        $query = 'SELECT 
        `cmts`.`id` AS `idComment`,`cmts`.`message`,  DATE_FORMAT(`cmts`.`date`, "%d/%m/%Y %h:%i:%s") AS `date`, `usr`.`name`, `bk`.`id` AS `idBook`
    FROM
        `DZOPD_comments` AS `cmts`
            LEFT JOIN
        `DZOPD_users` AS `usr` ON `usr`.`id` = `cmts`.`id_DZOPD_users`
            LEFT JOIN
        `DZOPD_books` AS `bk` ON `bk`.`id` = `cmts`.`id_DZOPD_books`
    WHERE
        `bk`.`id` = :id
    GROUP BY `cmts`.`id`
    ORDER BY `cmts`.`id` DESC';
      $comments = Database::getInstance()->prepare($query);
      $comments->bindValue(':id', $this->idBook, PDO::PARAM_INT);
      if($comments->execute()){
        if (is_object($comments)) {
            $result = $comments->fetchAll(PDO::FETCH_OBJ);
        }
    }
    return $result;
  }

  /**
     * Méthode qui permet de récupérer les id des commentaires
     */

    public function getIdComment(){
        $query = 'SELECT 
        `cmts`.`id` AS `idComment`, `bk`.`id` AS `idBook`
    FROM
        `DZOPD_comments` AS `cmts`
            LEFT JOIN
        `DZOPD_users` AS `usr` ON `usr`.`id` = `cmts`.`id_DZOPD_users`
            LEFT JOIN
        `DZOPD_books` AS `bk` ON `bk`.`id` = `cmts`.`id_DZOPD_books`
    WHERE
        `bk`.`id` = :id
    GROUP BY `cmts`.`id`
    ORDER BY `cmts`.`id`';
        $comments = Database::getInstance()->prepare($query);
        $comments->bindValue(':id', $this->id, PDO::PARAM_INT);
        if($comments->execute()){
            if (is_object($comments)) {
                $result = $comments->fetchAll(PDO::FETCH_OBJ);
            }
        }
        return $result;
    }
}