<?php

if (isset($_GET['idAuthor'])) {
    $author = new author();
    $author->idAuthor = $_GET['idAuthor'];
    $getAuthor = $author->getBookByAuthor();
    $getCover = $author->getCoverOfBookFromHisAuthor();
}

if (isset($_GET['id'])) {
    $books = new books();
    $books->id = $_GET['id'];
    $displayDetailsOfBooks = $books->detailsBooksById();
}