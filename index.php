<?php 
include_once 'configuration.php';
require 'controllers/indexCtrl.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<body>
    <header>
        <?php require 'header.php'; ?>
    </header>
<main>
    <div class="container">
        <div class="carousel">
            <p class="center-align titleCarousel">LES DERNIERES NOUVEAUTES DE LA SEMAINE<p>
         <?php foreach ($getBookByLastId AS $getCover) { ?>
            <a class="carousel-item" href="bookdetails.php?id=<?= $getCover->id ?>"><img src="assets/img/bookscover/<?= $getCover->cover ?>"></a>
         <?php } ?>
        </div>
    </div>
    <?php if (isset($_SESSION['isConnect'])) { ?>
    <div class="container" id="explainationText">
        <p>Bienvenue <span class="titleDetails"><?=  $_SESSION['name'] ?></span>, l'application BookSeller vous permettra de trouver de manière fluide et rapide
           votre prochain ouvrage, pour cela vous n'avez qu'à saisir dans la barre de recherche un type de livre disponible sur le site
           pour que des livres de ce même type apparaîssent.
        </p>
    </div>
    <div class="container" id="application">
    <div class="input-field col s12">
          <input type="text" id="autocomplete-input-type" class="autocomplete searchBarApp">
          <label for="autocomplete-input-type">Veuillez saisir un type de livre pour obtenir en résultat des livres du même type</label>
        </div> 
        <div class="input-field col s12">
          <input type="text" id="autocomplete-input-book" class="autocomplete searchBarApp">
          <label for="autocomplete-input-book">Veuillez saisir le nom d'un livre pour obtenir des livres du même type.</label>
        </div> 
        <div id="displayBooks" class="displayBooks"></div>       
    </div>
    <?php } else { ?>
        <p>Vous devez être connecté pour avoir accès à l'application.</p>
    <?php } ?>
</main>
    <?php require 'footer.php'; ?>
</body>
<?php  require 'scriptnavbar.php'; ?>

</html>