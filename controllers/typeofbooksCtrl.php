<?php


if (isset($_GET['id'])) {
    $books = new books();
    $books->id = $_GET['id'];
    $displayDetailsOfBooks = $books->detailsBooksById();
}

//Permet d'obtenir la liste de tous les courants littéraire
$lm = new literarymovement();
$lmList = $lm->listOfAllLiteraryMovements();

//Permet d'obtenir la liste de tous les types de livre
$typeofbooks = new typeofbooks();
$nameList = $typeofbooks->getNameOfLiteraryGenres();


//-------------------------TYPE DE LIVRE------------------------------------//


//Permet de trier les livres selon leurs type de livre
$books = new books();
$books->idType = 1;
$booksPsycho = $books->detailsBooksByType();
$books->idType = 2;
$booksBusiness = $books->detailsBooksByType();
$books->idType = 10;
$booksPersonalDevelopment = $books->detailsBooksByType();
$books->idType = 9;
$booksBiography = $books->detailsBooksByType();
$books->idType = 11;
$booksRomanScienceFiction = $books->detailsBooksByType();
$books->idType = 12;
$booksPolicier = $books->detailsBooksByType();
$books->idType = 13;
$booksBd = $books->detailsBooksByType();

//-------------------------COURANT LITTERAIRE-----------------------------//

$books->idLm = 1;
$booksHumanism = $books->detailsBooksByLiteraryMovement();
$books->idLm = 2;
$booksPleiade = $books->detailsBooksByLiteraryMovement();
