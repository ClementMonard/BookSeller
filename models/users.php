<?php

class users extends database {

    public $id = 0;
    public $password = '';
    public $name = '';
    public $mail = '';
    public $rank;

    public function __construct(){
        $database = database::getInstance();
        $this->pdo = $database->pdo;
    }

    /**
     * Function that can add a registration of a new user in the database
     */

    public function addUserToDatabase(){
        $query = 'INSERT INTO `DZOPD_users` (`name`, `mail`, `password`) VALUES (:name, :mail, :password)';
        $result = $this->pdo->prepare($query);
        $result->bindValue(':name', $this->name, PDO::PARAM_STR);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $result->bindValue(':password', $this->password, PDO::PARAM_STR);
        return $result->execute();
    }
    

    /**
     * Function that check if a user with the same username already exists in the database.
     * @return boolean
     */

    public function checkingIfTheUserAlreadyExists(){
        $state = false;
        $query = 'SELECT COUNT(`id`) AS `count` FROM `DZOPD_users` WHERE `name` = :name';
        $result = $this->pdo->prepare($query);
        $result->bindValue(':name', $this->name, PDO::PARAM_STR);
        if ($result->execute()) {
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            $state = $selectResult->count;
        }
        return $state;
    }


    /**
     * Function that can grant the possibility for the user to be connected at his account.
     * @return boolean
     */

    public function UserConnectingToHisAccount() {
        $state = false;
        $query = 'SELECT `id`, `name`, `password`, `rank` FROM `DZOPD_users` WHERE `name` = :name';
        $result = $this->pdo->prepare($query);
        $result->bindValue(':name', $this->name, PDO::PARAM_STR);
        if ($result->execute()) { //Checking out if the request is well executed
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            if (is_object($selectResult)) { //Checking out if we found a user
                //Hydration
                $this->rank = $selectResult->rank;
                $this->name = $selectResult->name;
                $this->password = $selectResult->password;
                $this->id = $selectResult->id;
                $state = true;
            }
        }
        return $state;
    }

    public function displayUsersDetails() {
        $isCorrect = false;
        $query = 'SELECT `id`, `name`, `mail`, `rank` FROM `DZOPD_users` WHERE `id` = :id';
        $getDetails = $this->pdo->prepare($query);
        $getDetails->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($getDetails->execute()) {
            $resultDetails = $getDetails->fetch(PDO::FETCH_OBJ);
            if (is_object($resultDetails)) {
                $this->id = $resultDetails->id;
                $this->name = $resultDetails->name;
                $this->mail = $resultDetails->mail;
                $this->rank = $resultDetails->rank;
                $isCorrect = true;
            }
        }
        return $isCorrect;
    }

    public function getUsersList() {
        //Récupération des données en déterminant la requête souhaitée
        $query = 'SELECT `id`, `name`, `mail`, `rank` FROM `DZOPD_users`';
        $userResult = $this->pdo->query($query);
        if (is_object($userResult)) {
            return $patientList = $userResult->fetchAll(PDO::FETCH_OBJ);
        } else {
            return array();
        }
    }
}