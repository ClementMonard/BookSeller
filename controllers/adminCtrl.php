<?php

$users = new users();

$listOfUsers = $users->getUsersList();

if (isset($_GET['id'])) {
    $users->id = $_GET['id'];
    $displayDetailsOfUsers = $users->displayUsersDetails();
}

$typeofbooks = new typeofbooks();

$listTypeOfBooks = $typeofbooks->getNameOfLiteraryGenres();

$literarymovement = new literarymovement();

$listingOfLiteraryMovement = $literarymovement->listOfAllLiteraryMovements();

$formError = [];
$typeOfBooksArray = [];
$literaryMovementArray = [];
$message = '';

if (isset($_POST['submitBook'])) {
    if (!empty($_POST['lastname'])) {
        $lastname = htmlspecialchars($_POST['lastname']);
        if (!preg_match($regexName, $lastname)) {
            $formError['lastname'] = 'Caractères invalides dans la saisie du nom.';
        }
    } else {
        $formError['lastname'] = 'Erreur dans la saisie du nom de l\'auteur.';
    }
    
    if (!empty($_POST['firstname'])) {
        $firstname = htmlspecialchars($_POST['firstname']);
        if (!preg_match($regexName, $firstname)) {
            $formError['firstname'] = 'Caractères invalides dans la saisie du nom.';
        }
    } else {
        $formError['firstname'] = 'Erreur dans la saisie du nom de l\'auteur.';
    }

    if (!empty($_POST['dateOfBirth'])) {
        $dateOfBirth = htmlspecialchars($_POST['dateOfBirth']);
    }

    if (!empty($_POST['dateOfDeath'])) {
        $dateOfDeath = htmlspecialchars($_POST['dateOfDeath']);
    }

    if (!empty($_POST['name'])) {
        $name = htmlspecialchars($_POST['name']);
        if (!preg_match($regexName, $name)) {
            $formError['name'] = 'Caractères invalides dans la saisie du nom du livre.';
        } else {
            $formError['name'] = 'Champs obligatoire.';
        }
    }

    if (!empty($_FILES['cover'])) {
        if (is_uploaded_file($_FILES['cover']['tmp_name'])) {
            $image = $_FILES['cover'];
            if(pathinfo($image['name'])['extension'] != 'png'){
                $formError['cover'] = 'Extension de fichier incorrect, seul l\'extension png est autorisé.';
            }
        }
    }

    if (!empty($_POST['typeofbook'])){
        foreach($_POST['typeofbook'] AS $tob){
            if (!is_numeric($tob)){
                $formError['typeofbook'] = 'Cette option n\'est pas une bonne valeur.';
            } else {
                $typeOfBooksArray[] += $tob;
            }
        }
    }

    if (!empty($_POST['literarymovement'])){
        foreach($_POST['literarymovement'] AS $lm){
            if (!is_numeric($lm)){
                $formError['literarymovement'] = 'Cette option n\'est pas une bonne valeur.';
            } else {
                $literaryMovementArray[] += $lm;
            }
        }
    }

    if (!empty($_POST['ISBN'])) {
        $ISBN = htmlspecialchars($_POST['ISBN']);
        if (!is_numeric($ISBN)) {
            $formError['ISBN'] = 'Caractères invalides dans la saisie du nom du livre.';
        } else {
            $formError['ISBN'] = 'Champs obligatoire.';
        }
    }

    if (!empty($_POST['date'])) {
        $date = htmlspecialchars($_POST['date']);
    }

    if (!empty($_POST["resume"])) {
        $resume = htmlspecialchars($_POST['resume']);
        if (!preg_match($regexSpecialCharacters, $resume)) {
            $formError['resume'] = 'Caractères invalides dans la saisie du nom du livre.';
        } else {
            $formError['resume'] = 'Champ obligatoire.';
        }
    }
}