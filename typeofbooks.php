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
<main>
  <ul id="slide-out" class="side-nav">
    <li><div class="user-view">
      <div class="background">
        <img src="assets/img/bookscover/booksnavbar.jpeg">
      </div>
      <a href="#!name"><span class="white-text name"><?php if (isset($_SESSION['name'])) {echo $_SESSION['name'];} ?></span></a>
      <a href="#!email"><span class="white-text email"><?php if (isset($_SESSION['mail'])) {echo $_SESSION['mail'];} ?></span></a>
    </div></li>
    <li><p class="center-align">Types de livres</p></li>
    <?php foreach ($nameList AS $typesList) { ?>
    <li><a href="#<?= $typesList->type ?>" id="redirection<?= $typesList->type ?>"><?= $typesList->type ?></a></li>
    <?php } ?>
    <li><div class="divider"></div></li>
    <li><p class="center-align">Courants littéraire</p></li>
    <?php foreach ($lmList AS $literaryMovementsList) { ?>
        <li><a href="#<?= $literaryMovementsList->Literarymovement ?>" id="redirection<?= $literaryMovementsList->Literarymovement ?>"><?= $literaryMovementsList->Literarymovement ?></a></li>
    <?php } ?>
  </ul>
  <div class="container">
  <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i>Filtrer</a>
  </div>
    <div class="container typeswithbooks">
        <h2 class="center-align" id="psychoBooks">Livres Psychologie</h2>
        <div class="col m4 s6">
            <div class="row">
                <?php foreach ($booksPsycho as $displayAllPsychosBooks) { ?>
                <a href="bookdetails.php?id=<?= $displayAllPsychosBooks->bookID ?>"><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllPsychosBooks->cover ?>" /></a>
                <?php } ?>
            </div>
        </div>
        <h2 class="center-align" id="businessBooks">Livres Business</h2>
        <div class="col m4 s6">
            <div class="row">
                <?php foreach ($booksBusiness as $displayAllBusinessBooks) { ?>
                <a href="bookdetails.php?id=<?= $displayAllBusinessBooks->bookID ?>"><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllBusinessBooks->cover ?>" /></a>
                <?php } ?>
            </div>
        </div>
        <h2 class="center-align" id="biographyBooks">Livres Biographie</h2>
        <div class="col m4 s6">
            <div class="row">
                <?php foreach ($booksBiography as $displayAllBiographyBooks) { ?>
                <a href="bookdetails.php?id=<?= $displayAllBiographyBooks->bookID ?>"><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllBiographyBooks->cover ?>" /></a>
                <?php } ?>
            </div>
        </div>
        <h2 class="center-align" id="personnalDevelopmentBooks">Livres Développement Personnel</h2>
        <div class="col m4 s6">
            <div class="row">
                <?php foreach ($booksPersonalDevelopment as $displayAllPersonalDevelopmentBooks) { ?>
                <a href="bookdetails.php?id=<?= $displayAllPersonalDevelopmentBooks->bookID ?>"><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllPersonalDevelopmentBooks->cover ?>" /></a>
                <?php } ?>
            </div>
        </div>
        <h2 class="center-align" id="scienceFictionBooks">Romans Science-fiction</h2>
        <div class="col m12 s6">
            <div class="row">
                <?php foreach ($booksRomanScienceFiction as $displayAllScienceFictionBooks) { ?>
                <a href="bookdetails.php?id=<?= $displayAllScienceFictionBooks->bookID ?>"><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllScienceFictionBooks->cover ?>" /></a>
                <?php } ?>
            </div>
        </div>
        <h2 class="center-align" id="policierBooks">Livres Policiers</h2>
        <div class="col m4 s6">
            <div class="row">
                <?php foreach ($booksPolicier as $displayAllPolicierBooks) { ?>
                <a href="bookdetails.php?id=<?= $displayAllPolicierBooks->bookID ?>"><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllPolicierBooks->cover ?>" /></a>
                <?php } ?>
            </div>
        </div>
        <h2 class="center-align" id="bdBooks">Bandes-dessinées</h2>
        <div class="col m4 s6">
            <div class="row">
                <?php foreach ($booksBd as $displayAllBdBooks) { ?>
                <a href="bookdetails.php?id=<?= $displayAllBdBooks->bookID ?>"><img class="bookscovertob" src="assets/img/bookscover/<?= $displayAllBdBooks->cover ?>" /></a>
                <?php } ?>
            </div>
        </div>
    </div>
</main>
    <?php require 'footer.php'; ?>
    <?php require 'scriptnavbar.php'; ?>
</body>

</html>