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
                <a href="#" class="brand-logo">BookSeller Espace Admin</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="add-books.php">Ajoutez un livre</a></li>
                </ul>
            </div>
        </nav>
        <table class="centered bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom de l'utilisateur</th>
                    <th>Mail de l'utilisateur</th>
                    <th>Rang</th>
                    <th>Détails de l'utilisateur</th>
                    <th>Supprimer un utilisateur</th>
                </tr>
            </thead>
            <tbody>
        <?php foreach ($listOfUsers AS $displayUsers) { ?>
            <?php if ($displayUsers->rank != 2) { ?>
                <tr>
                    <td><?= $displayUsers->id ?></td>
                    <td><?= $displayUsers->name ?></td>
                    <td><?= $displayUsers->mail ?></td>
                    <td><?= $displayUsers->rank ?></td>
                    <td><a href="details-user.php?id=<?= $displayUsers->id ?>">Détails</a></td>
                    <td><input type="submit" name="deletingButton" value="Supprimer" /></td>
                </tr>
                <?php } ?>
            <?php } ?>
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