<?php

include_once '../configuration.php'; 

$book = new books();

 if (isset($_POST['inputApp'])) {
    $inputApp = htmlspecialchars($_POST['inputApp']);
    echo json_encode($book->displayBooksByHisTypeApp($inputApp));
 } else if (isset($_POST['inputAppBook'])) {
    $book->name = htmlspecialchars($_POST['inputAppBook']);
    echo json_encode($book->displayBookByHisName());
 } else if (isset($_POST['bookName'])) {
    $book->name = htmlspecialchars($_POST['bookName']);
    echo json_encode($book->getNameOfBook());
 } else if (isset($_POST['inputAppLm'])) {
     $inputAppLm = htmlspecialchars($_POST['inputAppLm']);
     echo json_encode($book->displayBooksByHisLmApp($inputAppLm));
 }

?>