<?php
include_once '../configuration.php';
include_once '../controllers/list-authorsCtrl.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Liste des utilisateurs</title>
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
                        <li><a href="add-books.php">Ajoutez un livre</a></li>
                        <li><a href="list-of-users.php">Voir les utilisateurs</a></li>
                        <li><a href="list-types-movements.php">Voir la liste des types et courants littéraire</a></li>
                        <li><a href="add-types-movements.php">Ajoutez des types et courants littéraire</a></li>
                        <li><a href="list-authors.php">Liste des auteurs</a></li>
                    </ul>
            </div>
        </nav>
        <table class="centered bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom de l'auteur</th>
                    <th>Prénom de l'auteur</th>
                    <th>Date de naissance</th>
                    <th>Date de décès</th>
                    <th>Modifier l'auteur</th>
                    <th>Supprimer un auteur</th>
                </tr>
            </thead>
            <tbody>
        <?php foreach ($displayAuthorsList AS $displayAuthor) { ?>
                <tr>
                    <td><?= $displayAuthor->id ?></td>
                    <td><?= $displayAuthor->lastname ?></td>
                    <td><?= $displayAuthor->firstname ?></td>
                    <td><?= $displayAuthor->dateOfBirth ?></td>
                    <?php if (!is_null($displayAuthor->dateOfDeath)) { ?>
                    <td><?= $displayAuthor->dateOfDeath ?></td>
                 <?php } else { ?>
                    <td>/</td>
                 <?php } ?>
                    <td><a href="details-authors.php?id=<?= $displayAuthor->id ?>">Détails</a></td>
                    <form method=POST action="list-authors.php?id=<?= $displayAuthor->id ?>"><td><input type="submit" name="deletingButtonAuthor" value="Supprimer" /></td></form>
                </tr>
            <?php } ?>
            <p>*Supprimer un auteur causera la suppression de son/ses livres.</p>
            </tbody>
        </table>
        <?php } ?>
        <?php } else { ?>
            <p>Vous n'avez pas accès à cette page.</p>
            <a href="../index.php">Retournez à l'accueil.</a>
        <?php } ?>
    </header>
</body>

</html>