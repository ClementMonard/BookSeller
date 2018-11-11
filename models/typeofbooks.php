<?php

class typeofbooks extends database {

    public $id;
    public $name;

    public function __construct(){
        parent::__construct();
        $this->dbConnection();
    }

    public function getNameOfLiteraryGenres(){
        $query = 'SELECT `name` FROM `DZOPD_typeofbooks`';
        $nameResult = $this->db->prepare($query);
        if ($nameResult->execute()){
        if (is_object($nameResult)) {
            return $nameList = $nameResult->fetchAll(PDO::FETCH_OBJ);
        } else {
            return array();
        }
      }   
    }
}