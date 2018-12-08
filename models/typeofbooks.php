<?php

class typeofbooks extends database {

    public $id;
    public $type;

    /**
     * Méthode qui permet d'afficher tous les types de livres
     */

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

     /**
     * Méthode qui permet d'insérer un nouveau type de livre en base via la page admnistrateur
     */

    public function insertType(){
        $query = 'INSERT INTO `DZOPD_typeofbooks` (`type`) VALUES (:type)';
        $type = Database::getInstance()->prepare($query);
        $type->bindValue(':type', $this->type, PDO::PARAM_STR);
        return $type->execute();
    }

    /**
     * Méthode qui permet la modification d'un type de livre via la page admnistrateur
     */

    public function modifyTypeOfBook() {
        $query = 'UPDATE `DZOPD_typeofbooks` SET `id` = :id, `type` = :type WHERE `id` = :id';
        $userModification = Database::getInstance()->prepare($query);
        $userModification->bindValue(':id', $this->id, PDO::PARAM_INT);
        $userModification->bindValue(':type', $this->type, PDO::PARAM_STR);
        return $userModification->execute();
    }

    /**
     * Méthode qui permet d'obtenir le nom d'un type de livre directement dans un formulaire pour permettre la modification
     * de celui-ci via la page admnistrateur
     */

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


