<?php

$users = new users();
$listOfUsers = $users->getUsersList();

$typeofbooksList = new typeofbooks();
$listTypeOfBooks = $typeofbooksList->getNameOfLiteraryGenres();
$literarymovementList = new literarymovement();
$listingOfLiteraryMovement = $literarymovementList->listOfAllLiteraryMovements();
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

    if (!empty($_POST['literarymovements'])){
        foreach($_POST['literarymovements'] AS $literarymovement){
            if (!is_numeric($literarymovement)){
                $formError['literarymovements'] = 'Cette option n\'est pas une bonne valeur.';
            } else {
                $literaryMovementArray[] = $literarymovement;
            }
        }
    }

    if (!empty($_POST['ISBN'])) {
        $ISBN = htmlspecialchars($_POST['ISBN']);
     } else {
            $formError['ISBN'] = 'Champs obligatoire.';
    }

    if (!empty($_POST['date'])) {
        $date = htmlspecialchars($_POST['date']);
    }

    if (!empty($_POST["resume"])) {
        $resume = htmlspecialchars($_POST['resume']);
     } else {
            $formError['resume'] = 'Champ obligatoire.';
    }

    if (count($formError) == 0) {
        $books = new books();
        $books->name = $name;
        $books->cover = $cover['name'];
        $books->date = $date;
        $books->ISBN = $ISBN;
        $books->resume = $resume;
        $author = new author();
        $author->lastname = $lastname;
        $author->firstname = $firstname;
        $author->dateOfBirth = $dateOfBirth;
        $author->dateOfDeath = $dateOfDeath;
        $typeofbook = new typeofbooks();
        $typeofbook->type = $typeofbooks;
        $literarymovement =  new literarymovement();
        $literarymovement->Literarymovement = $literarymovement;
        $authorBooks = new authorbooks();
        $typeofbookOfBooks = new typeofbooksofbooks();
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

            foreach ($literaryMovementArray AS $literarymovement) {
                $literarymovementBooks->Literarymovement = $literarymovement;
                $literarymovementBooks->booksID = $booksID;
                $literarymovementBooks->insertLiteraryMovementsBooks();
            }

            $author->insertAuthor();
            $authorID = $author->getLastInsertId();
            $authorBooks->author = $authorID;
            $authorBooks->booksID = $booksID;
            $authorBooks->insertAuthorBooks();

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