<?php 

class literarymovement extends database {

    public $id;
    public $Literarymovement;

    /**
     * Méthode qui permet d'afficher la totalité des courants littéraire
     */

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

    /**
     * Méthode qui permet d'insérer un nouveau courant littéraire en base
     */

    public function insertLiteraryMovement(){
        $query = 'INSERT INTO `DZOPD_Literary_movement` (`Literarymovement`) VALUES (:Literarymovement)';
        $literarymovement = Database::getInstance()->prepare($query);
        $literarymovement->bindValue(':Literarymovement', $this->Literarymovement, PDO::PARAM_STR);
        return $literarymovement->execute();
    }

    /**
     * Méthode qui permet la modification du nom d'un courant littéraire
     */

    public function modifyLiteraryMovement() {
        $query = 'UPDATE `DZOPD_Literary_movement` SET `id` = :id, `Literarymovement` = :Literarymovement WHERE `id` = :id';
        $movementModification = Database::getInstance()->prepare($query);
        $movementModification->bindValue(':id', $this->id, PDO::PARAM_INT);
        $movementModification->bindValue(':Literarymovement', $this->Literarymovement, PDO::PARAM_STR);
        return $movementModification->execute();
    }

    /**
     * Méthode qui permet d'afficher les détails du courant littéraire directement dans un formulaire pour permettre la modification
     * de celui-ci
     */

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