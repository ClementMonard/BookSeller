<?php
session_start();
include 'controllers/headerCtrl.php';
?>
<div class="navbar">
    <ul class="menu menu-hover-lines">
        <li class="content-navbar active"><a href="#">BookSeller</a></li>
        <li><a href="views/literarygenres.php">Genres Littéraires</a></li>
        <li><a href="../application.php">Comment BookSeller</a></li>
        <li><a href="../citations.php">Citations</a></li>
        <li><a href="#" data-open="modalLogin">Se connecter</a></li>
        <li><a href="#" data-open="modalRegistation">S'inscrire</a></li>
    </ul>
</div>