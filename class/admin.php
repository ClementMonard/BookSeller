<?php

class admin extends database {

    public function __construct(){
        parent::__construct();
        $this->dbConnection();
    }
}