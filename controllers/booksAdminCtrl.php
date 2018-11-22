<?php

$formErrorBook = [];

if (isset($_POST['modifyButton'])) {
    if (isset($_POST['name'])) {
        //Conversion des caractères spéciaux en entités HTML pour la sécurité
        $name = htmlspecialchars($_POST['name']);
        //Fonction permettant de calculer la taille de la chaine de caractères
        if (strlen($name) > 255) {
            $formErrorBook['name'] = 'Ne pas dépasser 255 caractères';
        }
        //Fonction permettant de calculer la taille de la chaine de caractères
        if (strlen($name) < 2) {
            $formErrorBook['name'] = 'Veuillez au moins saisir 2 caractères.';
        }
        //Si le champ n'est pas complété, affiche un message d'erreur
        if (empty($name)) {
            $formErrorBook['name'] = 'Champs obligatoire';
        }
    }

    if (isset($_POST['date'])) {
        //Conversion des caractères spéciaux en entités HTML pour la sécurité
        $date = htmlspecialchars($_POST['date']);
        //Fonction permettant de calculer la taille de la chaine de caractères
        if (strlen($date) > 30) {
            $formErrorBook['date'] = 'Ne pas dépasser 30 caractères';
        }
        //Fonction permettant de calculer la taille de la chaine de caractères
        if (strlen($date) < 6) {
            $formErrorBook['date'] = 'Veuillez au moins saisir 6 caractères.';
        }
        //Si le champ n'est pas complété, affiche un message d'erreur
        if (empty($date)) {
            $formErrorBook['date'] = 'Champs obligatoire';
        }
    }

    if (isset($_POST['ISBN'])) {
        //Conversion des caractères spéciaux en entités HTML pour la sécurité
        $ISBN = htmlspecialchars($_POST['ISBN']);
        //Fonction permettant de calculer la taille de la chaine de caractères
        if (strlen($ISBN) > 50) {
            $formErrorBook['ISBN'] = 'Ne pas dépasser 50 caractères';
        }
        //Fonction permettant de calculer la taille de la chaine de caractères
        if (strlen($ISBN) < 6) {
            $formErrorBook['ISBN'] = 'Veuillez au moins saisir 6 caractères.';
        }
        //Si le champ n'est pas complété, affiche un message d'erreur
        if (empty($ISBN)) {
            $formErrorBook['ISBN'] = 'Champs obligatoire';
        }
    }

    if (isset($_POST['resume'])) {
        //Conversion des caractères spéciaux en entités HTML pour la sécurité
        $resume = htmlspecialchars($_POST['resume']);
    }

    if (count($formErrorBook) == 0) {
        $modifyBook = new books();
        $modifyBook->id = $_GET['id'];
        $modifyBook->name = $name;
        $modifyBook->date = $date;
        $modifyBook->ISBN = $ISBN;
        $modifyBook->resume = $resume;
        $modifyBook->modifyBooks();
    }
}

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