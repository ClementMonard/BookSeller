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
        $password = $_POST['password'];
    }else{
        $formError['password'] = 'Champs obligatoire.';
    }
}

if(count($formError) == 0){
    $user = new users();
    $user->name = $name;
    if($user->UserConnectingToHisAccount()){
        if(password_verify($password, $user->password)){
            //la connexion se fait
            $message = 'Connexion effectuée.';
            //On rempli la session avec les attributs de l'objet issus de l'hydratation
            $_SESSION['name'] = $user->name;
            $_SESSION['rank'] = $user->rank;
            $_SESSION['id'] = $user->id;
            $_SESSION['isConnect'] = true;
        }else{
            //la connexion échoue
            $message = 'Echec de la connexion.';
        }
    }
}
