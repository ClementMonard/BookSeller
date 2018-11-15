<?php
session_start();
include_once '../configuration.php';
include_once '../controllers/adminCtrl.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ajoutez un livre</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/materialize.min.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body>
    <h1 id="titleAddBooks" class="center-align">Ajout d'un livre</h1>
    <form action="#" method="POST">
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="lastname" name="lastname" type="text" class="validate">
                        <label for="lastname">Nom de l'auteur</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="firstname" name="firstname" type="text" class="validate">
                        <label for="firstname">Prénom de l'auteur</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="dateOfBirth" name="dateOfBirth" type="date" class="datepicker">
                        <label for="dateOfBirth">Date de naissance de l'auteur</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="dateOfDeath" name="dateOfDeath" type="text" class="datepicker">
                        <label for="dateOfDeath">Date de décès de l'auteur</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="name" name="name" type="text">
                        <label for="name">Nom du livre</label>
                    </div>
                    <div class="file-field input-field col s6">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Sélectionner la couverture du livre</span>
                                <input type="file" name="cover" id="cover">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="input-field col s6">
                    <select name="typeofbook">
                        <option value="" disabled selected>Choisir un courant littéraire</option>
                        <?php foreach ($listTypeOfBooks AS $displayTypeOfBooks) { ?>
                        <option value="<?= $displayTypeOfBooks->id ?>">
                            <?= $displayTypeOfBooks->type ?>
                        </option>
                        <?php } ?>
                    </select>
                    <label>Type de livre</label>
                </div>
                <div class="input-field col s6">
                    <select name="literarymovement">
                        <option value="" disabled selected>Choisir un type de livre</option>
                        <?php foreach ($listingOfLiteraryMovement AS $displayLiteraryMovement) { ?>
                        <option value="<?= $displayLiteraryMovement->id ?>">
                            <?= $displayLiteraryMovement->Literarymovement ?>
                        </option>
                        <?php } ?>
                    </select>
                    <label>Courant littéraire</label>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="ISBN" name="ISBN" type="number">
                        <label for="ISBN">ISBN</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="date" name="date" type="date">
                    </div>
                </div>
                <div class="input-field col s12">
                    <textarea id="resume" name="resume" type="textarea" class="materialize-textarea"></textarea>
                    <label for="resume">Résumé du livre</label>
                </div>
        </div>
    </form>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="../assets/js/script.js"></script>
<script src="../assets/js/materialize.min.js"></script>

</html>