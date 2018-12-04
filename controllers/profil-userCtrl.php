<?php

$user = new users();
$user->id = $_GET['id'];
$showUser = $user->getTheUserByHisID();

$formErrorName = [];
$formErrorPassword = [];
$formErrorMail = [];

if (isset($_GET['id'])) {
    $book = new books();
    $user->id_DZOPD_books = $book->id;
    $displayFavoriteBook = $user->displayFavorite();
}

if (isset($_POST['modifyName'])) {
    if (isset($_POST['name'])) {
        $name = htmlspecialchars($_POST['name']);
        if (strlen($name) > 25) {
            $formErrorName['name'] = 'Ne pas dépasser 25 caractères';
        }
        //Fonction permettant de calculer la taille de la chaine de caractères
        if (strlen($name) < 2) {
            $formErrorName['name'] = 'Veuillez au moins saisir 2 caractères.';
        }
    }

    if (count($formErrorName) == 0) {
        $user = new users();
        $user->id = $_GET['id'];
        $user->name = $name;
        $user->updateName();
    }
}

if (isset($_POST['modifyPassword'])) {
    if (isset($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    } else {
        $formErrorPassword['password'] = 'Erreur dans le changement du mot de passe.';
    }

    if (count($formErrorPassword) == 0) {
        $user = new users();
        $user->id = $_GET['id'];
        $user->password = $password;
        $user->updatePassword();
    }
}

if (isset($_POST['modifyMail'])) {
    if (isset($_POST['mail']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $mail = htmlspecialchars($_POST['mail']);
    } else {
        $formError['mail'] = 'Champs obligatoire.';
    }

    if (count($formErrorMail) == 0) {
        $user = new users();
        $user->id = $_GET['id'];
        $user->mail = $mail;
        $user->updateMail();
     }
}