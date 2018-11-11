<?php 

class literarymovement extends database {
    public $id;
    public $name;

    public function __construct(){
        parent::__construct();
        $this->dbConnection();
    }
}