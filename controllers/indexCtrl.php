<?php
//Instanciation de la classe books
$books = new books();

//-----------------------------PAGE PROFIL D'UN LIVRE---------------------------//

//Stockage des données de la méthode detailsBooks() dans $detailsList
$detailsList = $books->detailsBooks();

//---------------------------CAROUSE--------------------------//

//Stockage des données de la méthode displayBooksByDescOrder() dans $getBookByLastId
$getBookByLastId  = $books->displayBooksByDescOrder();

if (isset($_GET['id'])) {
    $books = new books();
    $books->id = $_GET['id'];
    $displayDetailsOfBooks = $books->detailsBooksById();
}