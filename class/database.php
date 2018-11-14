<?php 

class database {

    public $pdo;
    protected $host = '';
    protected $dbname = '';
    protected $charset = '';
    protected $account = '';
    protected $password = '';
    private static $_instance;

    public function __construct() {
        $this->host = HOST;
        $this->port = PORT;
        $this->dbname = DBNAME;
        $this->charset = CHARSET;
        $this->account = ACCOUNT;
        $this->password = PASSWORD;
    
        try {
            $this->pdo = new PDO('mysql:host=' . $this->host . ';port=3306;dbname=' . $this->dbname . ';charset=UTF8;', $this->account, $this->password);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    
    /**
     * 
     * Setting up a Singleton for making sure to have only one instance of your class during the entire execution of the script.
     * 
     */
    public static function getInstance()
     {
         if (is_null(self::$_instance))
         {
             self::$_instance = new self();
         }
         return self::$_instance;
     }
}

