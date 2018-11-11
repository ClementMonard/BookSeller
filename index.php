<?php 
include_once 'configuration.php';
require 'controllers/indexCtrl.php'; ?>
<!DOCTYPE html>
<html lang="fr">
    <body>
        <header>
        <?php require 'header.php'; ?>
        </header>
            <?php foreach ($detailsList as $booksDetails) { ?>
                <p><?= $booksDetails->name ?></p>
                <img src="<?= $booksDetails->cover ?>" class="bookscover" title="Ceci est un livre" alt="Ceci est un livre" />
                <p>Date : <?= $booksDetails->date ?></p>
                <p>ISBN : <?= $booksDetails->ISBN ?></p>
                <p>Résumé : <?= $booksDetails->resume ?></p>
            <?php } ?>
            <?php require 'footer.php'; ?>
    </body>
    <?php
        require 'scriptnavbar.php';
    ?>
</html>
