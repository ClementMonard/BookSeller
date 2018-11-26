<?php
include_once 'configuration.php';
include_once 'controllers/authorCtrl.php';
?>

<!DOCTYPE html>
<html>
<header>
    <?php require 'header.php'; ?>
</header>

<body>
    <main>
    <?php if (isset($_GET['idAuthor']) && isset($getAuthor)) { ?>
    <div class="container">
        <p>
            <?= $getAuthor->firstname . ' ' . $getAuthor->lastname ?>
        </p>
        <p>
            <?= $getAuthor->dateOfBirth ?>
        </p>
        <p>
            <?= $getAuthor->dateOfDeath ?>
        </p>
        <?php foreach ($getCover AS $detailsAuthor) { ?>
        <a href="bookdetails.php?id=<?= $detailsAuthor->bookID ?>"><img class="bookscovertob" src="assets/img/bookscover/<?= $detailsAuthor->cover ?>" /></a>
        <?php } ?>
    </div>
    <?php } else {?>
    <p>Auteur introuvable.</p>
    <a href="index.php">Retour à la page d'accueil.</a>
    <?php } ?>
    </main>
    <?php require 'footer.php'; ?>
</body>

</html>