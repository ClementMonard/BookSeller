<?php
session_start();
include_once 'configuration.php';
include_once 'controllers/headerCtrl.php';
include_once 'formLogin.php';
include_once 'formRegistration.php';  
?>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/materialize.min.css" /> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/navbar.css" />
    <link rel="stylesheet" href="assets/css/formLogin.css" />
    <link rel="stylesheet" href="assets/css/formRegistration.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>BookSeller</title>
</head>
<div class="navbar">
    <ul class="menu menu-hover-lines">
        <li class="content-navbar"><a href="index.php">BookSeller</a></li>
        <li class="content-navbar"><a href="typeofbooks.php">Genres Littéraires</a></li>
        <li><a href="../application.php">AUTEURS</a></li>
        <?php if (!isset($_SESSION['isConnect'])) { ?>
        <li><a href="#modalLogin" class="modal-trigger">Se connecter</a></li>
        <li><a href="#modalRegistration" class="modal-trigger">S'inscrire</a></li>
        <?php } else { ?> 
        <li><a href="profil-user.php?id=<?= $_SESSION['id'] ?>">Mon compte</a></li>
        <li><a href="index.php?action=disconnect">Déconnexion</a></li>
        <?php if($_SESSION['rank'] > 1) { ?>
        <li><a href="views/admin.php">ADMIN</a></li>
        <?php } ?>
        <?php } ?>
    </ul>
</div>
