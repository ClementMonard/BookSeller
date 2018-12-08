<?php

class books extends database {

    public $id;
    public $name;
    public $cover;
    public $date;
    public $ISBN;
    public $resume;

    /**
     * Méthode qui permet de vérifier si un livre venant d'être enregistré grâce au formulaire possède le même nom qu'un livre
     * déjà présent en base
     */


    public function checkingIfTheBookAlreadyExists(){
      $state = false;
      $query = 'SELECT COUNT(`id`) AS `count` FROM `DZOPD_books` WHERE `name` = :name';
      $result = Database::getInstance()->prepare($query);
      $result->bindValue(':name', $this->name, PDO::PARAM_STR);
      if ($result->execute()) {
          $selectResult = $result->fetch(PDO::FETCH_OBJ);
          $state = $selectResult->count;
      }
      return $state;
  }

  /**
     * Méthode qui permet de récupérer le nom et la couverture d'un livre pour la barre de recherche qui permet la recherche
     * d'un livre
     */

    public function getNameOfBook() {
      $query = 'SELECT `name`, `cover` FROM `DZOPD_books` WHERE `name` LIKE :name';
      $books = Database::getInstance()->prepare($query);
      $books->bindValue(':name','%' . $this->name . '%', PDO::PARAM_STR);
    if($books->execute()){
      if (is_object($books)) {
          $result = $books->fetchAll(PDO::FETCH_OBJ);
      }
  }
  return $result;
}

    /**
     * Méthode qui permet de récupérer tous les livres liés au même type de livre pour pouvoir les afficher dans l'application
     * de recherche de livre
     */

    public function displayBookByHisName(){
      $query = 'SELECT 
      `bk`.`cover`,
      `bk`.`id`
  FROM
      `DZOPD_books` AS `bk`
          LEFT JOIN
      `DZOPD_typeofbooksOfBooks` AS `tobob` ON `tobob`.`id_DZOPD_books` = `bk`.`id`
          LEFT JOIN
      `DZOPD_typeofbooks` AS `tob` ON `tob`.`id` = `tobob`.`id_DZOPD_typeofbooks`
            WHERE
      `tob`.`type` = (SELECT 
              `tob`.`type`
          FROM
              `DZOPD_books` AS `bk`
                  LEFT JOIN
              `DZOPD_typeofbooksOfBooks` AS `tobob` ON `tobob`.`id_DZOPD_books` = `bk`.`id`
                  LEFT JOIN
              `DZOPD_typeofbooks` AS `tob` ON `tob`.`id` = `tobob`.`id_DZOPD_typeofbooks`
          WHERE
              `bk`.`name` = :book)';
    $books = Database::getInstance()->prepare($query);
    $books->bindValue(':book', $this->name, PDO::PARAM_STR);
    if($books->execute()){
      if (is_object($books)) {
          $result = $books->fetchAll(PDO::FETCH_OBJ);
      }
  }
  return $result;
}

     /**
     * Méthode qui permet d'afficher tous les livres du type de livre saisi dans la barre de recherche
     */

    public function displayBooksByHisTypeApp($type){
      $query = 'SELECT' 
    .  '`bk`.`cover`,'
    .  '`bk`.`id`'
    .       'FROM 
        `DZOPD_books` AS `bk`'
        .  'LEFT JOIN
      `DZOPD_typeofbooksOfBooks` AS `tobob` ON `tobob`.`id_DZOPD_books` = `bk`.`id`'
        .  'LEFT JOIN
      `DZOPD_typeofbooks` AS `tob` ON `tob`.`id` = `tobob`.`id_DZOPD_typeofbooks`'
    .       'WHERE 
      `tob`.`type` = :type ';
    $books = Database::getInstance()->prepare($query);
    $books->bindValue(':type', $type, PDO::PARAM_STR);
    if($books->execute()){
      if (is_object($books)) {
          $result = $books->fetchAll(PDO::FETCH_OBJ);
      }
  }
  return $result;
}

public function displayBooksByHisLmApp($type){
  $query = 'SELECT 
  `bk`.`cover`, `bk`.`id`
FROM
  `DZOPD_books` AS `bk`
      INNER JOIN
  `DZOPD_literarymovementsbooks` AS `lmob` ON `lmob`.`id_DZOPD_books` = `bk`.`id`
      INNER JOIN
  `DZOPD_Literary_movement` AS `lm` ON `lm`.`id` = `lmob`.`id_DZOPD_Literary_movement`
WHERE
  `lm`.`Literarymovement` = :type ';
$books = Database::getInstance()->prepare($query);
$books->bindValue(':type', $type, PDO::PARAM_STR);
if($books->execute()){
  if (is_object($books)) {
      $result = $books->fetchAll(PDO::FETCH_OBJ);
  }
}
return $result;
}

