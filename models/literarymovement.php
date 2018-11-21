<?php 

class literarymovement extends database {

    public $id;
    public $Literarymovement;

    public function listOfAllLiteraryMovements(){
        $query = 'SELECT `id`, `Literarymovement` FROM `DZOPD_Literary_movement`';
        $literarymovement = Database::getInstance()->query($query);
        if($literarymovement->execute()){
            if (is_object($literarymovement)) {
                $result = $literarymovement->fetchAll(PDO::FETCH_OBJ);
            }
        }
    return $result;
    }

    public function insertLiteraryMovement(){
        $query = 'INSERT INTO `DZOPD_Literary_movement` (`Literarymovement`) VALUES (:Literarymovement)';
        $literarymovement = Database::getInstance()->prepare($query);
        $literarymovement->bindValue(':Literarymovement', $this->Literarymovement, PDO::PARAM_STR);
        return $literarymovement->execute();
    }

    public function modifyLiteraryMovement() {
        $query = 'UPDATE `DZOPD_Literary_movement` SET `id` = :id, `Literarymovement` = :Literarymovement WHERE `id` = :id';
        $movementModification = Database::getInstance()->prepare($query);
        $movementModification->bindValue(':id', $this->id, PDO::PARAM_INT);
        $movementModification->bindValue(':Literarymovement', $this->Literarymovement, PDO::PARAM_STR);
        return $movementModification->execute();
    }

    public function displayMovementsDetails() {
        $isCorrect = false;
        $query = 'SELECT `id`, `Literarymovement` FROM `DZOPD_Literary_movement` WHERE `id` = :id';
        $getDetails = Database::getInstance()->prepare($query);
        $getDetails->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($getDetails->execute()) {
            $resultDetails = $getDetails->fetch(PDO::FETCH_OBJ);
            if (is_object($resultDetails)) {
                $this->id = $resultDetails->id;
                $this->Literarymovement = $resultDetails->Literarymovement;
                $isCorrect = true;
            }
        }
        return $isCorrect;
    }
}