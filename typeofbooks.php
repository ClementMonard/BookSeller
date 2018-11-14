<html>
<?php
include_once $path.'views/header.php';
include_once $path.'controllers/typeofbooksCtrl.php';
?>
<?php foreach ($nameList as $nameOfType) { ?>
    <a href="booksdetails.php?"><?= $nameOfType->type; ?></a>
<?php } ?>
<?php require 'scriptnavbar.php'; ?>
</html>