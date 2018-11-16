<?php 

class Database {

    private static $_instance;
    
    public static function getInstance() { 
        
    if(is_null(self::$_instance)){
        try {
        self::$_instance = new PDO('mysql:host=' .HOST. ';port=' .PORT. ';dbname=' .DBNAME. ';charset=' .CHARSET. ';', ACCOUNT, PASSWORD);          
        self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //TODO REMOVE TO AVOID DISPLAYING SQL ERROR
        } catch (Exception $e) { // catch error message
            die('Erreur : ' . $e->getMessage());
        }
    }
    return self::$_instance;
 }

    
    /**
     * 
     * Setting up a Singleton for making sure to have only one instance of your class during the entire execution of the script.
     * 
     */

     public function getLastInsertId() {
        $result = 0;
        $query = 'SELECT LAST_INSERT_ID() AS `id`';
        $result = self::getInstance()->prepare($query);
        if($result->execute()){
            if (is_object($result)) {
                $result = $result->fetch(PDO::FETCH_COLUMN);
            }
        }
        return $result;
    }
}