    /**
     * Méthode qui permet d'afficher tous les livres du courant littéraire saisi dans la barre de recherche
     */

    public function displayBooksByDescOrder() {
      $query = 'SELECT * FROM `DZOPD_books` ORDER BY `DZOPD_books`.`id` DESC LIMIT 10';
      $books = Database::getInstance()->query($query);
      if($books->execute()){
          if (is_object($books)) {
              $result = $books->fetchAll(PDO::FETCH_OBJ);
          }
      }
      return $result;
    }

    /**
     * Méthode qui permet d'insérer un livre enregistré via la page admnistrateur dans la base
     */


    public function insertBooks() {
      $query = 'INSERT INTO `DZOPD_books` (`name`, `cover`, `date`, `ISBN`, `resume`) VALUES (:name, :cover, :date, :ISBN, :resume)';
        $books = Database::getInstance()->prepare($query);
        $books->bindValue(':name', $this->name, PDO::PARAM_STR);
        $books->bindValue(':cover', $this->cover, PDO::PARAM_STR);
        $books->bindValue(':date', $this->date, PDO::PARAM_STR);
        $books->bindValue(':ISBN', $this->ISBN, PDO::PARAM_STR);
        $books->bindValue(':resume', $this->resume, PDO::PARAM_STR);
        return $books->execute();
    }

    /**
     * Méthode qui permet la modification d'un livre via la page admnistrateur
     */

    public function modifyBooks() {
      $query = 'UPDATE `DZOPD_books` SET `name` = :name, `date` = :date, `ISBN` = :ISBN, `resume` = :resume WHERE `id` = :id';
      $bookModification = Database::getInstance()->prepare($query);
      $bookModification->bindValue(':id', $this->id, PDO::PARAM_INT);
      $bookModification->bindValue(':name', $this->name, PDO::PARAM_STR);
      $bookModification->bindValue(':date', $this->date, PDO::PARAM_STR);
      $bookModification->bindValue(':ISBN', $this->ISBN, PDO::PARAM_STR);
      $bookModification->bindValue(':resume', $this->resume, PDO::PARAM_STR);
      return $bookModification->execute();
  }

  /**
     * Méthode qui permet la suppression d'un livre via la page administrateur
     */

    public function deleteMainBook() {
      $query = 'DELETE FROM `DZOPD_books` WHERE `id` = :id';
      $deleteBook = Database::getInstance()->prepare($query);
      $deleteBook->bindValue(':id', $this->id, PDO::PARAM_INT);
      return $deleteBook->execute();
    }

    /**
     * Méthode qui permet d'afficher tous les détails d'un livre pour permettre la modification de celui-ci via la page admnistrateur
     */

    public function displayAllDetailsOfBooks(){
        $query = 'SELECT `name`, `cover`, `date`, `ISBN`, `resume` FROM `DZOPD_books`';
        $booksResult = $this->pdo->query($query);
        if ($booksResult->execute()){
        if (is_object($booksResult)) {
            return $detailsList = $booksResult->fetchAll(PDO::FETCH_OBJ);
        }
        } else {
            return array();
        }
    }

    /**
     * Méthode qui permet de filtrer les livres selon leurs courants littéraire et de les afficher
     */


