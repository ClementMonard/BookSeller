<?php

class users extends Database {

    public $id = 0;
    public $password = '';
    public $name = '';
    public $mail = '';
    public $rank;
    public $id_DZOPD_books;

    /**
     * Function that can add a registration of a new user in the database
     */

    public function displayFavorite() {
        $query = 'SELECT'
      . '`id_DZOPD_books`,'
      . '`bk`.`cover`,'
      . '`bk`.`name`'
      .     'FROM
         `DZOPD_users`'
      .   'LEFT JOIN
        `DZOPD_books` AS `bk` ON `bk`.`id` = `DZOPD_users`.`id_DZOPD_books`'
      .    'WHERE
        `DZOPD_users`.`id` = :id';
        $result = Database::getInstance()->prepare($query);
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        $result->execute();
        if (is_object($result)) {
            $isObjectResult = $result->fetch(PDO::FETCH_OBJ);
        }
        return $isObjectResult;
    }

    public function addBookToFavorite(){
        $query = 'INSERT INTO `DZOPD_users` (`id_DZOPD_books`) VALUES (:id_DZOPD_books)';
        $result = Database::getInstance()->prepare($query);
        $result->bindValue(':id_DZOPD_books', $this->id_DZOPD_books, PDO::PARAM_INT);
        return $result->execute();
    }

    public function updateName(){
        $state = false;
        $query = 'UPDATE `DZOPD_users` SET `name` = :name WHERE `id` = :id';
        $user = Database::getInstance()->prepare($query);
        $user->bindValue(':id', $this->id, PDO::PARAM_INT);
        $user->bindValue(':name', $this->name, PDO::PARAM_STR);
        if ($user->execute()) { 
            $state = true;
        }
        return $state;
    }

    public function updatePassword(){
        $state = false;
        $query = 'UPDATE `DZOPD_users` SET `password` = :password WHERE `id` = :id';
        $user = Database::getInstance()->prepare($query);
        $user->bindValue(':id', $this->id, PDO::PARAM_INT);
        $user->bindValue(':password', $this->password, PDO::PARAM_STR);
        if ($user->execute()) { 
            $state = true;
        }
        return $state;
    }

    public function updateMail(){
        $state = false;
        $query = 'UPDATE `DZOPD_users` SET `mail` = :mail WHERE `id` = :id';
        $user = Database::getInstance()->prepare($query);
        $user->bindValue(':id', $this->id, PDO::PARAM_INT);
        $user->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        if ($user->execute()) { 
            $state = true;
        }
        return $state;
    }

    public function userDeletingHisAccount() {
        $query = 'DELETE FROM `DZOPD_users` WHERE `id` = :id';
        $deleteUser = Database::getInstance()->prepare($query);
        $deleteUser->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $deleteUser->execute();
      }

    public function getTheUserByHisID() {
        $query = 'SELECT `DZOPD_users`.`id`, `DZOPD_users`.`name`, `DZOPD_users`.`mail`, `DZOPD_users`.`password`'
                . 'FROM `DZOPD_users` '
                . 'WHERE `DZOPD_users`.`id` = :id ';
        $result = Database::getInstance()->prepare($query);
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        $result->execute();
        if (is_object($result)) {
            $isObjectResult = $result->fetch(PDO::FETCH_OBJ);
        }
        return $isObjectResult;
    }

    public function addUserToDatabase(){
        $query = 'INSERT INTO `DZOPD_users` (`name`, `mail`, `password`) VALUES (:name, :mail, :password)';
        $result = Database::getInstance()->prepare($query);
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
        $result = Database::getInstance()->prepare($query);
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
        $result = Database::getInstance()->prepare($query);
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
        $getDetails = Database::getInstance()->prepare($query);
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

    public function modifyUser() {
        $query = 'UPDATE `DZOPD_users` SET `id` = :id, `name` = :name, `mail` = :mail, `rank` = :ranking WHERE `id` = :id';
        $userModification = Database::getInstance()->prepare($query);
        $userModification->bindValue(':id', $this->id, PDO::PARAM_INT);
        $userModification->bindValue(':name', $this->name, PDO::PARAM_STR);
        $userModification->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $userModification->bindValue(':ranking', $this->rank, PDO::PARAM_INT);
        return $userModification->execute();
    }

    public function getUsersList() {
        //Récupération des données en déterminant la requête souhaitée
        $query = 'SELECT `id`, `name`, `mail`, `rank` FROM `DZOPD_users`';
        $userResult = Database::getInstance()->query($query);
        if (is_object($userResult)) {
            return $patientList = $userResult->fetchAll(PDO::FETCH_OBJ);
        } else {
            return array();
        }
    }

    public function deleteUser(){
        $state = false;
        $query = 'DELETE FROM `DZOPD_users` WHERE `id` = :id';
        $deleteUser = Database::getInstance()->prepare($query);
        $deleteUser->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($deleteUser->execute()) {
            $state = true;
        }
        return $state;
    }
}