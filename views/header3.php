<?php
session_start();
include 'controllers/headerCtrl.php';
include 'formLogin.php';
include 'formRegistration.php';  
?>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/foundation.css" /> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">      
    <link rel="stylesheet" href="assets/css/navbar.css" />
    <link rel="stylesheet" href="assets/css/formLogin.css" />
    <link rel="stylesheet" href="assets/css/formRegistration.css" />
    <title>BookSeller</title>
</head>
<div class="navbar">
    <ul class="menu menu-hover-lines">
        <li class="content-navbar active"><a href="#">BookSeller</a></li>
        <li><a href="views/literarygenres.php">Genres Littéraires</a></li>
        <li><a href="../application.php">Comment BookSeller</a></li>
        <li><a href="../citations.php">Citations</a></li>
        <?php if (!isset($_SESSION['isConnect'])) { ?>
        <li><a href="#" data-open="modalLogin">Se connecter</a></li>
        <li><a href="#" data-open="modalRegistation">S'inscrire</a></li>
        <?php } else { ?>
        <li><a href="oui.php">Mon compte</a></li>
        <li><a href="index.php?action=disconnect">Se déconnecter</a></li>
        <?php } ?>
    </ul>
</div>