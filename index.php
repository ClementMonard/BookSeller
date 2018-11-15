<?php 
include_once 'configuration.php';
require 'controllers/indexCtrl.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<body>
    <header>
        <?php require 'views/header.php'; ?>
    </header>
    <?php foreach ($detailsList as $booksDetails) { ?>
        <div class="row bookscards">
          <div class="col s12 m3">
            <div class="card">
                <div class="card-image">
                    <img src="<?= $booksDetails->cover ?>" />
                    <span class="card-title"><?= $booksDetails->name ?></span>
                </div>
                <div class="card-content">
                    <p><span class="titleDetails">Titre du livre : </span><?= $booksDetails->name  ?></p>
                    <p><span class="titleDetails">Type du livre : </span><?= $booksDetails->type ?></p>
                    <p><span class="titleDetails">Date de parution : </span><?= $booksDetails->date ?></p>
                    <p><span class="titleDetails">Nom de l'auteur : </span><?= $booksDetails->lastname ?></p>
                    <p><span class="titleDetails">Prénom de l'auteur : </span><?= $booksDetails->firstname ?></p>
                    <p><span class="titleDetails">Date de naissance : </span><?= $booksDetails->dateOfBirth ?></p>
                    <?php if (!is_null($booksDetails->dateOfDeath)) { ?>
                        <p class="titleDetails">Date de décès : <?= $booksDetails->dateOfDeath ?></p>
                    <?php } ?>
                    <p><span class="titleDetails">Résumé du livre : </span><?= $booksDetails->resume ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php require 'footer.php'; ?>
</body>
<?php  require 'scriptnavbar.php'; ?>

</html>