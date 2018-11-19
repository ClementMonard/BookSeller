<?php

$formErrorType = [];
$formErrorLiteraryMovement = [];

if (isset($_POST['submitType'])) {
    if (!empty($_POST['type'])) {
        $type = htmlspecialchars($_POST['type']);
    } else {
        $formErrorType['type'] = 'Champs obligatoire.';
    }

    if (count($formErrorType) == 0) {
        $typeofbooks = new typeofbooks();
        $typeofbooks->type = $type;
        $typeofbooks->insertType();
    }
}

if (isset($_POST['submitMovements'])) {
    if (!empty($_POST['literarymovements'])) {
        $Literarymovement = htmlspecialchars($_POST['literarymovements']);
    } else {
        $formErrorLiteraryMovement['literarymovements'] = 'Champs obligatoire.';
    }

    if (count($formErrorLiteraryMovement) == 0) {
        $addLiterarymovement = new literarymovement();
        $addLiterarymovement->Literarymovement = $Literarymovement;
        $addLiterarymovement->insertLiteraryMovement();
    }
}
