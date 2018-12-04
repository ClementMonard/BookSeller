<?php

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
$successMessage = false;

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
        $successMessage = true;
    }
}

if (isset($_GET['id'])) {
    $books = new books();
    $books->id = $_GET['id'];
    $displayDetailsOfBooks = $books->detailsForABook();
}

if (isset($_POST['deleteBookButton'])) {
try {

    Database::getInstance()->beginTransaction();
    /* Instantiation des tables liées à la suppression du livre */
    $literaryMovementBook = new literarymovementbooks();
    $typeOfBooksOfBooks = new typeofbooksofbooks();
    $authorbook = new authorbooks();
    $author = new author();
    $book = new books();
    /* Définition de l'id GET dans l'id de la classe book */   
    $book->id = $_GET['id'];
    /* Définition de l'id de l'auteur précédemment récupéré en tant qu'alias grâce à la méthode detailsForABook() dans l'id de la 
    /* classe author et dans la clé étrangère author de la table intermédiaire authorbook
    */ 
    $author->id = $authorbook->id_DZOPD_author = $displayDetailsOfBooks->authorID;
    /* Définition de l'id de la table intermédiaire authorbook précédemment récupéré en tant qu'alias grâce à la méthode detailsForABook() dans l'id de la 
    /* classe authorbook
    */
    $authorbook->id = $displayDetailsOfBooks->idAuthorBook;
    /* Définition de l'id de la table intermédiaire literarymovementbooks précédemment récupéré en tant qu'alias grâce à la méthode detailsForABook() dans l'id de la 
    /* classe literarymovementbooks
    */
    $literaryMovementBook->id = $displayDetailsOfBooks->idLMB;
    /* Définition de l'id de la table intermédiaire typeofbookofbooks précédemment récupéré en tant qu'alias grâce à la méthode detailsForABook() dans l'id de la 
    /* classe typeofbookofbooks
    */
    $typeOfBooksOfBooks->id = $displayDetailsOfBooks->idToBoB;
    /* Stockage du résultat de la méthode checkingIfTheAuthorAlreadyExists() dans la variable qui permet de compter combien de fois l'id de l'auteur apparaît  */
    $result = $authorbook->checkingIfTheAuthorAlreadyExists();
    /* Suppression de la ligne correspondante dans la table intermédiaire authorbook à l'id du livre en question  */
    $authorbook->deleteRowIntermediateTableAuthorBook();
    /* Si la comptabilisation de l'id de l'auteur est inférieur à 2, il sera supprimé */
    if ($result < 2) {
       $author->deleteMainAuthor(); 
    }
    /* Suppression de la ligne correspondante dans la table intermédiare literarymovementofbooks à l'id du livre en question */
    $literaryMovementBook->deleteRowIntermediateLiteraryMovementBook();
    /* Suppression de la ligne correspondante dans la table intermédiare typeofbookofbooks à l'id du livre en question */
    $typeOfBooksOfBooks->deleteRowIntermediateTableTypeOfBooksOfBooks();
    /* Suppression du livre si toutes les précédentes méthodes se sont correctement executées  */
    $book->deleteMainBook();


    Database::getInstance()->commit();

    header('location:list-books.php');
    exit;


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