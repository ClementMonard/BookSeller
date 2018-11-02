<?php
include '../configuration.php';
include '../models/typeofbooks.php';
include '../controllers/literarygenresCtrl.php';
?>
<html>
<?php foreach ($nameList as $nameOfGenres) { ?>
  <p><?=$nameOfGenres->name; ?></p>
  <?php } ?>
</html>