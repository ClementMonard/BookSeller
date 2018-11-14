<?php
session_start();
include_once '../configuration.php';
include_once '../controllers/adminCtrl.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profil <?= $users->name ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/materialize.min.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body>
    <header>
        <?php if(isset($_SESSION['rank'])) { ?>
        <?php if($_SESSION['rank'] > 1) {?>
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">BookSeller Espace Admin</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="sass.html">Ajoutez un livre</a></li>
                    <li><a href="list-of-users.php">Voir les utilisateurs</a></li>
                </ul>
            </div>
        </nav>
        <form action="details-user.php?id=<?= $users->id ?>" method="POST" class="">
        <?php if ($displayDetailsOfUsers) { ?>
        <ul>
            <li class="m6">
                <label for="name">Nom :</label>
                <input type="text" name="name" value="<?php if (isset($users->name)) {echo $users->name;}?>" />
                <p class="text-danger">
                    <?= isset($formError['name']) ? $formError['name'] : '' ?>
                </p>
            </li>
            <li class="m6">
                <label for="mail">Mail :</label>
                <input type="text" name="mail" value="<?php if (isset($users->mail)) {echo $users->mail;}?>" />
                <p class="text-danger">
                    <?= isset($formError['mail']) ? $formError['mail'] : '' ?>
                </p>
            </li>
            <li class="m6">
                <label for="rank">Rang :</label>
                <input type="text" name="rank" value="<?php if (isset($users->rank)) {echo $users->rank;}?>" />
                <p class="text-danger">
                    <?= isset($formError['rank']) ? $formError['rank'] : '' ?>
                </p>
            </li>
        </ul>
        <input type="submit" name="modifyButton" value="Modifier" class="col-md-12 btn btn-success">
        </form>
        <?php } ?>
        <?php } ?>
        <?php } else { ?>
        <nav>
            <div class="nav-wrapper">
            </div>
        </nav>
        <?php } ?>
    </header>
</body>

</html>