<?php
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
        <h1 class="center-align">Liste des types de livre</h1>
        <table class="centered bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Types de livre</th>
                    <th>Modifier le type</th>
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
                    <td><a href="details-types-movements.php?idType=<?= $displayTypes->id ?>">Détails</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <h1 class="center-align">Liste des courants littéraire</h1>
        <table class="centered bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Courant littéraire</th>
                    <th>Modifier le courant littéraire</th>
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
                    <td><a href="details-types-movements.php?idLm=<?= $displayMovements->id ?>">Détails</a></td>
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