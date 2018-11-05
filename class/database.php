<?php 

class database {

    protected $db;
    protected $host = '';
    protected $dbname = '';
    protected $charset = '';
    protected $account = '';
    protected $password = '';

    public function __construct() {
        $this->host = HOST;
        $this->port = PORT;
        $this->dbname = DBNAME;
        $this->charset = CHARSET;
        $this->account = ACCOUNT;
        $this->password = PASSWORD;
    }

     protected function dbConnection(){
        try {
            $this->db = new PDO('mysql:host=' . $this->host . ';port=3306;dbname=' . $this->dbname . ';charset=UTF8;', $this->account, $this->password);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    
    }

    public function __destruct() {
        $this->db = NULL;
    }
}

