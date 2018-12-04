<?php
include_once '../configuration.php';
include_once '../controllers/list-authorsCtrl.php';
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
            </div>
        </nav>
        <div class="container">
                <?php if (isset($displayAuthorsDetails)) { ?>
                    <form action="details-authors.php?id=<?= $listAuthors->id ?>" method="POST">
                <ul>
                    <li class="m12">
                        <label for="lastname">Nom de l'auteur :</label>
                        <input type="text" name="lastname" id="lastname" value="<?php if (isset($listAuthors->lastname)) {echo $listAuthors->lastname;}?>" />
                        <?php if (isset($formErrorAuthor['lastname'])) { ?>
                        <p class="text-danger center-align">
                            <?= $formErrorAuthor['lastname'] ?>
                        </p>
                        <?php } ?>
                    </li>
                    <li class="m12">
                        <label for="lastname">Prénom de l'auteur :</label>
                        <input type="text" name="firstname" id="firstname" value="<?php if (isset($listAuthors->firstname)) {echo $listAuthors->firstname;}?>" />
                        <?php if (isset($formErrorAuthor['firstname'])) { ?>
                        <p class="text-danger center-align">
                            <?= $formErrorAuthor['firstname'] ?>
                        </p>
                        <?php } ?>
                    </li>
                    <li class="m12">
                        <label for="dateOfBirth">Date de naissance :</label>
                        <input type="text" name="dateOfBirth" id="dateOfBirth" value="<?php if (isset($listAuthors->dateOfBirth)) {echo $listAuthors->dateOfBirth;}?>" />
                        <?php if (isset($formErrorAuthor['dateOfBirth'])) { ?>
                        <p class="text-danger center-align">
                            <?= $formErrorAuthor['dateOfBirth'] ?>
                        </p>
                        <?php } ?>
                    </li>
                    <li class="m12">
                        <label for="dateOfDeath">Date de décès :</label>
                        <input type="text" name="dateOfDeath" id="dateOfDeath" value="<?php if (isset($listAuthors->dateOfDeath)) {echo $listAuthors->dateOfDeath;}?>" />
                        <?php if (isset($formErrorAuthor['dateOfDeath'])) { ?>
                        <p class="text-danger center-align">
                            <?= $formErrorAuthor['dateOfDeath'] ?>
                        </p>
                        <?php } ?>
                    </li>
                </ul>
                <input type="submit" name="modifyButtonAuthor" value="Modifier" class="col-md-12 btn btn-success">
                <?php if (isset($formError['modifyButtonAuthor'])) { ?>
                <p class="text-danger center-align">
                    <?= $formErrorType['modifyButtonAuthor'] ?>
                </p>
                <?php } ?>
            </form>
        </div>
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