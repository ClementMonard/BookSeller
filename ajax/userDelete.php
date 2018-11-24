<?php 

include 'configuration.php';

$user = new users();
$user->id = $_GET['id'];
$user->name = $_SESSION['name'];

if (isset($_POST['deleteInput'])) {
    if ($_POST['deleteInput'] == 'SUPPRIMER') {
        $user = new users();
        $user->id = $_GET['id'];
       if ($user->deleteUser()){
           session_destroy();
           echo 'SUCCESSFULL';
       } else {
        echo 'Failure';
      }
    } 
}