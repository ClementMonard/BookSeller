<?php

class authorbooks extends database {

    public $id;
    public $id_DZOPD_books;
    public $id_DZOPD_author;

    public function insertAuthorBooks(){
        $query = 'INSERT INTO `DZOPD_authorbooks` (`id_DZOPD_books`, `id_DZOPD_author`) VALUES (:id_DZOPD_books, :id_DZOPD_author)';
        $authorBooks = Database::getInstance()->prepare($query);
        $authorBooks->bindValue(':id_DZOPD_books', $this->booksID, PDO::PARAM_INT);
        $authorBooks->bindValue(':id_DZOPD_author', $this->author, PDO::PARAM_INT);
        return $authorBooks->execute();
    }

    public function deleteRowIntermediateTableAuthorBook(){
        $query = 'DELETE FROM `DZOPD_authorbooks` WHERE `id` = :id';
        $deleteAuthorFK = Database::getInstance()->prepare($query);
        $deleteAuthorFK->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $deleteAuthorFK->execute();
    }

    public function checkingIfTheAuthorAlreadyExists(){
        $state = false;
        $query = 'SELECT COUNT(`id`) AS `count` FROM `DZOPD_authorbooks` WHERE `id_DZOPD_author` = :id_DZOPD_author';
        $result = Database::getInstance()->prepare($query);
        $result->bindValue(':id_DZOPD_author', $this->id_DZOPD_author, PDO::PARAM_INT);
        if ($result->execute()) {
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            $state = $selectResult->count;
        }
        return $state;
    }

}