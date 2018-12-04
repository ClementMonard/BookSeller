<?php
include_once '../configuration.php';
include_once '../controllers/modifyTypesMovementsCtrl.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Modification type/courant</title>
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
            <a href="admin.php">BookSeller Espace Admin</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="add-books.php">Ajoutez un livre</a></li>
                        <li><a href="list-of-users.php">Voir les utilisateurs</a></li>
                        <li><a href="list-types-movements.php">Voir la liste des types et courants littéraire</a></li>
                        <li><a href="add-types-movements.php">Ajoutez des types et courants littéraire</a></li>
                        <li><a href="list-authors.php">Ajoutez des types et courants littéraire</a></li>
                        <li><a href="add-types-movements.php">Ajoutez des types et courants littéraire</a></li>
                    </ul>
                </ul>
            </div>
        </nav>
        <div class="container">
                <?php if (isset($displayTypeOfBooksDetails)) { ?>
                    <form action="details-types-movements.php?idType=<?= $type->id ?>" method="POST">
                <ul>
                    <li class="m12">
                        <label for="type">Type :</label>
                        <input type="text" name="type" id="type" value="<?php if (isset($type->type)) {echo $type->type;}?>" />
                        <?php if (isset($formErrorType['type'])) { ?>
                        <p class="text-danger center-align">
                            <?= $formErrorType['type'] ?>
                        </p>
                        <?php } ?>
                    </li>
                </ul>
                <input type="submit" name="modifyButtonType" value="Modifier" class="col-md-12 btn btn-success">
                <?php if (isset($formError['modifyButtonType'])) { ?>
                <p class="text-danger center-align">
                    <?= $formErrorType['modifyButtonType'] ?>
                </p>
                <?php } ?>
            </form>
        </div>
        <?php } ?>
        <div class="container">
                <?php if (isset($displayLiteraryMovementDetails)) { ?>
                    <form action="details-types-movements.php?idLm=<?= $lm->id ?>" method="POST">
                <ul>
                    <li class="m12">
                        <label for="Literarymovement">Courant littéraire :</label>
                        <input type="text" name="Literarymovement" id="Literarymovement" value="<?php if (isset($lm->Literarymovement)) {echo $lm->Literarymovement;}?>" />
                        <?php if (isset($formError['Literarymovement'])) { ?>
                        <p class="text-danger center-align">
                            <?= $formError['Literarymovement'] ?>
                        </p>
                        <?php } ?>
                    </li>
                </ul>
                <input type="submit" name="modifyButtonLm" value="Modifier" class="col-md-12 btn btn-success">
                <?php if (isset($formError['modifyButtonLm'])) { ?>
                <p class="text-danger center-align">
                    <?= $formError['modifyButtonLm'] ?>
                </p>
                <?php } ?>
            </form>
        </div>
        <?php }  ?>
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