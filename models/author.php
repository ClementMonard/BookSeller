<?php

class author extends database {
    public $id;
    public $lastname;
    public $firstname;
    public $dateOfBirth;
    public $dateOfDeath;


    public function __construct(){
        parent::__construct();
        $this->dbConnection();
    }
}