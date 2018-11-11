<?php

include 'regex.php';

$formError = [];
$message = '';

if (isset($_POST['submitForm'])) {
    if (!empty($_POST['name'])) {
        $name = htmlspecialchars($_POST['name']);
        if (!preg_match($regexName, $name)) {
            $formError['name'] = 'Veuillez saisir des caractères valides.';
        }
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

if (count($formError) == 0 && isset($_POST['submitForm'])) {
    $user = new users();
    $user->checkingIfTheUserAlreadyExists();
    $user->name = $name;
    $user->mail = $mail;
    $user->password = $password;
    $user->addUserToDatabase();
    $message = 'Inscription réussie.';
}