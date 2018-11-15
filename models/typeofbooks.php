<?php

class typeofbooks extends database {

    public $id;
    public $type;

    public function __construct(){
        $database = database::getInstance();
        $this->pdo = $database->pdo;
    }

    public function getNameOfLiteraryGenres(){
        $query = 'SELECT `id`,`type` FROM `DZOPD_typeofbooks`';
        $nameResult = $this->pdo->prepare($query);
        if ($nameResult->execute()){
        if (is_object($nameResult)) {
            return $nameList = $nameResult->fetchAll(PDO::FETCH_OBJ);
        } else {
            return array();
        }
      }   
    }
}