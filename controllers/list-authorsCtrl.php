<?php 

$formErrorAuthor = [];

$listAuthors = new author();
$displayAuthorsList = $listAuthors->getValueOfAuthors();

if (isset($_GET['id'])) {
    $listAuthors->id = $_GET['id'];
    $displayAuthorsDetails = $listAuthors->displayAuthorsDetails();
}

if (isset($_POST['modifyButtonAuthor'])) {
    if (isset($_POST['lastname'])) {
        //Conversion des caractères spéciaux en entités HTML pour la sécurité
        $listAuthors->lastname = htmlspecialchars($_POST['lastname']);
        //Fonction permettant de calculer la taille de la chaine de caractères
        if (strlen($listAuthors->lastname) > 75) {
            $formErrorAuthor['lastname'] = 'Ne pas dépasser 75 caractères';
        }
        //Fonction permettant de calculer la taille de la chaine de caractères
        if (strlen($listAuthors->lastname) < 3) {
            $formErrorAuthor['lastname'] = 'Veuillez au moins saisir 3 caractères.';
        }
        //Si le champ n'est pas complété, affiche un message d'erreur
        if (empty($listAuthors->lastname)) {
            $formErrorAuthor['lastname'] = 'Champs obligatoire';
        }
    }
    if (isset($_POST['firstname'])) {
        //Conversion des caractères spéciaux en entités HTML pour la sécurité
        $listAuthors->firstname = htmlspecialchars($_POST['firstname']);
        //Fonction permettant de calculer la taille de la chaine de caractères
        if (strlen($listAuthors->firstname) > 75) {
            $formErrorAuthor['firstname'] = 'Ne pas dépasser 75 caractères';
        }
        //Fonction permettant de calculer la taille de la chaine de caractères
        if (strlen($listAuthors->firstname) < 3) {
            $formErrorAuthor['firstname'] = 'Veuillez au moins saisir 3 caractères.';
        }
        //Si le champ n'est pas complété, affiche un message d'erreur
        if (empty($listAuthors->firstname)) {
            $formErrorAuthor['firstname'] = 'Champs obligatoire';
        }
    }
    if (isset($_POST['dateOfBirth'])){
        $listAuthors->dateOfBirth = htmlspecialchars($_POST['dateOfBirth']);
    } else {
        $formErrorAuthor['dateOfBirth'] = 'Champs obligatoire.';
    }
    if (isset($_POST['dateOfDeath'])){
        $listAuthors->dateOfDeath = htmlspecialchars($_POST['dateOfDeath']);
    } else {
        $formErrorAuthor['dateOfDeath'] = 'Champs obligatoire.';
    }
    if (count($formErrorAuthor) == 0) {
        $listAuthors->modifyAuthors();
    }

    if (isset($_POST['deletingButtonAuthor'])) {
        $author = new author();
        $author->authorID = $_GET['id'];
        $books = new books();
        $authorBooks = new authorbooks();
        try {
            Database::getInstance()->beginTransaction();
            $authorBooks->id_DZOPD_author = $author->authorID;
            $authorBooks->deleteForeignKeyAuthor();
            $author->deleteMainAuthor();
            
            Database::getInstance()->commit();

            echo 'Suppression enregistré avec succès.';

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