<?php
session_start();
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
        <?php if (isset($_GET['id']) && isset($displayDetailsOfBooks)) { ?>
        <div class="container">
            <?php foreach ($displayDetailsOfBooks as $displayBooks) { ?>
            <form action="booksdetailAdmin.php?id=<?= $displayBooks->bookID ?>" method="POST">
                <div class="col s12 m7">
                    <div class="card horizontal bookcard">
                        <div class="card-image">
                            <img src="../assets/img/bookscover/<?= $displayBooks->cover ?>">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <label for="name">Titre de l'auteur :</label>
                                <input type="text" name="name" id="name" value="<?php if (isset($displayBooks->name)) {echo $displayBooks->name;}?>" />
                                <?php if (isset($formErrorBook['name'])) { ?>
                                <p class="text-danger center-align">
                                    <?= $formErrorBook['name'] ?>
                                </p>
                                <?php } ?>
                                <label for="date">Date de parution :</label>
                                <input type="text" name="date" id="date" value="<?php if (isset($displayBooks->date)) {echo $displayBooks->date;}?>" />
                                <?php if (isset($formErrorBook['date'])) { ?>
                                <p class="text-danger center-align">
                                    <?= $formErrorBook['date'] ?>
                                </p>
                                <?php } ?>
                                <label for="ISBN">ISBN :</label>
                                <input type="text" name="ISBN" id="ISBN" value="<?php if (isset($displayBooks->ISBN)) {echo $displayBooks->ISBN;}?>" />
                                <?php if (isset($formErrorBook['ISBN'])) { ?>
                                <p class="text-danger center-align">
                                    <?= $formErrorBook['ISBN'] ?>
                                </p>
                                <?php } ?>
                                <label for="resume">Résumé</label>
                                <textarea name="resume" id="resume" class="materialize-textarea"><?php if (isset($displayBooks->resume)) {echo $displayBooks->resume;}?></textarea>
                                <?php if (isset($formErrorBook['resume'])) { ?>
                                <p class="text-danger center-align">
                                    <?= $formErrorBook['resume'] ?>
                                </p>
                                <?php } ?>
                                <p><span class="titleDetails">Type du livre : </span>
                                    <?= $displayBooks->type  ?>
                                </p>
                                <?php if (!is_null($displayBooks->Literarymovement)) { ?>
                                <p><span class="titleDetails">Courant littéraire : </span>
                                    <?= $displayBooks->Literarymovement  ?>
                                </p>
                                <?php } ?>
                                <p><span class="titleDetails">Auteur : </span>
                                    <?= $displayBooks->firstname . ' ' . $displayBooks->lastname  ?>
                                </p>
                                <p><span class="titleDetails">Date de naissance </span>
                                    <?= $displayBooks->dateOfBirth  ?>
                                </p>
                                <?php if (!is_null($displayBooks->dateOfDeath)) { ?>
                                <p><span class="titleDetails">Date de décès : </span>
                                    <?= $displayBooks->dateOfDeath  ?>
                                </p>
                                <form>
                                    <?php } ?>
                            </div>
                            <div class="card-action">
                                <button class="btn waves-effect waves-light" type="submit" name="modifyButton" id="modifyButton">Modifier</button>
                                <form method=POST action="#"><button class="btn waves-effect waves-light" type="submit" name="deleteBookButton" id="deleteBookButton">Supprimer le livre</button></form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
        </div>
        <?php } else {?>
        <p>Livre introuvable.</p>
        <a href="index.php">Retour à la page d'accueil.</a>
        <?php } ?>
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