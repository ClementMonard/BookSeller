<?php 

include '../configuration.php';

$user = new users();
$user->id = $_SESSION['id'];

if (isset($_POST['deleteInput'])) {
    if ($_POST['deleteInput'] == 'SUPPRIMER') {
        $user->id = $_SESSION['id'];
       if ($user->deleteUser()){
           session_destroy();
           echo 'SUCCESSFULL';
       } else {
        echo 'Failure';
      }
    } 
}