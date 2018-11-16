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

    public function insertAuthor(){
        $query = 'INSERT INTO `DZOPD_author` (`lastname`, `firstname`, `dateOfBirth`, `dateOfDeath`) VALUES (:lastname, :firstname, :dateOfBirth, :dateOfDeath)';
        $author = Database::getInstance()->prepare($query);
        $author->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $author->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $author->bindValue(':dateOfBirth', $this->dateOfBirth, PDO::PARAM_STR);
        $author->bindValue(':dateOfDeath', $this->dateOfDeath, PDO::PARAM_STR);
        return $author->execute();
    }
}