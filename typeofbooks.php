<html>
<?php
require 'header3.php';
require 'models/typeofbooks.php';
require 'controllers/typeofbooksCtrl.php';
require 'scriptnavbar.php';
?>
<?php foreach ($nameList as $name) { ?>
    <p><?= $name->name; ?></p>
<?php } ?>
</html>