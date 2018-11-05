<?php

include 'configuration.php';

class users extends database {

    public $id = 0;
    public $password = '';
    public $name = '';
    public $mail = '';
    public $role = 1;

    public function __construct(){
        parent::__construct();
        $this->dbConnection();
    }

    public function addUserToDatabase(){
        $query = 'INSERT INTO `DZOPD_users` (`name`, `mail`, `password`) VALUES (:name, :mail, :password)';
        $result = $this->db->prepare($query);
        $result->bindValue(':name', $this->name, PDO::PARAM_STR);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $result->bindValue(':password', $this->password, PDO::PARAM_STR);
        return $result->execute();
    }
    
    public function checkingIfTheUserAlreadyExists(){
        $state = false;
        $query = 'SELECT COUNT(`id`) AS `count` FROM `DZOPD_users` WHERE `name` = :name';
        $result = $this->db->prepare($query);
        $result->bindValue(':name', $this->name, PDO::PARAM_STR);
        if ($result->execute()) {
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            $state = $selectResult->count;
        }
        return $state;
    }

    public function UserConnectingToHisAccount() {
        $state = false;
        $query = 'SELECT `id`, `name`, `password` FROM `DZOPD_users` WHERE `name` = :name';
        $result = $this->db->prepare($query);
        $result->bindValue(':name', $this->name, PDO::PARAM_STR);
        if ($result->execute()) { //On vérifie que la requête s'est bien exécutée
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            if (is_object($selectResult)) { //On vérifie que l'on a bien trouvé un utilisateur
                // On hydrate
                $this->name = $selectResult->name;
                $this->password = $selectResult->password;
                $this->id = $selectResult->id;
                $state = true;
            }
        }
        return $state;
    }
}