    public function detailsBooksByLiteraryMovement(){
      $query = ' SELECT'
    .  '`bk`.`id` AS `bookID`,'  
    .  '`bk`.`name`,'
    .  '`bk`.`cover`,'
    .  '`bk`.`date`,'
    .  '`bk`.`ISBN`,'
    .  '`bk`.`resume`,'
    .  '`ath`.`id` AS `authorID`,'
    .  '`ath`.`lastname`,'
    .  '`ath`.`firstname`,'
    .  '`ath`.`dateOfBirth`,'
    .  '`ath`.`dateOfDeath`,'
    .  '`tob`.`type`,'
    .  '`tob`.`id`,'
    .  '`lm`.`Literarymovement`,'
    .  'COUNT(`com`.`message`) AS `countMessage`,'
    .  'COUNT(`not`.`notation`) AS `countNotation`'
 . 'FROM
      `DZOPD_books` AS `bk`' 
    .      'INNER JOIN
      `DZOPD_authorbooks` AS `athbk` ON `athbk`.`id_DZOPD_books` = `bk`.`id`'
    .      'INNER JOIN
      `DZOPD_author` AS `ath` ON `ath`.`id` = `athbk`.`id_DZOPD_author`'
    .      'LEFT JOIN
      `DZOPD_typeofbooksOfBooks` AS `tobob` ON `tobob`.`id_DZOPD_books` = `bk`.`id`'
    .      'LEFT JOIN
      `DZOPD_typeofbooks` AS `tob` ON `tob`.`id` = `tobob`.`id_DZOPD_typeofbooks`'
    .      'LEFT JOIN
      `DZOPD_comments` AS `com` ON `com`.`id_DZOPD_books` = `bk`.`id`'
    .      'LEFT JOIN
      `DZOPD_notation` AS `not` ON `not`.`id_DZOPD_books` = `bk`.`id`'
    .      'LEFT JOIN
      `DZOPD_literarymovementsbooks` AS `lmb` ON `lmb`.`id_DZOPD_books` = `bk`.`id`'
    .      'LEFT JOIN
      `DZOPD_Literary_movement` AS `lm` ON `lm`.`id` = `lmb`.`id_DZOPD_Literary_movement`'
      .     'WHERE `lm`.`id` = :idLm '
.  'GROUP BY `bk`.`id` , `ath`.`lastname` , `ath`.`firstname` , `ath`.`dateOfBirth` , `ath`.`dateOfDeath` , `tob`.`type`,`lm`.`Literarymovement`, `tob`.`id`, `ath`.`id`'
.  'ORDER BY `bk`.`id`';
      $books = Database::getInstance()->prepare($query);
      $books->bindValue(':idLm', $this->idLm, PDO::PARAM_INT);
      if($books->execute()){
          if (is_object($books)) {
              $result = $books->fetchAll(PDO::FETCH_OBJ);
          }
      }
return $result;
  }

  /**
     * Méthode qui permet de filtrer tous les livres selon leurs type et de les afficher
     */

    public function detailsBooksByType(){
        $query = ' SELECT'
      .  '`bk`.`id` AS `bookID`,'  
      .  '`bk`.`name`,'
      .  '`bk`.`cover`,'
      .  '`bk`.`date`,'
      .  '`bk`.`ISBN`,'
      .  '`bk`.`resume`,'
      .  '`ath`.`id` AS `authorID`,'
      .  '`ath`.`lastname`,'
      .  '`ath`.`firstname`,'
      .  '`ath`.`dateOfBirth`,'
      .  '`ath`.`dateOfDeath`,'
      .  '`tob`.`type`,'
      .  '`tob`.`id`,'
      .  '`lm`.`Literarymovement`,'
      .  'COUNT(`com`.`message`) AS `countMessage`,'
      .  'COUNT(`not`.`notation`) AS `countNotation`'
   . 'FROM
        `DZOPD_books` AS `bk`' 
      .      'INNER JOIN
        `DZOPD_authorbooks` AS `athbk` ON `athbk`.`id_DZOPD_books` = `bk`.`id`'
      .      'INNER JOIN
        `DZOPD_author` AS `ath` ON `ath`.`id` = `athbk`.`id_DZOPD_author`'
      .      'LEFT JOIN
        `DZOPD_typeofbooksOfBooks` AS `tobob` ON `tobob`.`id_DZOPD_books` = `bk`.`id`'
      .      'LEFT JOIN
        `DZOPD_typeofbooks` AS `tob` ON `tob`.`id` = `tobob`.`id_DZOPD_typeofbooks`'
      .      'LEFT JOIN
        `DZOPD_comments` AS `com` ON `com`.`id_DZOPD_books` = `bk`.`id`'
      .      'LEFT JOIN
        `DZOPD_notation` AS `not` ON `not`.`id_DZOPD_books` = `bk`.`id`'
      .      'LEFT JOIN
        `DZOPD_literarymovementsbooks` AS `lmb` ON `lmb`.`id_DZOPD_books` = `bk`.`id`'
      .      'LEFT JOIN
        `DZOPD_Literary_movement` AS `lm` ON `lm`.`id` = `lmb`.`id_DZOPD_Literary_movement`'
        .     'WHERE `tob`.`id` = :idType '
  .  'GROUP BY `bk`.`id` , `ath`.`lastname` , `ath`.`firstname` , `ath`.`dateOfBirth` , `ath`.`dateOfDeath` , `tob`.`type`,`lm`.`Literarymovement`, `tob`.`id`, `ath`.`id`'
  .  'ORDER BY `bk`.`id`';
        $books = Database::getInstance()->prepare($query);
        $books->bindValue(':idType', $this->idType, PDO::PARAM_INT);
        if($books->execute()){
            if (is_object($books)) {
                $result = $books->fetchAll(PDO::FETCH_OBJ);
            }
        }
  return $result;
    }

