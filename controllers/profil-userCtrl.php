<?php

$user = new users();
$user->id = $_GET['id'];
$showUser = $user->getTheUserByHisID();

$formErrorName = [];
$formErrorPassword = [];
$formErrorMail = [];
$formSuccessName = [];
$formSuccessMail = [];
$formSuccessPassword = [];

if (isset($_GET['id'])) {
    $book = new books();
    $user->id_DZOPD_books = $book->id;
    $displayFavoriteBook = $user->displayFavorite();
}

if (isset($_POST['deleteAccount'])) {
    $user = new users();
    $user->id = $_SESSION['id'];
    $user->deleteUser();
    session_destroy();
    header('location:index.php');
}

if (isset($_POST['modifyName'])) {
    if (!empty($_POST['name'])) {
        $name = htmlspecialchars($_POST['name']);
        $usernameAlreadyUsed = new users();
        $usernameAlreadyUsed->name = $name;
        $checkUsername = $usernameAlreadyUsed->checkingIfTheUserAlreadyExists();

        if (strlen($name) > 25) {
            $formErrorName['name'] = 'Ne pas dépasser 25 caractères';
        }
        //Fonction permettant de calculer la taille de la chaine de caractères
        if (strlen($name) < 2) {
            $formErrorName['name'] = 'Veuillez au moins saisir 2 caractères.';
        }

        if ($checkUsername == 0) {
          $usernameConfirm = $name;
        } else {
            $formErrorName['name'] = 'Ce pseudo est déjà utilisé.';
        }
    } else {
        $formErrorName['name'] = 'Veuillez saisir un pseudo dans le champs de saisi';
    }

        if (count($formErrorName) == 0) {
            $user = new users();
            $user->id = $_GET['id'];
            $user->name = $name;
            $user->updateName();
            $_SESSION['name'] = $name;
            $formSuccessName['name'] = 'Modification enregistrée avec succès.';
        }
}


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

    if (count($formErrorPassword) == 0) {
        $user->id = $_GET['id'];
        $user->password = $password;
        $user->updatePassword();
        $formSuccessPassword['password'] = 'Modification enregistrée avec succès';
    }
}

if (isset($_POST['modifyMail'])) {
    if (!empty($_POST['mail']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $mail = htmlspecialchars($_POST['mail']);
        $mailAlreadyUsed = new users();
        $mailAlreadyUsed->mail = $mail;
        $checkMail = $mailAlreadyUsed->checkingIfTheMailAlreadyExists();

        if ($checkMail == 0) {
            $mailConfirm = $mail;
        } else {
            $formErrorMail['mail'] = 'Cette adresse-mail est déjà utilisée.';
        }
    } else {
        $formErrorMail['mail'] = 'Veuillez saisir une adresse-mail.';
    }

    if (count($formErrorMail) == 0) {
        $user = new users();
        $user->id = $_GET['id'];
        $user->mail = $mail;
        $user->updateMail();
        $_SESSION['mail'] = $mail;
        $formSuccessMail['mail'] = 'Modification enregistrée avec succès.';
     }
}