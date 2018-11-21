<?php

class author extends database {
    
    public $id;
    public $lastname;
    public $firstname;
    public $dateOfBirth;
    public $dateOfDeath;

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

    public function insertAuthor(){
        $query = 'INSERT INTO `DZOPD_author` (`lastname`, `firstname`, `dateOfBirth`, `dateOfDeath`) VALUES (:lastname, :firstname, :dateOfBirth, :dateOfDeath)';
        $author = Database::getInstance()->prepare($query);
        $author->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $author->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $author->bindValue(':dateOfBirth', $this->dateOfBirth, PDO::PARAM_STR);
        $author->bindValue(':dateOfDeath', $this->dateOfDeath, PDO::PARAM_STR);
        return $author->execute();
    }

    public function deleteMainAuthor(){
        $query = 'DELETE FROM `DZOPD_author` WHERE `id` = :authorID';
        $deleteUser = Database::getInstance()->prepare($query);
        $deleteUser->bindValue(':authorID', $this->authorID, PDO::PARAM_INT);
        return $deleteUser->execute();
    }
}