    /**
     * Méthode qui permet d'afficher tous les détails d'un livre et de les afficher dans le carousel à l'accueil
     */

    public function detailsBooks(){
      $query = ' SELECT'
    .  '`bk`.`id` AS `bookID`,'  
    .  '`bk`.`name`,'
    .  '`bk`.`cover`,'
    .  '`bk`.`date`,'
    .  '`bk`.`ISBN`,'
    .  '`bk`.`resume`,'
    .  '`ath`.`id` AS `authorID`,'
    .  '`ath`.`lastname`,'
    .  '`ath`.`firstname`,'
    .  '`ath`.`dateOfBirth`,'
    .  '`ath`.`dateOfDeath`,'
    .  '`tob`.`type`,'
    .  '`tob`.`id`,'
    .  '`lm`.`Literarymovement`,'
    .  'COUNT(`com`.`message`) AS `countMessage`,'
    .  'COUNT(`not`.`notation`) AS `countNotation`'
 . 'FROM
      `DZOPD_books` AS `bk`' 
    .      'LEFT JOIN
      `DZOPD_authorbooks` AS `athbk` ON `athbk`.`id_DZOPD_books` = `bk`.`id`'
    .      'LEFT JOIN
      `DZOPD_author` AS `ath` ON `ath`.`id` = `athbk`.`id_DZOPD_author`'
    .      'LEFT JOIN
      `DZOPD_typeofbooksOfBooks` AS `tobob` ON `tobob`.`id_DZOPD_books` = `bk`.`id`'
    .      'LEFT JOIN
      `DZOPD_typeofbooks` AS `tob` ON `tob`.`id` = `tobob`.`id_DZOPD_typeofbooks`'
    .      'LEFT JOIN
      `DZOPD_comments` AS `com` ON `com`.`id_DZOPD_books` = `bk`.`id`'
    .      'LEFT JOIN
      `DZOPD_notation` AS `not` ON `not`.`id_DZOPD_books` = `bk`.`id`'
    .      'LEFT JOIN
      `DZOPD_literarymovementsbooks` AS `lmb` ON `lmb`.`id_DZOPD_books` = `bk`.`id`'
    .      'LEFT JOIN
      `DZOPD_Literary_movement` AS `lm` ON `lm`.`id` = `lmb`.`id_DZOPD_Literary_movement`'
.  'GROUP BY `bk`.`id` , `ath`.`lastname` , `ath`.`firstname` , `ath`.`dateOfBirth` , `ath`.`dateOfDeath` , `tob`.`type`,`lm`.`Literarymovement`, `tob`.`id`, `ath`.`id`'
.  'ORDER BY `bk`.`id`';
      $books = Database::getInstance()->prepare($query);
      if($books->execute()){
          if (is_object($books)) {
              $result = $books->fetchAll(PDO::FETCH_OBJ);
          }
      }
return $result;
  }

  /**
     * Méthode qui permet de récupérer tous les détails d'un livre en cliquant dessus pour l'application principale
     */

   public function detailsBooksById(){
    $query = ' SELECT'
  .  '`bk`.`id` AS `bookID`,'  
  .  '`bk`.`name`,'
  .  '`bk`.`cover`,'
  .  '`bk`.`date`,'
  .  '`bk`.`ISBN`,'
  .  '`bk`.`resume`,'
  .  '`ath`.`id` AS `authorID`,'
  .  '`ath`.`lastname`,'
  .  '`ath`.`firstname`,'
  .  '`ath`.`dateOfBirth`,'
  .  '`ath`.`dateOfDeath`,'
  .  '`tob`.`type`,'
  .  '`tob`.`id`,'
  .  '`lm`.`Literarymovement`,'
  .  'COUNT(`com`.`message`) AS `countMessage`,'
  .  'COUNT(`not`.`notation`) AS `countNotation`'
. 'FROM
    `DZOPD_books` AS `bk`' 
  .      'LEFT JOIN
    `DZOPD_authorbooks` AS `athbk` ON `athbk`.`id_DZOPD_books` = `bk`.`id`'
  .      'LEFT JOIN
    `DZOPD_author` AS `ath` ON `ath`.`id` = `athbk`.`id_DZOPD_author`'
  .      'LEFT JOIN
    `DZOPD_typeofbooksOfBooks` AS `tobob` ON `tobob`.`id_DZOPD_books` = `bk`.`id`'
  .      'LEFT JOIN
    `DZOPD_typeofbooks` AS `tob` ON `tob`.`id` = `tobob`.`id_DZOPD_typeofbooks`'
  .      'LEFT JOIN
    `DZOPD_comments` AS `com` ON `com`.`id_DZOPD_books` = `bk`.`id`'
  .      'LEFT JOIN
    `DZOPD_notation` AS `not` ON `not`.`id_DZOPD_books` = `bk`.`id`'
  .      'LEFT JOIN
    `DZOPD_literarymovementsbooks` AS `lmb` ON `lmb`.`id_DZOPD_books` = `bk`.`id`'
  .      'LEFT JOIN
    `DZOPD_Literary_movement` AS `lm` ON `lm`.`id` = `lmb`.`id_DZOPD_Literary_movement`'
    .     'WHERE `bk`.`id` = :id '
.  'GROUP BY `bk`.`id` , `ath`.`lastname` , `ath`.`firstname` , `ath`.`dateOfBirth` , `ath`.`dateOfDeath` , `tob`.`type`,`lm`.`Literarymovement`, `tob`.`id`, `ath`.`id`'
.  'ORDER BY `bk`.`id`';
    $books = Database::getInstance()->prepare($query);
    $books->bindValue(':id', $this->id, PDO::PARAM_INT);
    if($books->execute()){
        if (is_object($books)) {
            $result = $books->fetchAll(PDO::FETCH_OBJ);
        }
    }
return $result;
}

