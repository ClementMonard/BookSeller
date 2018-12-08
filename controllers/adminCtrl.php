<?php

//Instanciation de la classe users
$users = new users();
//Déclaration de l'objet qui permettra l'affichage de la liste des utilisateurs
$listOfUsers = $users->getUsersList();

//Instanciation de la classe typeofbooks
$typeofbooksList = new typeofbooks();
//Déclaration de l'objet listTypeOfBooks qui permettra l'affichage de tous les types de livre
$listTypeOfBooks = $typeofbooksList->getNameOfLiteraryGenres();
//Instanciation de la classe literarymovement
$literarymovementList = new literarymovement();
//Déclaration de l'objet qui permettra l'affichage de tous les courants littéraire
$listingOfLiteraryMovement = $literarymovementList->listOfAllLiteraryMovements();
//Déclaration du tableau de messages d'erreur
$formError = [];
//Déclaration du tableau pour les types de livre
$typeOfBooksArray = [];
//Déclaration du tableau pour les courants littéraire
$literaryMovementArray = [];
$message = '';


//---------------Permet lors de l'appui sur le bouton, de supprimer l'utilisateur----------------//
if (isset($_POST['deletingButton'])) {
    //Instanciation de la classe users
    $users = new users();
    //Définition de l'attribut id de la classe users sur le $_GET['id'] pour permettre de récupérer l'id via l'url
    $users->id = $_GET['id'];
    //Appel de la méthode permettant la suppression de l'utilisateur
    $users->deleteUser();
}

