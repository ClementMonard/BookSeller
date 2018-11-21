<?php
session_start();
include_once '../configuration.php';
include_once '../controllers/addtypesmovementsCtrl.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ajoutez un type ou un courant littéraire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/materialize.min.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body>
    <?php if (isset($_SESSION['rank'])) { ?>
    <?php if ($_SESSION['rank'] > 1) { ?>
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
    <h1 id="titleAddGenres" class="center-align">Ajout d'un type et courant littéraire</h1>
    <form action="#" method="POST">
        <div class="row">
            <div class="input-field col s12">
                <input id="type" name="type" type="text" class="validate" value="<?php if (isset($type)) {echo $type;} ?>">
                <?php if (isset($formErrorType['type'])) { ?>
                <p class="text-danger center-align">
                    <?= $formErrorType['type'] ?>
                </p>
                <?php } ?>
                <label for="type">Ajoutez un type de livre</label>
            </div>
            <button class="btn waves-effect waves-light col s12" type="submit" name="submitType" id="submitType">ENVOYEZ</button>
        </div>
    </form>
    <h5 class="center-align">Ajout d'un courant littéraire</h5>
    <form action="#" method="POST">
        <div class="row">
            <div class="input-field col s12">
                <input id="Literarymovement" name="Literarymovement" type="text" class="validate" value="<?php if (isset($Literarymovement)) {echo $Literarymovement;} ?>">
                <?php if (isset($formErrorLiteraryMovement['Literarymovement'])) { ?>
                <p class="text-danger center-align">
                    <?= $formErrorLiteraryMovement['Literarymovement'] ?>
                </p>
                <?php } ?>
                <label for="Literarymovement">Ajoutez un courant littéraire</label>
            </div>
            <button class="btn waves-effect waves-light col s12" type="submit" name="submitMovements" id="submitMovements">ENVOYEZ</button>
        </div>
    </form>
    <?php } ?>
    <?php } ?>
</body>