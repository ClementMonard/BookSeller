<?php
session_start();
include 'controllers/headerCtrl.php';
?>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">BookSeller</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Genres littéraires</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <div class="dropdown-divider"></div>
                        <span class="dropdown-item bookTypeRoman"> Roman</span>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Roman historique</a>
                        <a class="dropdown-item" href="#">Roman d'amour</a>
                        <a class="dropdown-item" href="#">Roman historique</a>
                        <div class="dropdown-divider"></div>
                        <span class="dropdown-item bookTypeRoman"> Roman d'aventures</span>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Roman policier</a>
                        <a class="dropdown-item" href="#">Roman noir</a>
                        <a class="dropdown-item" href="#">Roman espionnage</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Développement Personnel</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Business</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Biographie</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Science-fiction</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Fantasy</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Fantastique</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Comment Booker ?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Citations</a>
                </li>
                <form class="nav-item ml-3">
                    <input type="search" placeholder="Rechercher le nom d'un livre" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </li>
            </ul>
            <button type="button" class="btn btn-dark my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal">Se connecter</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Identifiez-vous</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form class="" action="index.html" method="post">
                    <i class="fas fa-user"></i><input id="usernameLogIn" class="ml-2" type="text" name="username" placeholder="Votre Identifiant" />
                    <div class="dropdown-divider"></div>
                    <i class="fas fa-lock-open"></i><input id="passwordLogIn" class="w-95 ml-1" type="password" name="password" placeholder="Mot de passe" />
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary">Connexion</button>
                    <div class="forgotPassword" id="forgotPassword">
                    <a href="#">Mot de passe oublié ?</a>
                </div>
                </div>
                </div>
            </div>
            </div>
            </div>
            </div>
        </div>
    </nav>
</div>