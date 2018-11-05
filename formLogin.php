<?php 
    include_once 'models/users.php'; 
    include_once 'controllers/loginCtrl.php';
?>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<div id="modalLogin" class="reveal" data-reveal>
    <form method="POST" action="#">
        <div class="form-icons">
            <h4>Se connecter</h4>
            <div class="input-group">
                <span class="input-group-label">
                    <i class="fa fa-user"></i>
                </span>
                <input class="input-group-field" type="text" name="name" id="name" placeholder="Identifiant">
            </div>
            <p class="text-danger"><?= isset($formError['name']) ? $formError['name'] : '' ?></p>
            <div class="input-group">
                <span class="input-group-label">
                    <i class="fa fa-key"></i>
                </span>
                <input class="input-group-field" name="password" id="password" type="password" placeholder="Mot de passe">
            </div>
            <p class="text-danger"><?= isset($formError['password']) ? $formError['password'] : '' ?></p>
            <button class="button expanded" name="submitLoginForm" id="submitLoginForm">Connexion</button>
        </div>
    </form>
    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>