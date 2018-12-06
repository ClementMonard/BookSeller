<?php
include_once 'configuration.php';
include_once 'controllers/profil-userCtrl.php';
?>

<!DOCTYPE html>
<html>
<header>
    <?php require 'header.php'; ?>
</header>
<?php if (isset($_SESSION['isConnect']) && $_SESSION['id']) { ?>
<main>
    <div class="container">
        <div class="row">
            <form method="POST" action="">
                <div class="input-field col l8 s12">
                    <input type="text" name="name" id="name" value="<?php if (isset($_SESSION['name'])) {echo $_SESSION['name'];}?>" />
                    <?php if (isset($formSuccessName['name'])) { ?>
                    <p class="center-align green-text">
                        <?= $formSuccessName['name'] ?>
                    </p>
                    <?php } ?>
                    <?php if (isset($formErrorName['name'])) { ?>
                    <p class="center-align red-text">
                        <?= $formErrorName['name'] ?>
                    </p>
                    <?php } ?>
                    <label for="name">Pseudo</label>
                </div>
                <input type="submit" id="modifyName" name="modifyName" class="btn col l4 s12 modifyButtonProfil" value="modifier le nom d'utilisateur" />
            </form>
        </div>
        <div class="row">
            <form method="POST" action="">
                <div class="input-field col l8 s12">
                    <input type="password" name="oldPassword" id="oldPassword" />
                    <?php if (isset($formSuccessPassword['oldPassword'])) { ?>
                    <p class="center-align red-text">
                        <?= $formSuccessPassword['oldPassword'] ?>
                    </p>
                    <?php } ?>
                    <label for="oldPassword">Mot de passe actuel</label>
                </div>
                <div class="input-field col l8 s12">
                    <input type="password" name="password" id="password" />
                    <?php if (isset($formSuccessPassword['password'])) { ?>
                    <p class="center-align green-text">
                        <?= $formSuccessPassword['password'] ?>
                    </p>
                    <?php } ?>
                    <label for="password">Nouveau mot de passe</label>
                </div>
                <input type="submit" id="modifyPassword" name="modifyPassword" class="btn col l4 s12 modifyButtonProfil" value="modifier le mot de passe" />
            </form>
        </div>
        <div class="row">
            <form method="POST" action="">
                <div class="input-field col l8 s12">
                    <input type="email" name="mail" id="mail" value="<?php if (isset($_SESSION['mail'])) {echo $_SESSION['mail'];}?>" />
                    <?php if (isset($formSuccessMail['mail'])) { ?>
                    <p class="center-align green-text">
                        <?= $formSuccessMail['mail'] ?>
                    </p>
                    <?php } ?>
                    <?php if (isset($formErrorMail['mail'])) { ?>
                    <p class="center-align red-text">
                        <?= $formErrorMail['mail'] ?>
                    </p>
                    <?php } ?>
                    <label for="mail">E-mail</label>
                </div>
                <input type="submit" name="modifyMail" id="modifyMail" class="btn col l4 s12 modifyButtonProfil" value="modifier votre adresse mail" />
            </form>
        </div>
        <a class="waves-effect waves-light btn modal-trigger red" href="#modalDELETE">SUPPRIMER MON COMPTE</a>
        <div id="modalDELETE" class="modal">
            <div class="modal-content">
                <p>Si vous êtes sûr de vouloir supprimer votre compte, cliquer sur le bouton ci-dessous.</p>
                <form method="POST" action="#">
                    <button type="submit" name="deleteAccount" class="btn red" id="deleteAccount">SUPPRIMER MON COMPTE</button>
                </form>
                <a href="" class="modal-action modal-close btn-flat">ANNULER</a>
            </div>
        </div>
    </div>
    <p>
        <?= $displayFavoriteBook->name ?>
    </p>
    <?php } else { ?>
    <p>Veuillez vous connecter pour avoir accès à votre profil.</p>
    <?php } ?>
</main>

<body>
    <?php require 'footer.php'; ?>
</body>
<?php  require 'scriptnavbar.php'; ?>
</html>