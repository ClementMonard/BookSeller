<?php

class typeofbooksofbooks extends database {
    
    public $id;
    public $id_DZOPD_typeofbooks;
    public $id_DZOPD_books;


    /**
     * Méthode qui permet d'insérer les id des types de livre et du livre dans la table intermédiaire, ce qui permet
     * de relier son livre à son type
     */

    public function insertBooksTypeOfBooks(){
        $query = 'INSERT INTO `DZOPD_typeofbooksOfBooks` (`id_DZOPD_typeofbooks`, `id_DZOPD_books`) VALUES (:id_DZOPD_typeofbooks, :id_DZOPD_books)';
        $typeOfBooksOfBooks = Database::getInstance()->prepare($query);
        $typeOfBooksOfBooks->bindValue(':id_DZOPD_typeofbooks', $this->type, PDO::PARAM_INT);
        $typeOfBooksOfBooks->bindValue(':id_DZOPD_books', $this->booksID, PDO::PARAM_INT);
        return $typeOfBooksOfBooks->execute();
    }

    /**
     * Méthode qui permet de supprimer les id des clés étrangères afin de permettre la suppression d'un livre 
     */

    public function deleteRowIntermediateTableTypeOfBooksOfBooks(){
        $query = 'DELETE FROM `DZOPD_typeofbooksOfBooks` WHERE `id` = :id';
        $deleteTOBFK = Database::getInstance()->prepare($query);
        $deleteTOBFK->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $deleteTOBFK->execute();
    }
}