//-----------------Permet l'ajout d'un livre dans la base de données-----------------------//
if (isset($_POST['submitBook'])) {
    //Si l'input n'est pas vide
    if (!empty($_POST['lastname'])) {
        //Déclaration de la variable qui stockera la valeur saisie dans l'input
        $lastname = htmlspecialchars($_POST['lastname']);
    } else {
        //Message d'erreur si le champ est vide        
        $formError['lastname'] = 'Erreur dans la saisie du nom de l\'auteur.';
    }
    //Si l'input n'est pas vide    
    if (!empty($_POST['firstname'])) {
        //Déclaration de la variable qui stockera la valeur saisie dans l'input
        $firstname = htmlspecialchars($_POST['firstname']);
    } else {
        //Message d'erreur si le champ est vide
        $formError['firstname'] = 'Erreur dans la saisie du prénom de l\'auteur.';
    }
    //Si l'input n'est pas vide
    if (!empty($_POST['dateOfBirth'])) {
        //Déclaration de la variable qui stockera la valeur saisie dans l'input        
        $dateOfBirth = htmlspecialchars($_POST['dateOfBirth']);   
    }  else {
        //Message d'erreur si le champ est vide
        $formError['dateOfBirth'] = 'Champs obligatoire.';
    }
    //Si l'input n'est pas vide
    if (!empty($_POST['dateOfDeath'])) {
        //Déclaration de la variable qui stockera la valeur saisie dans l'input        
        $dateOfDeath = htmlspecialchars($_POST['dateOfDeath']);
    }
    //Si l'input n'est pas vide
    if (!empty($_POST['name'])) {
        //Déclaration de la variable qui stockera la valeur saisie dans l'input        
        $name = htmlspecialchars($_POST['name']);  
    } else {
        //Message d'erreur si le champ est vide        
        $formError['name'] = 'Champs obligatoire.';
    }
    //Si l'input n'est pas vide
    if (!empty($_FILES['cover'])) {
        if (is_uploaded_file($_FILES['cover']['tmp_name'])) {  
        //Déclaration de la variable qui stockera la valeur saisie dans l'input          
          $cover = $_FILES['cover'];
          $start_path = $cover['tmp_name'];
          $end_path = '../assets/img/bookscover/' . $cover['name'];
          if (move_uploaded_file($start_path, $end_path)) {
            $books = new books();
            $books->cover = $cover['name'];
          }
     }
  }
    //Si l'input n'est pas vide
    if (!empty($_POST['typeofbooks'])){
        //foreach qui permettra de lire les données enregistrées dans le select        
        foreach($_POST['typeofbooks'] AS $typeofbooks){
            //Si les valeurs ne sont pas numériques            
            if (!is_numeric($typeofbooks)){
                //Message d'erreur                
                $formError['typeofbooks'] = 'Cette option n\'est pas une bonne valeur.';
            } else {
                //Si c'est correct, les données seront transmises dans le tableau $literaryMovementArray[]                
                $typeOfBooksArray[] = $typeofbooks;
            }
        }
    }
    //Si l'input n'est pas vide
    if (!empty($_POST['literarymovements'])){
        //foreach qui permettra de lire les données enregistrées dans le select
        foreach($_POST['literarymovements'] AS $literarymovement){
            //Si les valeurs ne sont pas numériques
            if (!is_numeric($literarymovement)){
                //Message d'erreur
                $formError['literarymovements'] = 'Cette option n\'est pas une bonne valeur.';
            } else {
                //Si c'est correct, les données seront transmises dans le tableau $literaryMovementArray[]
                $literaryMovementArray[] = $literarymovement;
            }
        }
    }
    //Si l'input n'est pas vide
    if (!empty($_POST['ISBN'])) {
        //Déclaration de la variable qui stockera la valeur saisie dans l'input        
        $ISBN = htmlspecialchars($_POST['ISBN']);
     } else {
        //Message d'erreur si le champ est vide            
        $formError['ISBN'] = 'Champs obligatoire.';
    }
    //Si l'input n'est pas vide
    if (!empty($_POST['date'])) {
        //Déclaration de la variable qui stockera la valeur saisie dans l'input        
        $date = htmlspecialchars($_POST['date']);
    } else {
        //Message d'erreur si le champ est vide        
        $formError['date'] = 'Champs obligatoire.';
    }
    //Si l'input n'est pas vide
    if (!empty($_POST["resume"])) {
        //Déclaration de la variable qui stockera la valeur saisie dans l'input        
        $resume = htmlspecialchars($_POST['resume']);
     } else {
        //Message d'erreur si le champ est vide            
        $formError['resume'] = 'Champ obligatoire.';
    }

    //Si le tableau $formError ne contient aucune erreur, la transaction peut débuter

    if (count($formError) == 0) {
        //Instanciation de toutes les classes en rapport avec la transaction
        //Attribution de toutes les valeurs enregistrées via le formulaire dans les attributs des classes
        //Exemple $name = valeur 
        //x->name = attribut
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
        //isset car un auteur n'a pas forcément de date de décès
        if (isset($dateOfDeath)) {
            $author->dateOfDeath = $dateOfDeath;
        }
        $typeofbook = new typeofbooks();
        //isset car un livre n'a pas nécéssairement de type mais peut avoir un courant littéraire
        if (isset($typeofbooks)) {
            //Si une valeur existe, alors
            $typeofbook->type = $typeofbooks;
        }
        $literarymovement =  new literarymovement();
        //isset car un livre n'a pas nécéssairement de courant littéraire mais peut avoir un type
        if (isset($literarymovement)) {
        $literarymovement->Literarymovement = $literarymovement;
        }
        $authorBooks = new authorbooks();
        $typeofbookOfBooks = new typeofbooksofbooks();
        $literarymovementBooks = new literarymovementbooks();

        //----------------------------TRANSACTION AJOUT LIVRE PAGE ADMIN------------------------------------//

        try {
            //Début de la transaction permettant l'ajout d'un livre
            Database::getInstance()->beginTransaction();
            //Création d'une variable qui stockera le résultat de la méthode checkingIfTheBookAlreadyExists()
            $check = $books->checkingIfTheBookAlreadyExists();
            //Si le nom du livre n'est pas déjà présent en base
            if ($check == 0) {
            //Ajout des données précédemment saisies dans le formulaire d'ajout             
            $books->insertBooks();
            }
            //Récupération de l'id qui vient d'être inséré grâce à une méthode qui se trouve dans la classe database
            //la fonction LAST_INSTER_ID va obtenir le dernier id de la ligne généré par la méthode insertBooks()
            //Stockage du résultat dans $booksID
            $booksID = $books->getLastInsertId();

            //foreach pour parcourir les données du tableau $typeOfBooksArray[]
            foreach ($typeOfBooksArray AS $typeofbooks) {
                //Attribution de l'id récupéré via le formulaire du type du livre dans l'id de la clé étrangère id_DZOPD_typeofbook dans la table intermédiaire
                $typeofbookOfBooks->type = $typeofbooks;
                //Attribution de l'id du livre récupéré grâce à la fonction LAST_INSERT_ID dans l'id de la clé étrangère id_DZOPD_book dans la table intermédiaire
                $typeofbookOfBooks->booksID = $booksID;
                //Ajout des deux id dans la table intermédiaire
                $typeofbookOfBooks->insertBooksTypeOfBooks();
            }


            //foreach pour parcourir les données du tableau $literaryMovementArray[]
            foreach ($literaryMovementArray AS $literarymovement) {
                //Attribution de l'id récupéré via le formulaire du type du livre dans l'id de la clé étrangère id_DZOPD_literarymovement dans la table intermédiaire
                $literarymovementBooks->Literarymovement = $literarymovement;
                //Attribution de l'id du livre récupéré grâce à la fonction LAST_INSERT_ID dans l'id de la clé étrangère id_DZOPD_book dans la table intermédiaire
                $literarymovementBooks->booksID = $booksID;
                //Ajout des deux id dans la table intermédiaire
                $literarymovementBooks->insertLiteraryMovementsBooks();
            }
            //Vérification pour savoir si l'auteur est déjà inscrit dans la base de donnée en se référant à son nom et prénom
            //Si l'auteur n'est pas déjà présent en base
            if (!$author->checkingIfTheAuthorAlreadyExists()){
                //Ajout du nouvel auteur
                $author->insertAuthor();
                //Récupération de l'id de l'auteur que l'on vient d'insérer en base
                $authorID = $author->getLastInsertId();
            } else {
                //Sinon, si l'auteur est déjà présent en base, le livre sera lié à l'auteur qui a été saisi dans le formulaire
                $authorID = $author->selectIdFromAuthor();
            }
            //Attribution de l'id de l'auteur récupéré précédemment grâce à la fonction LAST_INSERT_ID dans la l'id de la clé étrangère id_DZOPD_author dans la table intermédiaire
            $authorBooks->author = $authorID;
            //Attribution de l'id du livre récupéré grâce à la fonction LAST_INSERT_ID dans l'id de la clé étrangère id_DZOPD_book dans la table intermédiaire
            $authorBooks->booksID = $booksID;
            //Ajout des deux id dans la table intermédiaire
            $authorBooks->insertAuthorBooks();
            
            //Si tout s'est bien passé, applique tous les changements et de manière permanente
            Database::getInstance()->commit();

            echo 'Ajout d\'un livre enregistré avec succès.';
        //En cas d'erreur    
        } catch(Exception $e)
        {
            //La transaction est annulée est aucun changement n'aura été effectué
            Database::getInstance()->rollback();
        
            //on affiche un message d'erreur ainsi que les erreurs
            echo 'Tout ne s\'est pas bien passé, voir les erreurs ci-dessous<br />';
            echo 'Erreur : '.$e->getMessage().'<br />';
            echo 'N° : '.$e->getCode();
        
            exit();
        }
    }
}