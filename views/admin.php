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
    <title>Page Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/materialize.min.css" /> 
    <link rel="stylesheet" href="../assets/css/style.css" /> 
    <script src="main.js"></script>
</head>
<body>
    <header>
        <?php if(isset($_SESSION['rank'])) { ?>
        <?php if($_SESSION['rank'] > 1) {?>
            <nav>
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo">BookSeller Espace Admin</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="add-books.php">Ajoutez un livre</a></li>
                        <li><a href="list-of-users.php">Voir les utilisateurs</a></li>
                    </ul>
                </div>
            </nav>
        <?php } ?>
        <?php } else { ?>
        <nav>
            <div class="nav-wrapper">
            </div>
        </nav>
        <?php } ?>
    </header>
    <?php if(isset($_SESSION['rank'])){ ?>
    <?php if($_SESSION['rank'] > 1){?>
        <li><a href="/index.php">Retour à l'accueil</a></li>
    <?php } ?>
    <?php } else { ?>
    <p>Vous n'avez pas accès à cette page</p>
    <a href="/index.php">Retour à l'accueil</a>
    <?php } ?>
</body>

</html>