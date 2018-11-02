<?php

class typeofbooks extends database {

    public $id;
    public $name;

    public function getNameOfLiteraryGenres(){
        $query = 'SELECT `name` FROM `VNBIOPS_typeofbooks`';
        $nameResult = $this->db->query($query);
        if (is_object($nameResult)) {
            return $nameList = $nameResult->fetchAll(PDO::FETCH_OBJ);
        } else {
            return array();
        }
    }
}