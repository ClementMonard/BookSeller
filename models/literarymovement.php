<?php 

class literarymovement extends database {

    public $id;
    public $Literarymovement;

    public function __construct(){
        $database = database::getInstance();
        $this->pdo = $database->pdo;
    }

    public function listOfAllLiteraryMovements(){
        $query = 'SELECT `id`, `Literarymovement` FROM `DZOPD_Literary_movement`';
        $literarymovement = $this->pdo->prepare($query);
        if($literarymovement->execute()){
            if (is_object($literarymovement)) {
                $result = $literarymovement->fetchAll(PDO::FETCH_OBJ);
            }
        }
    return $result;
    }
}