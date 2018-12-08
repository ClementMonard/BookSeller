<?php
//Déclaration des tableaux contenant les messages de succès et d'erreur
$formError = [];
$successRegistration = [];

if (isset($_POST['submitForm'])) {
    if (!empty($_POST['name'])) {
        $name = htmlspecialchars($_POST['name']);
        if (strlen($name) > 25) {
            $formError['name'] = 'Votre pseudo ne doit pas dépasser 25 caractères.';
        }
        if (strlen($name) < 3) {
            $formError['name'] = 'Votre pseudo doit avoir 5 caractères au minimum.';
        }
    } else {
        $formError['name'] = 'Champs obligatoire.';
    }

    if (!empty($_POST['mail']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $mail = htmlspecialchars($_POST['mail']);
    } else {
        $formError['mail'] = 'Champs obligatoire.';
    }

    if (!empty($_POST['password']) && !empty($_POST['passwordVerify']) && $_POST['password'] == $_POST['passwordVerify']) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    } else {
        $formError['password'] = 'Les mots de passes ne sont pas identiques.';
    }
}

//Si la comptabilisation du tableau d'erreur est égale à 0
if (count($formError) == 0 && isset($_POST['submitForm'])) {
    $user = new users();
    //Permet de vérifier si l'utilisateur est déjà enregistré en base
    $check = $user->checkingIfTheUserAlreadyExists();
    if ($check == 0) {
    $user->name = $name;
    $user->mail = $mail;
    $user->password = $password;
    //Ajout de l'utilisateur dans la base de données
    if ($user->addUserToDatabase()) {
        $successRegistration['register'] = 'Inscription réussie ! Bienvenue';
        header('location:index.php');
        exit;
        } 
    }
}