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
    <?php if(isset($_SESSION['rank'])) { ?>
    <?php if($_SESSION['rank'] > 1) {?>
    <header>
        <nav>
            <div class="nav-wrapper">
            <a href="admin.php">BookSeller Espace Admin</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="add-books.php">Ajoutez un livre</a></li>
                        <li><a href="list-of-users.php">Voir les utilisateurs</a></li>
                        <li><a href="list-types-movements.php">Voir la liste des types et courants littéraire</a></li>
                        <li><a href="add-types-movements.php">Ajoutez des types et courants littéraire</a></li>
                        <li><a href="list-authors.php">Liste des auteurs</a></li>
                    </ul>
            </div>
        </nav>
    </header>
    <h1 id="titleAddBooks" class="center-align">Ajout d'un livre, auteur, type et courant littéraire</h1>
    <form enctype="multipart/form-data" action="#" method="POST">
        <div class="row">
            <div class="row">
                <div class="input-field col s6">
                    <input id="lastname" name="lastname" type="text" class="validate" value="<?php if (isset($lastname)) {echo $lastname;} ?>">
                    <?php if (isset($formError['lastname'])) { ?>
                    <p class="text-danger center-align">
                        <?= $formError['lastname'] ?>
                    </p>
                    <?php } ?>
                    <label for="lastname">Nom de l'auteur</label>
                </div>
                <div class="input-field col s6">
                    <input id="firstname" name="firstname" type="text" class="validate" value="<?php if (isset($firstname)) {echo $firstname;} ?>">
                    <?php if (isset($formError['firstname'])) { ?>
                    <p class="text-danger center-align">
                        <?= $formError['firstname'] ?>
                    </p>
                    <?php } ?>
                    <label for="firstname">Prénom de l'auteur</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="dateOfBirth" name="dateOfBirth" type="text">
                    <?php if (isset($formError['dateOfBirth'])) { ?>
                    <p class="text-danger center-align">
                        <?= $formError['dateOfBirth'] ?>
                    </p>
                    <?php } ?>
                    <label for="dateOfBirth">Date de naissance de l'auteur</label>
                </div>
                <div class="input-field col s6">
                    <input id="dateOfDeath" name="dateOfDeath" type="text">
                    <?php if (isset($formError['dateOfDeath'])) { ?>
                    <p class="text-danger center-align">
                        <?= $formError['dateOfDeath'] ?>
                    </p>
                    <?php } ?>
                    <label for="dateOfDeath">Date de décès de l'auteur</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="name" name="name" type="text" value="<?php if (isset($name)) {echo $name;} ?>">
                    <?php if (isset($formError['name'])) { ?>
                    <p class="text-danger center-align">
                        <?= $formError['name'] ?>
                    </p>
                    <?php } ?>
                    <label for="name">Nom du livre</label>
                </div>
                <div class="file-field input-field col s6">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>Sélectionner la couverture du livre</span>
                            <input type="file" name="cover" id="cover">
                            <?php if (isset($formError['cover'])) { ?>
                            <p class="text-danger center-align">
                                <?= $formError['cover'] ?>
                            </p>
                            <?php } ?>
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-field col s6">
                <select name="typeofbooks[]" id="typeofbooks">
                    <option value="" disabled selected>Choisir un type de livre</option>
                    <?php foreach ($listTypeOfBooks AS $displayTypeOfBooks) { ?>
                    <option value="<?= $displayTypeOfBooks->id ?>">
                        <?= $displayTypeOfBooks->type ?>
                    </option>
                    <?php } ?>
                </select>
                <?php if (isset($formError['typeofbooks'])) { ?>
                <p class="text-danger center-align">
                    <?= $formError['typeofbooks'] ?>
                </p>
                <?php } ?>
                <label>Type de livre</label>
            </div>
            <div class="input-field col s6">
                <select name="literarymovements[]" id="literarymovements">
                    <option value="" disabled selected>Choisir un courant littéraire</option>
                    <?php foreach ($listingOfLiteraryMovement AS $displayLiteraryMovement) { ?>
                    <option value="<?= $displayLiteraryMovement->id ?>">
                        <?= $displayLiteraryMovement->Literarymovement ?>
                    </option>
                    <?php } ?>
                </select>
                <?php if (isset($formError['literarymovement'])) { ?>
                <p class="text-danger center-align">
                    <?= $formError['literarymovement'] ?>
                </p>
                <?php } ?>
                <label for="literarymovement">Courant littéraire</label>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="ISBN" name="ISBN" type="text" value="<?php if (isset($ISBN)) {echo $ISBN;} ?>" />
                    <?php if (isset($formError['ISBN'])) { ?>
                    <p class="text-danger center-align">
                        <?= $formError['ISBN'] ?>
                    </p>
                    <?php } ?>
                    <label for="ISBN">ISBN</label>
                </div>
                <div class="input-field col s6">
                    <p>Date de parution</p>
                    <input id="date" name="date" type="text" />
                    <?php if (isset($formError['date'])) { ?>
                    <p class="text-danger center-align">
                        <?= $formError['date'] ?>
                    </p>
                    <?php } ?>
                </div>
            </div>
            <div class="input-field col s12">
                <textarea id="resume" name="resume" type="textarea" class="materialize-textarea"><?php if (isset($resume)) {echo $resume;} ?></textarea>
                <?php if (isset($formError['resume'])) { ?>
                <p class="text-danger center-align">
                    <?= $formError['resume'] ?>
                </p>
                <?php } ?>
                <label for="resume">Résumé du livre</label>
            </div>
            <button class="btn waves-effect waves-light col s12" type="submit" name="submitBook" id="submitBook">ENVOYEZ
            </button>
        </div>
    </form>
    <?php } ?>
    <?php } ?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="../assets/js/script.js"></script>
<script src="../assets/js/materialize.min.js"></script>

</html>