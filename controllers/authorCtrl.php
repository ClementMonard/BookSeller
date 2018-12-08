<?php
//---------------PROFIL DE L'AUTEUR-------------------------//

//Si l'idAuthor existe
if (isset($_GET['idAuthor'])) {
    //Instanciation de la classe author
    $author = new author();
    //Attribution de l'id récupéré grâce au get
    $author->idAuthor = $_GET['idAuthor'];
    //Stockage des données liées à un auteur dans $getAuthor
    $getAuthor = $author->getBookByAuthor();
    //Stockage des livres liés à un auteur dans $getCover
    $getCover = $author->getCoverOfBookFromHisAuthor();
}

//Si l'id du livre existe
if (isset($_GET['id'])) {
    //Instanciation de la classe new books
    $books = new books();
    //Attribution de l'id récupéré grâce au get dans l'attribut id de la classe books
    $books->id = $_GET['id'];
    //Stockage des données d'un livre dans $displayDetailsOfBooks
    $displayDetailsOfBooks = $books->detailsBooksById();
}