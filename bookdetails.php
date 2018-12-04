<?php
include_once 'configuration.php';
include_once 'controllers/booksCtrl.php';
?>

<!DOCTYPE html>
<html>
<header>
    <?php require 'header.php'; ?>
</header>
<main>

    <body>
        <?php if (isset($_GET['id']) && isset($displayDetailsOfBooks) && is_numeric($_GET['id'])) { ?>
        <div class="container">
            <?php foreach ($displayDetailsOfBooks AS $displayBooks) { ?>
            <div class="col s12 m7">
                <div class="card horizontal bookcard">
                    <div class="card-image">
                        <img class="bookcovertob" src="assets/img/bookscover/<?= $displayBooks->cover ?>">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <p class="detailsBook"><span class="titleDetails">Titre du livre : </span>
                                <?= $displayBooks->name  ?>
                            </p>
                            <p class="detailsBook"><span class="titleDetails">Type du livre : </span>
                                <?= $displayBooks->type  ?>
                            </p>
                            <p class="detailsBook"><span class="titleDetails">Date de parution du livre : </span>
                                <?= $displayBooks->date  ?>
                            </p>
                            <?php if (!is_null($displayBooks->Literarymovement)) { ?>
                            <p class="detailsBook"><span class="titleDetails">Courant littéraire : </span>
                                <?= $displayBooks->Literarymovement  ?>
                            </p>
                            <?php } ?>
                            <p class="detailsBook"><span class="titleDetails">Auteur : </span><a href="profil-author.php?idAuthor=<?= $displayBooks->authorID ?>">
                                    <?= $displayBooks->firstname . ' ' . $displayBooks->lastname  ?></a></p>
                            <p><span class="titleDetails">Date de naissance </span>
                                <?= $displayBooks->dateOfBirth  ?>
                            </p>
                            <?php if (!is_null($displayBooks->dateOfDeath)) { ?>
                            <p class="detailsBook"><span class="titleDetails">Date de décès : </span>
                                <?= $displayBooks->dateOfDeath  ?>
                            </p>
                            <?php } ?>
                            <p class="detailsBook"><span class="titleDetails">Résumé du livre : </span>
                                <?= $displayBooks->resume  ?>
                            </p>
                        </div>
                        <div class="card-action">
                            <a href="http://amazon.fr">Amazon</a>
                            <button name="addToFavorite" class="btn" type="submit" href="#">Ajoutez ce livre au favoris</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (isset($_SESSION['isConnect']) && isset($_GET['id']) && is_numeric($_GET['id'])) { ?>
            <div class="comments">
                <div class="comment-wrap">
                    <div class="comment-block">
                        <form action="" method="POST">
                            <textarea name="message" id="message" cols="30" rows="3" placeholder="Ajoutez un commentaire..."></textarea>
                            <?php if (isset($formErrorComment['message'])) { ?>
                                <p class="text-danger"><?= $formErrorComment['message'] ?></p>
                            <?php } ?>
                            <button name="submitComment" id="submitComment" class="btn">Ajoutez un commentaire</button>
                        </form>
                    </div>
                </div>
                <?php } else { ?>
                    <p>Pour pouvoir laisser un commentaire, vous devez être connecté.</p>
                <?php } ?>
                <?php foreach ($displayAllComments AS $displayComments) { ?>
                <div class="comment-wrap">
                    <div class="comment-block">
                        <p class="comment-text m12"><?= $displayComments->message ?></p>
                        <div class="bottom-comment">
                            <div class="comment-date"><?= 'De ' . $displayComments->name . ' le ' .$displayComments->date ?></div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        </div>
        <?php } else {?>
        <p>Livre introuvable.</p>
        <a href="index.php">Retour à la page d'accueil.</a>
        <?php } ?>
</main>
<?php require 'footer.php'; ?>
</body>
<?php require 'scriptnavbar.php'; ?>

</html>