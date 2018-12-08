<?php

$name = '';
$message='';
$formError = [];

if (isset($_POST['submitLoginForm'])) {
    if (!empty($_POST['name'])) {
        $name = htmlspecialchars($_POST['name']);
    }else {
        $formError['name'] = 'Champs obligatoire.';
    }

    if (!empty($_POST['password'])) {
        $password = htmlspecialchars($_POST['password']);
    }else{
        $formError['password'] = 'Champs obligatoire.';
    }

    //Si la comptabilisation du tableau d'erreur est égal à 0
if(count($formError) == 0){
    //Instanciation de la classe users
    $user = new users();
    //Attribution de la valeur stockée dans $name pour l'attribuer à l'attribut name de la classe users
    $user->name = $name;
    //Si l'utilisateur se connecte
    if($user->UserConnectingToHisAccount()){
        //Son mot de passe est vérifié à l'aide la fonction password_verify qui vérifie que le mot de passe match avec le mot de passé hashé
        if(password_verify($password, $user->password)){
            //la connexion se fait
            $message = 'Connexion effectuée.';
            //On rempli la session avec les attributs de l'objet issus de l'hydratation
            $_SESSION['name'] = $user->name;
            $_SESSION['rank'] = $user->rank;
            $_SESSION['id'] = $user->id;
            $_SESSION['mail'] = $user->mail;
            $_SESSION['password'] = $user->password;
            $_SESSION['isConnect'] = true;
        }else{
            //la connexion échoue
            $message = 'Echec de la connexion.';
        }
    }
}
}
