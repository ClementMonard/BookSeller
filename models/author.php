<?php

class author extends database {
    
    public $id;
    public $lastname;
    public $firstname;
    public $dateOfBirth;
    public $dateOfDeath;


    /**
     * Méthode qui permet de récupérer la couverture d'un livre lié à son auteur pour permettre l'affichage de tous les livres 
     * de cet auteur disponible sur le site
     */

    public function getCoverOfBookFromHisAuthor(){
        $query = 'SELECT' 
       . '`ath`.`id` AS `idAuthor`,'
       . '`bk`.`id` AS `bookID`,'
       . '`bk`.`cover`'
   . 'FROM
        `DZOPD_author` AS `ath`'
        .    'LEFT JOIN
        `DZOPD_authorbooks` AS `athbk` ON `athbk`.`id_DZOPD_author` = `ath`.`id`'
        .    'LEFT JOIN
        `DZOPD_books` AS `bk` ON `bk`.`id` = `athbk`.`id_DZOPD_books`'
 .   'WHERE `ath`.`id` = :idAuthor '       
 .   'GROUP BY `bk`.`id` , `ath`.`id` , `athbk`.`id`'
 .   'ORDER BY `ath`.`id`';
        $author = Database::getInstance()->prepare($query);
        $author->bindValue(':idAuthor', $this->idAuthor, PDO::PARAM_INT);
        if($author->execute()){
            if (is_object($author)) {
                $result = $author->fetchAll(PDO::FETCH_OBJ);
            }
        }
        return $result;
    }


    /**
     * Méthode qui permet toutes les informations liées à un auteur pour les afficher sur son profil
     */

    public function getBookByAuthor(){
        $query = 'SELECT' 
       . '`ath`.`id` AS `idAuthor`,'
       . '`ath`.`lastname`,'
       . '`ath`.`firstname`,'
       . '`ath`.`dateOfBirth`,'
       . '`ath`.`dateOfDeath`,'
       . '`bk`.`id` AS `bookID`,'
       . '`bk`.`name`,'
       . '`bk`.`cover`'
   . 'FROM
        `DZOPD_author` AS `ath`'
        .    'LEFT JOIN
        `DZOPD_authorbooks` AS `athbk` ON `athbk`.`id_DZOPD_author` = `ath`.`id`'
        .    'LEFT JOIN
        `DZOPD_books` AS `bk` ON `bk`.`id` = `athbk`.`id_DZOPD_books`'
 .   'WHERE `ath`.`id` = :idAuthor '       
 .   'GROUP BY `bk`.`id` , `ath`.`lastname` , `ath`.`firstname` , `ath`.`dateOfBirth` , `ath`.`dateOfDeath` , `ath`.`id` , `athbk`.`id`'
 .   'ORDER BY `ath`.`id`';
        $author = Database::getInstance()->prepare($query);
        $author->bindValue(':idAuthor', $this->idAuthor, PDO::PARAM_INT);
        if($author->execute()){
            if (is_object($author)) {
                $result = $author->fetch(PDO::FETCH_OBJ);
            }
        }
        return $result;
    }

    /**
     * Méthode qui permet d'afficher tous les auteurs enregistrés sur le site via la page administrateur
     */

    public function getValueOfAuthors(){
        $query = 'SELECT `id`, `lastname`, `firstname`, `dateOfBirth`, `dateOfDeath` FROM `DZOPD_author`';
        $author = Database::getInstance()->query($query);
        if($author->execute()){
            if (is_object($author)) {
                $result = $author->fetchAll(PDO::FETCH_OBJ);
            }
        }
        return $result;
    }

    /**
     * Méthode qui permet d'afficher toutes les informations d'un auteur directement dans un formulaire pour permettre la modification
     * de celui-ci directement via la page administrateur
     */

