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
    } else {
        $formError['lastname'] = 'Erreur dans la saisie du nom de l\'auteur.';
    }
    
    if (!empty($_POST['firstname'])) {
        $firstname = htmlspecialchars($_POST['firstname']);
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
    } else {
        $formError['name'] = 'Champs obligatoire.';
    }

    if (!empty($_FILES['cover'])) {
        if (is_uploaded_file($_FILES['cover']['tmp_name'])) {  
          $cover = $_FILES['cover'];
          $start_path = $cover['tmp_name'];
          $end_path = '../assets/img/bookscover/' . $cover['name'];
          if (move_uploaded_file($start_path, $end_path)) {
            $books = new books();
            $books->cover = $cover['name'];
          }
     }
  }

    if (!empty($_POST['typeofbooks'])){
        foreach($_POST['typeofbooks'] AS $typeofbooks){
            if (!is_numeric($typeofbooks)){
                $formError['typeofbooks'] = 'Cette option n\'est pas une bonne valeur.';
            } else {
                $typeOfBooksArray[] = $typeofbooks;
            }
        }
    }

    if (!empty($_POST['literarymovement'])){
        foreach($_POST['literarymovement'] AS $lm){
            if (!is_numeric($lm)){
                $formError['literarymovement'] = 'Cette option n\'est pas une bonne valeur.';
            } else {
                $literaryMovementArray[] = $lm;
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
            $formError['resume'] = 'Caractères invalides dans la saisie du résumé du livre.';
        } else {
            $formError['resume'] = 'Champ obligatoire.';
        }
    }

    if (count($formError) == 0) {
        $books = new books();
        $books->name = $name;
        $books->cover = $cover;
        $books->date = $date;
        $books->ISBN = $ISBN;
        $books->resume = $resume;
        $author = new author();
        $author->lastname = $lastname;
        $author->firstname = $firstname;
        $author->dateOfBirth = $dateOfBirth;
        $author->dateOfDeath = $dateOfDeath;
        $authorBooks = new authorbooks();
        $typeofbook = new typeofbooks();
        $typeofbookOfBooks = new typeofbooksofbooks();
        $literarymovement =  new literarymovement();
        $literarymovementBooks = new literarymovementbooks();
        try {
            Database::getInstance()->beginTransaction();

            $books->insertBooks();
            $booksID = $books->getLastInsertId();

            foreach ($typeOfBooksArray AS $typeofbooks) {
                $typeofbookOfBooks->type = $typeofbooks;
                $typeofbookOfBooks->booksID = $booksID;
                $typeofbookOfBooks->insertBooksTypeOfBooks();
            }

            foreach ($literaryMovementArray AS $lm) {
                $literarymovementBooks->literarymovement = $lm;
                $literarymovementBooks->booksID = $booksID;
                $literarymovementBooks->insertLiteraryMovementsBooks();             
            }

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