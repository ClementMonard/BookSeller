<?php

class books extends database {

    public $id;
    public $name;
    public $cover;
    public $date;
    public $ISBN;
    public $resume;


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

    public function deleteBookBecauseOfTheSuppressionOfHisAuthor() {
      $query = 'DELETE FROM `DZOPD_books` WHERE `id` = :id';
      $deleteBook = Database::getInstance()->prepare($query);
      $deleteBook->bindValue(':id', $this->id, PDO::PARAM_INT);
      return $deleteBook->execute();
    }

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

    public function detailsBooksByType(){
        $query = ' SELECT'
      .  '`bk`.`name`,'
      .  '`bk`.`cover`,'
      .  '`bk`.`date`,'
      .  '`bk`.`ISBN`,'
      .  '`bk`.`resume`,'
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
        .     'WHERE `tob`.`id` = :idType '
  .  'GROUP BY `bk`.`id` , `ath`.`lastname` , `ath`.`firstname` , `ath`.`dateOfBirth` , `ath`.`dateOfDeath` , `tob`.`type`,`lm`.`Literarymovement`, `tob`.`id`'
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

    public function detailsBooks(){
      $query = ' SELECT'
    .  '`bk`.`name`,'
    .  '`bk`.`cover`,'
    .  '`bk`.`date`,'
    .  '`bk`.`ISBN`,'
    .  '`bk`.`resume`,'
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
.  'GROUP BY `bk`.`id` , `ath`.`lastname` , `ath`.`firstname` , `ath`.`dateOfBirth` , `ath`.`dateOfDeath` , `tob`.`type`,`lm`.`Literarymovement`, `tob`.`id`'
.  'ORDER BY `bk`.`id`';
      $books = Database::getInstance()->prepare($query);
      if($books->execute()){
          if (is_object($books)) {
              $result = $books->fetchAll(PDO::FETCH_OBJ);
          }
      }
return $result;
  }
}