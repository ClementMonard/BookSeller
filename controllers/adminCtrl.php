<?php

$users = new users();
$listOfUsers = $users->getUsersList();


$typeofbooks = new typeofbooks();
$listTypeOfBooks = $typeofbooks->getNameOfLiteraryGenres();
$literarymovement = new literarymovement();
$listingOfLiteraryMovement = $literarymovement->listOfAllLiteraryMovements();
$formError = [];
$typeOfBooksArray = [];
$literaryMovementArray = [];
$message = '';

if (isset($_POST['deletingButton'])) {
    $users = new users();
    $users->id = $_GET['id'];
    $users->deleteUser();
}


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
            if(pathinfo($_FILES['cover']['name'])['extension'] == 'png' || 
               pathinfo($_FILES['cover']['name'])['extension'] == 'jpg'){  
          $img = $_FILES['cover'];
          $start_path = $img['tmp_name'];
          $end_path = 'assets/img/bookscover/' . $img['name'];
          if (move_uploaded_file($start_path, $end_path)) {
            //insertion en base du nom
            $books = new books();
            $books->cover = $img['name'];
            $books->uploadFile();
          }
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
        if (is_numeric($resume)) {
            $formError['resume'] = 'Caractères invalides dans la saisie du nom du livre.';
        } else {
            $formError['resume'] = 'Champ obligatoire.';
        }
    }

    if (count($formError) == 0) {
        $typeofbook = new typeofbooks();
        $author = new author();
        $books = new books();
        $literarymovement =  new literarymovement();
        try {
            Database::getInstance()->beginTransaction();

            Database::getInstance()->commit();

            echo 'Ajout d\'un livre enregistré avec succès.';

        } catch(Exception $e)
        {
            //on annule la transation
            Database::getInstance()->rollback();
        
            //on affiche un message d'erreur ainsi que les erreurs
            echo 'Tout ne s\'est pas bien passé, voir les erreurs ci-dessous<br />';
            echo 'Erreur : '.$e->getMessage().'<br />';
            echo 'N° : '.$e->getCode();
        
            //on arrête l'exécution s'il y a du code après
            exit();
        }
    }
}