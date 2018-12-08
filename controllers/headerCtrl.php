<?php

//Au clic sur sur le bouton contenant la superglobal $_GET['action]
if (isset($_GET['action'])) {
    //Si action est égal à disconnect
    if ($_GET['action'] == 'disconnect') {
        //destruction de la session, donc déconnexion
        session_destroy();
        //Redirection vers l'index une fois la déconnexion effectuée
        header('location:index.php');
    }
}