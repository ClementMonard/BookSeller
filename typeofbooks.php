<?php
include_once 'configuration.php';
include_once 'controllers/typeofbooksCtrl.php';
?>
<!DOCTYPE html>
<html>
<body>
    <header>
        <?php include_once 'header.php'; ?>
    </header>
    <div class="container typeswithbooks">
        <h2 class="center-align">Livres Psychologie</h2>
        <?php foreach ($booksPsycho as $displayAllPsychosBooks) { ?>
        <div class="col m4 s6">
            <div class="row">
                <a href="bookdetails.php?id=<?= $displayAllPsychosBooks->bookID ?>"><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllPsychosBooks->cover ?>" /></a>
                <a href=""><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllPsychosBooks->cover ?>" /></a>
                <a href=""><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllPsychosBooks->cover ?>" /></a>
                <a href=""><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllPsychosBooks->cover ?>" /></a>
                <a href=""><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllPsychosBooks->cover ?>" /></a>
            </div>
        </div>
        <?php } ?>
        <h2 class="center-align">Livres Business</h2>
        <?php foreach ($booksBusiness as $displayAllBusinessBooks) { ?>
        <div class="col m4 s6">
            <div class="row">
                <a href="bookdetails.php?id=<?= $displayAllBusinessBooks->bookID ?>"><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllBusinessBooks->cover ?>" /></a>
                <a href=""><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllBusinessBooks->cover ?>" /></a>
                <a href=""><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllBusinessBooks->cover ?>" /></a>
                <a href=""><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllBusinessBooks->cover ?>" /></a>
                <a href=""><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllBusinessBooks->cover ?>" /></a>
            </div>
        </div>
        <?php } ?>
        <h2 class="center-align">Livres Biographie</h2>
        <?php foreach ($booksBiography as $displayAllBiographyBooks) { ?>
        <div class="col m4 s6">
            <div class="row">
                <a href="bookdetails.php?id=<?= $displayAllBiographyBooks->bookID ?>"><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllBiographyBooks->cover ?>" /></a>
                <a href=""><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllBiographyBooks->cover ?>" /></a>
                <a href=""><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllBiographyBooks->cover ?>" /></a>
                <a href=""><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllBiographyBooks->cover ?>" /></a>
                <a href=""><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllBiographyBooks->cover ?>" /></a>
            </div>
        </div>
        <?php } ?>
        <h2 class="center-align">Livres Développement Personnel</h2>
        <?php foreach ($booksPersonalDevelopment as $displayAllPersonalDevelopmentBooks) { ?>
        <div class="col m4 s6">
            <div class="row">
                <a href="bookdetails.php?id=<?= $displayAllPersonalDevelopmentBooks->bookID ?>"><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllPersonalDevelopmentBooks->cover ?>" /></a>
                <a href=""><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllPersonalDevelopmentBooks->cover ?>" /></a>
                <a href=""><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllPersonalDevelopmentBooks->cover ?>" /></a>
                <a href=""><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllPersonalDevelopmentBooks->cover ?>" /></a>
                <a href=""><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllPersonalDevelopmentBooks->cover ?>" /></a>
            </div>
        </div>
        <?php } ?>
        <h2 class="center-align">Romans Science-fiction</h2>
        <?php foreach ($booksRomanScienceFiction as $displayAllScienceFictionBooks) { ?>
        <div class="col m12 s6">
            <div class="row">
                <a href="bookdetails.php?id=<?= $displayAllScienceFictionBooks->bookID ?>"><img class="bookscovertob m2" src="assets/img/bookscover/<?= $displayAllScienceFictionBooks->cover ?>" /></a>
                <a href=""><img class="bookscovertob m2" src="assets/img/bookscover/<?= $displayAllScienceFictionBooks->cover ?>" /></a>
                <a href=""><img class="bookscovertob m2" src="assets/img/bookscover/<?= $displayAllScienceFictionBooks->cover ?>" /></a>
                <a href=""><img class="bookscovertob m2" src="assets/img/bookscover/<?= $displayAllScienceFictionBooks->cover ?>" /></a>
                <a href=""><img class="bookscovertob m2" src="assets/img/bookscover/<?= $displayAllScienceFictionBooks->cover ?>" /></a>
            </div>
        </div>
        <?php } ?>
    </div>


    <?php require 'footer.php'; ?>
    <?php require 'scriptnavbar.php'; ?>
</body>

</html>