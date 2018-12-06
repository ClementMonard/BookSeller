<?php
include_once '../configuration.php';
include_once '../controllers/booksAdminCtrl.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Liste des livres</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/materialize.min.css" /> 
    <link rel="stylesheet" href="../assets/css/style.css" /> 
</head>
<body>
    <header>
        <?php if(isset($_SESSION['rank'])) { ?>
        <?php if($_SESSION['rank'] > 1) {?>
            <nav>
                <div class="nav-wrapper">
                    <a href="admin.php">BookSeller Espace Admin</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="list-books.php">Liste des livres</a></li>
                        <li><a href="add-books.php">Ajoutez un livre</a></li>
                        <li><a href="list-of-users.php">Voir les utilisateurs</a></li>
                        <li><a href="list-types-movements.php">Voir la liste des types et courants littéraire</a></li>
                        <li><a href="add-types-movements.php">Ajoutez des types et courants littéraire</a></li>
                        <li><a href="list-authors.php">Liste des auteurs</a></li>
                    </ul>
                </div>
            </nav>
            <?php if ($successMessage == true) { ?>
            <h2 class="text-success center-alin">Le livre a bien été supprimé.</h2>
            <?php } ?>
            <div class="container typeswithbooks">
        <h2 class="center-align">Livres Psychologie</h2>
        <div class="col m4 s6">
            <div class="row">
            <?php foreach ($booksPsycho as $displayAllPsychosBooks) { ?>
                <a href="booksdetailAdmin.php?id=<?= $displayAllPsychosBooks->bookID ?>"><img class="bookscovertob" src="../assets/img/bookscover/<?= $displayAllPsychosBooks->cover ?>" /></a>
                <?php } ?>
            </div>
        </div>
        <h2 class="center-align">Livres Business</h2>
        <div class="col m4 s6">
            <div class="row">
            <?php foreach ($booksBusiness as $displayAllBusinessBooks) { ?>
                <a href="booksdetailAdmin.php?id=<?= $displayAllBusinessBooks->bookID ?>"><img class="bookscovertob" src="../assets/img/bookscover/<?= $displayAllBusinessBooks->cover ?>" /></a>
            <?php } ?>
            </div>
        </div>
        <h2 class="center-align">Livres Biographie</h2>
        <div class="col m4 s6">
            <div class="row">
            <?php foreach ($booksBiography as $displayAllBiographyBooks) { ?>
                <a href="booksdetailAdmin.php?id=<?= $displayAllBiographyBooks->bookID ?>"><img class="bookscovertob" src="../assets/img/bookscover/<?= $displayAllBiographyBooks->cover ?>" /></a>
            <?php } ?>
            </div>
        </div>
        <h2 class="center-align">Livres Développement Personnel</h2>
        <div class="col m4 s6">
            <div class="row">
            <?php foreach ($booksPersonalDevelopment as $displayAllPersonalDevelopmentBooks) { ?>
                <a href="booksdetailAdmin.php?id=<?= $displayAllPersonalDevelopmentBooks->bookID ?>"><img class="bookscovertob" src="../assets/img/bookscover/<?= $displayAllPersonalDevelopmentBooks->cover ?>" /></a>
            <?php } ?>
            </div>
        </div>
        <h2 class="center-align">Romans Science-fiction</h2>
        <div class="col m12 s6">
            <div class="row">
            <?php foreach ($booksRomanScienceFiction as $displayAllScienceFictionBooks) { ?>
                <a href="booksdetailAdmin.php?id=<?= $displayAllScienceFictionBooks->bookID ?>"><img class="bookscovertob m2" src="../assets/img/bookscover/<?= $displayAllScienceFictionBooks->cover ?>" /></a>
            <?php } ?>
            </div>
        </div>
        <h2 class="center-align">Romans Policiers</h2>
        <div class="col m12 s6">
            <div class="row">
            <?php foreach ($booksPolicier as $displayAllPolicierBooks) { ?>
                <a href="booksdetailAdmin.php?id=<?= $displayAllPolicierBooks->bookID ?>"><img class="bookscovertob m2" src="../assets/img/bookscover/<?= $displayAllPolicierBooks->cover ?>" /></a>
            <?php } ?>
            </div>
        </div>
        <h2 class="center-align">Livres L'Humanisme</h2>
        <div class="col m12 s6">
            <div class="row">
            <?php foreach ($booksHumanism as $displayAllHumanismBooks) { ?>
                <a href="booksdetailAdmin.php?id=<?= $displayAllHumanismBooks->bookID ?>"><img class="bookscovertob m2" src="../assets/img/bookscover/<?= $displayAllHumanismBooks->cover ?>" /></a>
            <?php } ?>
            </div>
        </div>
    </div>
        <?php } ?>
        <?php } else { ?>
        <nav>
            <div class="nav-wrapper">
            </div>
        </nav>
        <?php } ?>
    </header>
    <?php if(isset($_SESSION['rank'])){ ?>
    <?php if($_SESSION['rank'] > 1){?>
    <?php } ?>
    <?php } else { ?>
    <p>Vous n'avez pas accès à cette page</p>
    <a href="/index.php">Retour à l'accueil</a>
    <?php } ?>
</body>

</html>