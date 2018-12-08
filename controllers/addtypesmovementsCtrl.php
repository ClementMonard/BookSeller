<?php
//Déclaration des tableaux stockant les messages d'erreur
$formErrorType = [];
$formErrorLiteraryMovement = [];

//--------------Permet l'ajout d'un type de livre en base------------------//
if (isset($_POST['submitType'])) {
    //Si l'input n'est pas vide
    if (!empty($_POST['type'])) {
        //Déclaration de la variable type qui stockera la donnée saisie dans l'input type
        $type = htmlspecialchars($_POST['type']);
    } else {
        //Si le champs est vide alors que l'utilisateur à envoyer le formulaire, ce message d'erreur apparaitra
        $formErrorType['type'] = 'Champs obligatoire.';
    }
    //Si le tableau d'erreur est vide
    if (count($formErrorType) == 0) {
        //Instanciation de la classe typeofbooks
        $typeofbooks = new typeofbooks();
        //Attribution de la donnée récupérée précédemment grâce à la variable $type dans le type du livre
        $typeofbooks->type = $type;
        //Appel de la méthode permettant l'ajout d'un type de livre en base
        $typeofbooks->insertType();
    }
}
//--------------Permet l'ajout d'un courant littéraire en base------------------//
if (isset($_POST['submitMovements'])) {
    //Si l'input n'est pas vide
    if (!empty($_POST['literarymovements'])) {
        //Déclaration de la variable Literarymovement qui stockera la donnée saisie dans l'input Literarymovement
        $Literarymovement = htmlspecialchars($_POST['literarymovements']);
    } else {
        //Si le champs est vide alors que l'utilisateur à envoyer le formulaire, ce message d'erreur apparaitra
        $formErrorLiteraryMovement['literarymovements'] = 'Champs obligatoire.';
    }
    //Si le tableau d'erreur est vide
    if (count($formErrorLiteraryMovement) == 0) {
        //Instanciation de la classe typeofbooks
        $addLiterarymovement = new literarymovement();
        //Attribution de la donnée récupérée précédemment grâce à la variable $Literarymovement dans le type du livre
        $addLiterarymovement->Literarymovement = $Literarymovement;
        //Appel de la méthode permettant l'ajout d'un type de livre en bas
        $addLiterarymovement->insertLiteraryMovement();
    }
}