     /**
     * Méthode qui permet d'afficher tous les détails d'un seul livre permettant l'affichage du profil de celui-ci
     */

    public function detailsForABook(){
      $query = ' SELECT'
    .  '`athbk`.`id` AS `idAuthorBook`,'
    .  '`tobob`.`id` AS `idToBoB`,'
    .  '`lmb`.`id` AS `idLMB`,'
    .  '`bk`.`id` AS `bookID`,'  
    .  '`bk`.`name`,'
    .  '`bk`.`cover`,'
    .  '`bk`.`date`,'
    .  '`bk`.`ISBN`,'
    .  '`bk`.`resume`,'
    .  '`ath`.`id` AS `authorID`,'
    .  '`ath`.`lastname`,'
    .  '`ath`.`firstname`,'
    .  '`ath`.`dateOfBirth`,'
    .  '`ath`.`dateOfDeath`,'
    .  '`tob`.`type`,'
    .  '`tob`.`id`,'
    .  '`lm`.`Literarymovement`,'
    .  'COUNT(`com`.`message`) AS `countMessage`,'
    .  'COUNT(`not`.`notation`) AS `countNotation`'
    . 'FROM
      `DZOPD_books` AS `bk`' 
    .      'LEFT JOIN
      `DZOPD_authorbooks` AS `athbk` ON `athbk`.`id_DZOPD_books` = `bk`.`id`'
    .      'LEFT JOIN
      `DZOPD_author` AS `ath` ON `ath`.`id` = `athbk`.`id_DZOPD_author`'
    .      'LEFT JOIN
      `DZOPD_typeofbooksOfBooks` AS `tobob` ON `tobob`.`id_DZOPD_books` = `bk`.`id`'
    .      'LEFT JOIN
      `DZOPD_typeofbooks` AS `tob` ON `tob`.`id` = `tobob`.`id_DZOPD_typeofbooks`'
    .      'LEFT JOIN
      `DZOPD_comments` AS `com` ON `com`.`id_DZOPD_books` = `bk`.`id`'
    .      'LEFT JOIN
      `DZOPD_notation` AS `not` ON `not`.`id_DZOPD_books` = `bk`.`id`'
    .      'LEFT JOIN
      `DZOPD_literarymovementsbooks` AS `lmb` ON `lmb`.`id_DZOPD_books` = `bk`.`id`'
    .      'LEFT JOIN
      `DZOPD_Literary_movement` AS `lm` ON `lm`.`id` = `lmb`.`id_DZOPD_Literary_movement`'
      .     'WHERE `bk`.`id` = :id '
    .  'GROUP BY `bk`.`id` , `ath`.`lastname` , `ath`.`firstname` , `ath`.`dateOfBirth` , `ath`.`dateOfDeath` , `tob`.`type`,`lm`.`Literarymovement`, `tob`.`id`, `ath`.`id`, `athbk`.`id`, `tobob`.`id`, `lmb`.`id`'
    .  'ORDER BY `bk`.`id`';
      $books = Database::getInstance()->prepare($query);
      $books->bindValue(':id', $this->id, PDO::PARAM_INT);
      if($books->execute()){
          if (is_object($books)) {
              $result = $books->fetch(PDO::FETCH_OBJ);
          }
      }
    return $result;
   }
}