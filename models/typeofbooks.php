<?php

class typeofbooks extends database {

    public $id;
    public $type;

    public function getNameOfLiteraryGenres(){
        $query = 'SELECT `id`,`type` FROM `DZOPD_typeofbooks`';
        $type = Database::getInstance()->query($query);
        if($type->execute()){
            if (is_object($type)) {
                $result = $type->fetchAll(PDO::FETCH_OBJ);
            }
        }
  return $result;
    }

    public function insertType(){
        $query = 'INSERT INTO `DZOPD_typeofbooks` (`type`) VALUES (:type)';
        $type = Database::getInstance()->prepare($query);
        $type->bindValue(':type', $this->type, PDO::PARAM_STR);
        return $type->execute();
    }

    public function modifyTypeOfBook() {
        $query = 'UPDATE `DZOPD_typeofbooks` SET `id` = :id, `type` = :type WHERE `id` = :id';
        $userModification = Database::getInstance()->prepare($query);
        $userModification->bindValue(':id', $this->id, PDO::PARAM_INT);
        $userModification->bindValue(':type', $this->type, PDO::PARAM_STR);
        return $userModification->execute();
    }

    public function displayTypesDetails() {
        $isCorrect = false;
        $query = 'SELECT `id`, `type` FROM `DZOPD_typeofbooks` WHERE `id` = :id';
        $getDetails = Database::getInstance()->prepare($query);
        $getDetails->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($getDetails->execute()) {
            $resultDetails = $getDetails->fetch(PDO::FETCH_OBJ);
            if (is_object($resultDetails)) {
                $this->id = $resultDetails->id;
                $this->type = $resultDetails->type;
                $isCorrect = true;
            }
        }
        return $isCorrect;
    }

}


