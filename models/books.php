<?php

class books extends database {

    public $id;
    public $name;
    public $cover;
    public $date;
    public $ISBN;
    public $resume;


    public function __construct(){
        parent::__construct();
        $this->dbConnection();
    }

    public function displayAllDetailsOfBooks(){
        $query = 'SELECT `name`, `cover`, `date`, `ISBN`, `resume` FROM `DZOPD_books`';
        $booksResult = $this->db->prepare($query);
        if ($booksResult->execute()){
        if (is_object($booksResult)) {
            return $detailsList = $booksResult->fetchAll(PDO::FETCH_OBJ);
        }
        } else {
            return array();
        }
    }
}