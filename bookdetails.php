<?php
include_once 'configuration.php';
include_once 'controllers/booksCtrl.php';
?>

<!DOCTYPE html>
<html>
<header>
    <?php require 'header.php'; ?>
</header>

<body>
    <?php if (isset($_GET['id']) && isset($displayDetailsOfBooks)) { ?>
    <div class="container">
        <?php foreach ($displayDetailsOfBooks as $displayBooks) { ?>
        <div class="col s12 m7">
            <div class="card horizontal bookcard">
                <div class="card-image">
                    <img src="assets/img/bookscover/<?= $displayBooks->cover ?>">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <p><span class="titleDetails">Titre du livre : </span>
                            <?= $displayBooks->name  ?>
                        </p>
                        <p><span class="titleDetails">Type du livre : </span>
                            <?= $displayBooks->type  ?>
                        </p>
                        <p><span class="titleDetails">Date de parution du livre : </span>
                            <?= $displayBooks->date  ?>
                        </p>
                        <?php if (!is_null($displayBooks->Literarymovement)) { ?>
                        <p><span class="titleDetails">Courant littéraire : </span>
                            <?= $displayBooks->Literarymovement  ?>
                        </p>
                        <?php } ?>
                        <p><span class="titleDetails">Auteur : </span><a href="profil-author.php?idAuthor=<?= $displayBooks->authorID ?>">
                                <?= $displayBooks->firstname . ' ' . $displayBooks->lastname  ?></a></p>
                        <p><span class="titleDetails">Date de naissance </span>
                            <?= $displayBooks->dateOfBirth  ?>
                        </p>
                        <?php if (!is_null($displayBooks->dateOfDeath)) { ?>
                        <p><span class="titleDetails">Date de décès : </span>
                            <?= $displayBooks->dateOfDeath  ?>
                        </p>
                        <?php } ?>
                        <p><span class="titleDetails">Résumé du livre : </span>
                            <?= $displayBooks->resume  ?>
                        </p>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
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
    <?php require 'footer.php'; ?>
</body>

</html>