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
    <p>
        <?= $booksDetails->name ?>
    </p>
    <img src="<?= $booksDetails->cover ?>" class="bookscover" title="Ceci est un livre" alt="Ceci est un livre" />
    <p>Date :
        <?= $booksDetails->date ?>
    </p>
    <p>ISBN :
        <?= $booksDetails->ISBN ?>
    </p>
    <p>Résumé :
        <?= $booksDetails->resume ?>
    </p>
    <p>Type du livre :
        <?= $booksDetails->type ?>
    </p>
    <p>Auteur :
        <?= $booksDetails->lastname . ' ' .  $booksDetails->firstname ?> </p>
    <p>Date de naissance :
        <?= $booksDetails->dateOfBirth ?>
    </p>
    <p>
        <?= $booksDetails->dateOfDeath ?>
    </p>
    <?php } ?>
    <div class="row bookscards">
        <div class="col s12 m3">
            <div class="card">
                <div class="card-image">
                    <img src="<?= $booksDetails->cover ?>" />
                    <span class="card-title">
                        <?= $booksDetails->name ?></span>
                </div>
                <div class="card-content">
                    <p><?= $booksDetails->type . ' ' . $booksDetails->name;  ?></p>
                    <p>Résumé : <?= $booksDetails->resume ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php require 'footer.php'; ?>
</body>
<?php
        require 'scriptnavbar.php';
    ?>

</html>