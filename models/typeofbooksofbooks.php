<?php

class typeofbooksofbooks extends database {
    
    public $id;
    public $id_DZOPD_typeofbooks;
    public $id_DZOPD_books;

    public function insertBooksTypeOfBooks(){
        $query = 'INSERT INTO `DZOPD_typeofbooksOfBooks` (`id_DZOPD_typeofbooks`, `id_DZOPD_books`) VALUES (:id_DZOPD_typeofbooks, :id_DZOPD_books)';
        $typeOfBooksOfBooks = Database::getInstance()->prepare($query);
        $typeOfBooksOfBooks->bindValue(':id_DZOPD_typeofbooks', $this->type, PDO::PARAM_INT);
        $typeOfBooksOfBooks->bindValue(':id_DZOPD_books', $this->booksID, PDO::PARAM_INT);
        return $typeOfBooksOfBooks->execute();
    }
}