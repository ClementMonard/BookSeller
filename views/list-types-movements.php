<?php
session_start();
include_once '../configuration.php';
include_once '../controllers/details-types-movementsCtrl.php';
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
        <?php if($_SESSION['rank'] > 1) { ?>
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">BookSeller Espace Admin</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="add-books.php">Ajoutez un livre</a></li>
                    <li><a href="add-types-movements.php">Ajoutez un type/courant littéraire</a></li>
                </ul>
            </div>
        </nav>
        <h1 class="center-align">Liste des types de livre</h1>
        <table class="centered bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Types de livre</th>
                    <th>Modifier le type</th>
                    <th>Supprimer le type</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($displayAllTypesOfBook AS $displayTypes) { ?>
                <tr>
                    <td>
                        <?= $displayTypes->id ?>
                    </td>
                    <td>
                        <?= $displayTypes->type ?>
                    </td>
                    <td><a href="details-user.php?id=<?= $displayTypes->id ?>">Détails</a></td>
                    <form method=POST action="list-of-users.php?id=<?= $displayTypes->id ?>">
                        <td><input type="submit" name="deletingButton" value="Supprimer" /></td>
                    </form>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <h1 class="center-align">Liste des courants littéraire</h1>
        <table class="centered bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Types de livre</th>
                    <th>Modifier le courant littéraire</th>
                    <th>Supprimer le courant littéraire</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($displayAllLiteraryMovements AS $displayMovements) { ?>
                <tr>
                    <td>
                        <?= $displayMovements->id ?>
                    </td>
                    <td>
                        <?= $displayMovements->Literarymovement ?>
                    </td>
                    <td><a href="details-user.php?id=<?= $displayMovements->id ?>">Détails</a></td>
                    <form method=POST action="list-of-users.php?id=<?= $displayMovements->id ?>">
                        <td><input type="submit" name="deletingButton" value="Supprimer" /></td>
                    </form>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
        <p>Vous n'avez pas accès à cette page.</p>
        <a href="index.php">Retour à l'accueil.</a>
        <?php } ?>
        <?php } ?>
    </header>
</body>

</html>