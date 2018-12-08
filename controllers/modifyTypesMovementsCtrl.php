<?php

$formErrorType = [];
$formErrorMovement = [];

$type = new typeofbooks();

if (isset($_GET['idType'])) {
    $type->id = $_GET['idType'];
    $displayTypeOfBooksDetails = $type->displayTypesDetails();
}

$lm = new literarymovement();

if (isset($_GET['idLm'])) {
    $lm->id = $_GET['idLm'];
    $displayLiteraryMovementDetails = $lm->displayMovementsDetails();
}

if (isset($_POST['modifyButtonType'])) {
    if (isset($_POST['type'])) {
        //Conversion des caractères spéciaux en entités HTML pour la sécurité
        $type->type = htmlspecialchars($_POST['type']);
        //Fonction permettant de calculer la taille de la chaine de caractères
        if (strlen($type->type) > 75) {
            $formErrorType['type'] = 'Ne pas dépasser 75 caractères';
        }
        //Fonction permettant de calculer la taille de la chaine de caractères
        if (strlen($type->type) < 3) {
            $formErrorType['type'] = 'Veuillez au moins saisir 3 caractères.';
        }
        //Si le champ n'est pas complété, affiche un message d'erreur
        if (empty($type->type)) {
            $formErrorType['type'] = 'Champs obligatoire';
        }
    }

    //Si la comptabilisation du tableau contenant les messages d'erreur est égal à 0    
    if (count($formErrorType) == 0) {
        //Modification du type de livre
        $type->modifyTypeOfBook();
    }
 }

 if (isset($_POST['modifyButtonLm'])) {
    if (isset($_POST['Literarymovement'])) {
        //Conversion des caractères spéciaux en entités HTML pour la sécurité
        $lm->Literarymovement = htmlspecialchars($_POST['Literarymovement']);
        //Fonction permettant de calculer la taille de la chaine de caractères
        if (strlen($lm->Literarymovement) > 75) {
            $formErrorMovement['Literarymovement'] = 'Ne pas dépasser 75 caractères';
        }
        //Fonction permettant de calculer la taille de la chaine de caractères
        if (strlen($lm->Literarymovement) < 3) {
            $formErrorMovement['Literarymovement'] = 'Veuillez au moins saisir 3 caractères.';
        }
        //Si le champ n'est pas complété, affiche un message d'erreur
        if (empty($lm->Literarymovement)) {
            $formErrorMovement['Literarymovement'] = 'Champs obligatoire';
        }
    }
    //Si la comptabilisation du tableau contenant les messages d'erreur est égal à 0
    if (count($formErrorMovement) == 0) {
        //Modification du courant littéraire
        $lm->modifyLiteraryMovement();
    }
 }

