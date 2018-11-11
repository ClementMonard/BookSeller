<?php 
    include_once 'models/users.php'; 
    include_once 'controllers/loginCtrl.php';
?>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<div id="modalLogin" class="modal">
    <form method="POST" action="#" id="loginForm">
        <div class="form-icons">
            <h4 id="titleLogin">Se connecter</h4>
            <div class="input-field">
                <i class="small material-icons prefix">account_circle</i>
                <input class="input-group-field" type="text" name="name" id="name" placeholder="Identifiant" maxlenght="255" require>
            </div>
            <?php  if (isset($formError['name'])) { ?>
            <p class="text-danger center-align">
                <?= $formError['name'] ?>
            </p>
            <?php } ?>
            <div class="input-field">
                <i class="small material-icons prefix">lock</i>
                <input class="input-group-field" name="password" id="password" type="password" placeholder="Mot de passe" maxlenght="255" require>
            </div>
            <?php  if (isset($formError['password'])) { ?>
            <p class="text-danger center-align">
                <?= $formError['password'] ?>
            </p>
            <?php } ?>
            <button class="btn waves-effect waves-light" type="submit" name="submitLoginForm" id="submitLoginForm">Connexion
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>
    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>