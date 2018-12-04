<?php

$formErrorComment = [];

$books = new books();
$comments = new comments();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $books->id = $_GET['id'];
    $comments->idBook = $_GET['id'];
    $displayDetailsOfBooks = $books->detailsBooksById();
    $displayAllComments = $comments->displayCommentsByBook();
}

if (isset($_POST['addToFavorite'])) {
    $user = new users();
    $books->id = $user->id_DZOPD_books;
}

if (isset($_POST['submitComment'])) {
    if (isset($_POST['message'])) {
        //Conversion des caractères spéciaux en entités HTML pour la sécurité
        $message = htmlspecialchars($_POST['message']);
        //Si le champ n'est pas complété, affiche un message d'erreur
        if (empty($message)) {
            $formErrorComment['message'] = 'Champs obligatoire';
        }
    }
    if (count($formErrorComment) == 0) {
    $comments->message = $message;    
    $comments->id_DZOPD_books = $_GET['id'];
    $comments->id_DZOPD_users = $_SESSION['id'];
    $comments->insertComments();
  }
}

   
?>
