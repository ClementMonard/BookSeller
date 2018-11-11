<?php 

class comments extends database {
    public $id;
    public $hour;
    public $date;
    public $message;
    public $idComments;

    
    public function __construct(){
        parent::__construct();
        $this->dbConnection();
    }
}