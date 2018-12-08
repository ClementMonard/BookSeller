<?php

$user = new users();
$user->id = $_GET['id'];
$showUser = $user->getTheUserByHisID();


//Déclaration des tableaux permettant de stocker les messages de succès et d'erreur
$formErrorName = [];
$formErrorPassword = [];
$formErrorMail = [];
$formSuccessName = [];
$formSuccessMail = [];
$formSuccessPassword = [];


//Permet d'afficher le livre favoris d'un utilisateur dans son profil
if (isset($_GET['id'])) {
    $book = new books();
    $user->id_DZOPD_books = $book->id;
    $displayFavoriteBook = $user->displayFavorite();
}


//Permet la suppression d'un utilisateur dans son profil
if (isset($_POST['deleteAccount'])) {
    $user = new users();
    $user->id = $_SESSION['id'];
    $user->deleteUser();
    session_destroy();
    header('location:index.php');
}

//--------------------------------------MODIFICATION PSEUDO-----------------------------------------------//

//Permet à l'utilisateur de modifier son pseudo s'il n'est pas déjà enregistré dans la base de données
if (isset($_POST['modifyName'])) {
    if (!empty($_POST['name'])) {
        $name = htmlspecialchars($_POST['name']);
        $usernameAlreadyUsed = new users();
        $usernameAlreadyUsed->name = $name;
        //Méthode qui permet de voir si le pseudo est déjà enregistré dans la base de données
        $checkUsername = $usernameAlreadyUsed->checkingIfTheUserAlreadyExists();

        if (strlen($name) > 25) {
            $formErrorName['name'] = 'Ne pas dépasser 25 caractères';
        }
        //Fonction permettant de calculer la taille de la chaine de caractères
        if (strlen($name) < 2) {
            $formErrorName['name'] = 'Veuillez au moins saisir 2 caractères.';
        }
        //Si le résultat est égal à 0, c'est que le pseudo n'est pas déjà enregistré
        if ($checkUsername == 0) {
          $usernameConfirm = $name;
        } else {
            $formErrorName['name'] = 'Ce pseudo est déjà utilisé.';
        }
    } else {
        $formErrorName['name'] = 'Veuillez saisir un pseudo dans le champs de saisi';
    }

        //Si la comptabilisation du tableau d'erreur est égal à 0
        if (count($formErrorName) == 0) {
            //L'utilisateur peut mettre à jour son pseudo
            $user = new users();
            $user->id = $_GET['id'];
            $user->name = $name;
            $user->updateName();
            $_SESSION['name'] = $name;
            $formSuccessName['name'] = 'Modification enregistrée avec succès.';
        }
}

//---------------------------MODIFICATION MOT DE PASSE-----------------------------------//

if (isset($_POST['modifyPassword'])) {

    if (!empty($_POST['oldPassword'])) {
        $oldPassword = htmlspecialchars($_POST['oldPassword']);
        if ($oldPassword == $_SESSION['password']) {
        }
    }
   
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    } else {
        $formErrorPassword['password'] = 'Les mots de passes ne sont pas identiques.';
    }
    //Si la comptabilisation du tableau d'erreur est égale à 0
    if (count($formErrorPassword) == 0) {
        //L'utilisateur peut changer son mot de passe
        $user->id = $_GET['id'];
        $user->password = $password;
        $user->updatePassword();
        $formSuccessPassword['password'] = 'Modification enregistrée avec succès';
    }
}


//-----------------------------------MODIFICATION ADRESSE MAIL---------------------------------------------//

//Permet à l'utilisateur de modifier son adresse mail s'il n'est pas déjà enregistré dans la base de données
if (isset($_POST['modifyMail'])) {
    if (!empty($_POST['mail']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $mail = htmlspecialchars($_POST['mail']);
        $mailAlreadyUsed = new users();
        $mailAlreadyUsed->mail = $mail;
        //Méthode qui permet de voir si l'adresse mail est déjà enregistrée dans la base de données
        $checkMail = $mailAlreadyUsed->checkingIfTheMailAlreadyExists();
        //Si le résultat est égal à 0, c'est que l'adresse mail n'est pas déjà enregistrée
        if ($checkMail == 0) {
            $mailConfirm = $mail;
        } else {
            $formErrorMail['mail'] = 'Cette adresse-mail est déjà utilisée.';
        }
    } else {
        $formErrorMail['mail'] = 'Veuillez saisir une adresse-mail.';
    }
    //Si la comptabilisation du tableau d'erreur est égal à 0
    if (count($formErrorMail) == 0) {
        //L'utilisateur peut mettre à jour son adresse mail
        $user = new users();
        $user->id = $_GET['id'];
        $user->mail = $mail;
        $user->updateMail();
        $_SESSION['mail'] = $mail;
        $formSuccessMail['mail'] = 'Modification enregistrée avec succès.';
     }
}