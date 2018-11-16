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
        $literarymovement->bindValue(':literarymovement', $this->literarymovement, PDO::PARAM_STR);
        return $literarymovement->execute();
    }
}