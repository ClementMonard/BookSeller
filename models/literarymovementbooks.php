<?php

class literarymovementbooks extends database {
    
    public $id;
    public $id_DZOPD_books;
    public $id_DZOPD_literarymovement;

    public function insertLiteraryMovementsBooks(){
        $query = 'INSERT INTO `DZOPD_literarymovementsbooks` (`id_DZOPD_Literary_movement`, `id_DZOPD_books`) VALUES (:id_DZOPD_Literary_movement, :id_DZOPD_books)';
        $authorBooks = Database::getInstance()->prepare($query);
        $authorBooks->bindValue(':id_DZOPD_Literary_movement', $this->Literarymovement, PDO::PARAM_INT);
        $authorBooks->bindValue(':id_DZOPD_books', $this->booksID, PDO::PARAM_INT);
        return $authorBooks->execute();
    }

    public function deleteRowIntermediateLiteraryMovementBook(){
        $query = 'DELETE FROM `DZOPD_literarymovementsbooks` WHERE `id` = :id';
        $deleteLMFK = Database::getInstance()->prepare($query);
        $deleteLMFK->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $deleteLMFK->execute();
    }
}