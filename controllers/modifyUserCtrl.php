<?php 

$formError = [];
$regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-\ ]+$/';

$users = new users();

if (isset($_GET['id'])) {
    $users->id = $_GET['id'];
    $displayDetailsOfUsers = $users->displayUsersDetails();
}

if (isset($_POST['modifyButton'])) {

if (isset($_POST['name'])) {
    //Conversion des caractères spéciaux en entités HTML pour la sécurité
    $users->name = htmlspecialchars($_POST['name']);
    //Test de la ragex sur la variable $name
    if (!preg_match($regexName, $users->name)) {
        //Message d'erreur si la variable $name ne correspond pas à la regex
        $formError['name'] = 'Votre nom ne doit contenir que des lettres';
    }
    //Fonction permettant de calculer la taille de la chaine de caractères
    if (strlen($users->name) > 25) {
        $formError['name'] = 'Ne pas dépasser 25 caractères';
    }
    //Fonction permettant de calculer la taille de la chaine de caractères
    if (strlen($users->name) < 2) {
        $formError['name'] = 'Veuillez au moins saisir 2 caractères.';
    }
    //Si le champ n'est pas complété, affiche un message d'erreur
    if (empty($users->name)) {
        $formError['name'] = 'Champs obligatoire';
    }
}

if (isset($_POST['mail'])) {
    //Conversion des caractères spéciaux en entités HTML pour la sécurité
    $users->mail = htmlspecialchars($_POST['mail']);
    //Test de la ragex sur la variable $email
    if (!FILTER_VAR($users->mail, FILTER_VALIDATE_EMAIL)) {
        // Si le champ n'est pas valide, stocker dans le tableau le rapport d'érreur
        $formError['email'] = 'Le champ email est incorrect.';
    }
    //Fonction permettant de calculer la taille de la chaine de caractères
    if (strlen($users->mail) > 100) {
        $formError['mail'] = 'Votre adresse mail ne doit pas dépasser les  100 caractères';
    }
    if (strlen($users->mail) < 5) {
        $formError['mail'] = 'Veuillez au moins saisir 5 caractères.';
    }
    //Fonction permettant de calculer la taille de la chaine de caractères
    //Si le champ n'est pas complété, affiche ce message d'erreur
    if (empty($users->mail)) {
        $formError['mail'] = 'Champs obligatoire';
    }
}

if (isset($_POST['ranking'])) {
    $users->rank = htmlspecialchars($_POST['ranking']);
    if (!is_numeric($users->rank)) {
        $formError['ranking'] = 'Seuls les chiffres sont acceptés.';
    }
    if ($users->rank > 3) {
        $formError['ranking'] = 'Le rang ne peut pas dépasser 3.';
    } 
}
    //Si la comptabilisation du tableau est égal à 0
    if (count($formError) == 0) {
        //Modification de l'utilisateur
        $users->modifyUser();
    }
}