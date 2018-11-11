<?php 

class favorites extends database {
    public $id;


    public function __construct(){
        parent::__construct();
        $this->dbConnection();
    }
}