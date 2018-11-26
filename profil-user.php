<?php
include_once 'configuration.php';
include_once 'controllers/profil-userCtrl.php';
?>

<!DOCTYPE html>
<html>
<header>
    <?php require 'header.php'; ?>
</header>
<?php if (isset($_SESSION['isConnect'])) { ?>
<?php if (isset($_SESSION['id'])) { ?>
    <main>
<div class="container">
    <div class="row">
        <form method="POST" action="">
            <div class="input-field col l8 s12">
                <input type="text" name="name" id="name" value="<?php if (isset($_SESSION['name'])) {echo $_SESSION['name'];}?>" />
                <label for="name">Pseudo</label>
            </div>
            <input type="submit" id="modifyName" name="modifyName" class="btn col l4 s12 modifyButtonProfil" value="modifier le nom d'utilisateur" />
        </form>
    </div>
    <div class="row">
        <form method="POST" action="">
            <div class="input-field col l8 s12">
                <input type="password" name="password" id="password" />
                <label for="password">Nouveau mot de passe</label>
            </div>
            <input type="submit" id="modifyPassword" name="modifyPassword" class="btn col l4 s12 modifyButtonProfil"
                value="modifier le mot de passe" />
        </form>
    </div>
    <div class="row">
        <form method="POST" action="">
            <div class="input-field col l8 s12">
                <input type="email" name="mail" id="mail" value="<?php if (isset($_SESSION['mail'])) {echo $_SESSION['mail'];}?>" />
                <label for="mail">E-mail</label>
            </div>
            <input type="submit" name="modifyMail" id="modifyMail" class="btn col l4 s12 modifyButtonProfil" value="modifier votre adresse mail" />
        </form>
    </div>
    <a class="waves-effect waves-light btn modal-trigger red" href="#modalDELETE">SUPPRIMER MON COMPTE</a>
    <div id="modalDELETE" class="modal">
        <div class="modal-content">
            <div class="input-field">
                <input type="text" id="deleteInput" />
                <label for="deleteInput">SI VOUS ÊTES SÛR DE VOULOIR SUPPRIMER VOTRE COMPTE VEUILLEZ SAISIR SUPPRIMER</label>
            </div>
            <a class="btn red" id="deleteAccount">SUPPRIMER MON COMPTE</a>
            <a href="" class="modal-action modal-close btn-flat">ANNULER</a>
        </div>
    </div>
</div>
<?php } ?>
<?php } else { ?>
<p>Veuillez vous connecter pour avoir accès à votre profil.</p>
<?php } ?>
</main>
<body>
    <?php require 'footer.php'; ?>
</body>
<?php  require 'scriptnavbar.php'; ?>

</html>