    public function displayAuthorsDetails() {
        $isCorrect = false;
        $query = 'SELECT `id`, `lastname`, `firstname`, `dateOfBirth`, `dateOfDeath` FROM `DZOPD_author` WHERE `id` = :id';
        $getDetails = Database::getInstance()->prepare($query);
        $getDetails->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($getDetails->execute()) {
            $resultDetails = $getDetails->fetch(PDO::FETCH_OBJ);
            if (is_object($resultDetails)) {
                $this->id = $resultDetails->id;
                $this->lastname = $resultDetails->lastname;
                $this->firstname = $resultDetails->firstname;
                $this->dateOfBirth = $resultDetails->dateOfBirth;
                $this->dateOfDeath = $resultDetails->dateOfDeath;
                $isCorrect = true;
            }
        }
        return $isCorrect;
    }

    /**
     * Méthode qui permet d'attribuer le dernier livre enregistré via le formulaire d'ajout de livre via la page administrateur
     * à l'auteur qui est déjà présent dans la base en se basant sur son nom et prénom.
     */

    public function selectIdFromAuthor(){
        $state = 0;
        $query = 'SELECT `id` FROM `DZOPD_author` WHERE `lastname` = :lastname AND `firstname` = :firstname';
        $result = Database::getInstance()->prepare($query);
        $result->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $result->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        if ($result->execute()) {
            $state = $result->fetch(PDO::FETCH_COLUMN);
        }
        return $state;
    }

    /**
     * Méthode qui permettra de vérifier si l'auteur saisi dans le formulaire d'ajout de livre via la page administrateur n'est pas
     * déjà présent dans la base de données, en se basant sur le nom et le prénom de celui-ci.
     */

    public function checkingIfTheAuthorAlreadyExists(){
        $state = false;
        $query = 'SELECT COUNT(`id`) AS `count` FROM `DZOPD_author` WHERE `lastname` = :lastname AND `firstname` = :firstname';
        $result = Database::getInstance()->prepare($query);
        $result->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $result->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        if ($result->execute()) {
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            $state = $selectResult->count;
        }
        return $state;
    }

    /**
     * Méthode qui permet la modification de l'auteur via la page administrateur, notamment pratique pour
     *  l'ajout d'une date de décès.
     */

    public function modifyAuthors() {
        $query = 'UPDATE `DZOPD_author` SET `id` = :id, `lastname` = :lastname, `firstname` = :firstname, `dateOfBirth` = :dateOfBirth, `dateOfDeath` = :dateOfDeath WHERE `id` = :id';
        $authorModification = Database::getInstance()->prepare($query);
        $authorModification->bindValue(':id', $this->id, PDO::PARAM_INT);
        $authorModification->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $authorModification->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $authorModification->bindValue(':dateOfBirth', $this->dateOfBirth, PDO::PARAM_STR);
        $authorModification->bindValue(':dateOfDeath', $this->dateOfDeath, PDO::PARAM_STR);
        return $authorModification->execute();
    }

    /**
     * Méthode qui permettra d'insérer un nouvel auteur si celui-ci n'est pas déjà présent dans la base de données
     */

    public function insertAuthor(){
        $query = 'INSERT INTO `DZOPD_author` (`lastname`, `firstname`, `dateOfBirth`, `dateOfDeath`) VALUES (:lastname, :firstname, :dateOfBirth, :dateOfDeath)';
        $author = Database::getInstance()->prepare($query);
        $author->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $author->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $author->bindValue(':dateOfBirth', $this->dateOfBirth, PDO::PARAM_STR);
        $author->bindValue(':dateOfDeath', $this->dateOfDeath, PDO::PARAM_STR);
        return $author->execute();
    }

    /**
     * Méthode qui permet la suppression d'un auteur
     */

    public function deleteMainAuthor(){
        $query = 'DELETE FROM `DZOPD_author` WHERE `id` = :authorID';
        $deleteUser = Database::getInstance()->prepare($query);
        $deleteUser->bindValue(':authorID', $this->authorID, PDO::PARAM_INT);
        return $deleteUser->execute();
    }
}