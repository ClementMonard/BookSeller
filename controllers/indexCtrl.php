<?php

$books = new books();

$detailsList = $books->detailsBooks();
$getBookByLastId  = $books->displayBooksByDescOrder();

if (isset($_GET['id'])) {
    $books = new books();
    $books->id = $_GET['id'];
    $displayDetailsOfBooks = $books->detailsBooksById();
}