<html>
<?php
require 'header.php';
require 'controllers/typeofbooksCtrl.php';
?>
<?php foreach ($nameList as $nameOfType) { ?>
    <a href="booksdetails.php?"><?= $nameOfType->name; ?></a>
<?php } ?>
<?php require 'scriptnavbar.php'; ?>
</html>