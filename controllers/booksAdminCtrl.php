<?php

if (isset($_GET['id'])) {
    $books = new books();
    $books->id = $_GET['id'];
    $displayDetailsOfBooks = $books->detailsBooksById();
}

$typeofbooks = new typeofbooks();
$nameList = $typeofbooks->getNameOfLiteraryGenres();

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