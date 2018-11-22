<?php

if (isset($_GET['id'])) {
    $books = new books();
    $books->id = $_GET['id'];
    $displayDetailsOfBooks = $books->detailsBooksById();
}
   
?>
