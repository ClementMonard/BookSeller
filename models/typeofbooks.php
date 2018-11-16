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

}


