<?php 
include_once 'configuration.php';
require 'controllers/indexCtrl.php'; 
?>
<!DOCTYPE html>
<html lang="fr">

<body>
    <header>
        <?php require 'header.php'; ?>
    </header>
    <main>
        <div class="container">
            <?php if (isset($successRegistration['register'])) { ?>
            <p>
                <?= $successRegistration; ?>
            </p>
            <?php } ?>
            <div class="carousel">
                <p class="center-align titleCarousel">LES DERNIERES NOUVEAUTES DE LA SEMAINE<p>
                        <?php foreach ($getBookByLastId AS $getCover) { ?>
                        <a class="carousel-item" href="bookdetails.php?id=<?= $getCover->id ?>"><img src="assets/img/bookscover/<?= $getCover->cover ?>"></a>
                        <?php } ?>
            </div>
        </div>
        <?php if (isset($_SESSION['isConnect'])) { ?>
        <div class="container" id="explainationText">
            <p>Bienvenue <span class="titleDetails">
                    <?=  $_SESSION['name'] ?></span>, l'application BookSeller vous permettra de trouver de manière
                fluide et rapide votre prochain ouvrage, pour cela, 3 barres de recherches sont mis à votre disposition
                :
            </p>
            <ul>
                <li class="tutoText">-<span class="titleDetails">La première</span> vous servira à rechercher directement des types de livre disponibles sur le site pour
                    obtenir en résultat plusieurs résultats se rapprochant le plus possible de votre recherche.</li>
                <li class="tutoText">-<span class="titleDetails">La deuxième</span> vous servira à rechercher des courants littéraire présents sur le site pour obtenir des ouvrages correspondants à votre recherche.</li>
                <li class="tutoText">-<span class="titleDetails">La troisième</span> vous servira pour de multiples raisons, par exemple vous avez lu un livre qui vous a plus et vous souhaitez connaître les livres s'en rapprochant ? Pas de problème, vous n'avez qu'à saisir le nom du livre pour obtenir une multitude de livres se rapprochant un maximum du livre précédemment saisi ! </li>
            </ul>
        </div>
        <div class="container" id="researchInput">
            <ul class="collapsible" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header"><i class="material-icons">description</i>Rechercher en saisissant
                        le type de livre. Exemple (Psychologie, Business, Bande-dessinée, Policier etc...)</div>
                    <div class="collapsible-body"><span></span>
                        <div class="input-field col m12 s12">
                            <input type="text" id="autocomplete-input-type" class="autocomplete searchBarApp">
                            <label for="autocomplete-input-type">Veuillez saisir un type de livre pour obtenir en
                                résultat des livres du même type</label>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">book</i>Rechercher en saisissant le nom
                        d'un courant littéraire. Exemple (L'humanisme, La Pléiade etc...)</div>
                    <div class="collapsible-body"><span>
                            <div class="input-field col s12">
                                <input type="text" id="autocomplete-input-lm" class="autocomplete searchBarApp">
                                <label for="autocomplete-input-lm">Veuillez saisir le nom d'un livre pour obtenir des
                                    livres du même type.</label>
                            </div>
                        </span>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">book</i>Rechercher en saisissant le nom
                        d'un livre. Exemple (L'interprétation du rêve, Comment parler en public etc...)</div>
                    <div class="collapsible-body"><span>
                            <div class="input-field col s12">
                                <input type="text" id="autocomplete-input-book" class="autocomplete searchBarApp">
                                <label for="autocomplete-input-book">Veuillez saisir le nom d'un livre pour obtenir des
                                    livres du même type.</label>
                            </div>
                        </span>
                    </div>
                </li>
            </ul>
        </div>
        <h2 class="col l12 s12 center-align" id="resultResearch">Les résultats de votre recherche apparaîtrons ici !</h2>
            <div class="container" id="application">
            <div id="displayBooks" class="displayBooks"></div>
        </div>
        <?php } else { ?>
        <p id="notConnectedText" class="center-align">Vous devez être connecté pour avoir accès à l'application.</p>
        <?php } ?>


    </main>
    <?php require 'footer.php'; ?>
</body>
<?php  require 'scriptnavbar.php'; ?>

</html>