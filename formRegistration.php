<?php 
    include_once 'models/users.php'; 
    include_once 'controllers/registrationCtrl.php';
?>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
<div id="modalRegistration" class="modal">
    <form action="#" method="POST" id="registrationForm">
        <div class="form-icons">
            <h4 id="titleLogin">Inscription</h4>
            <div class="input-field">
                <i class="small material-icons prefix">account_circle</i>
                <input class="input-field" type="text" name="name" id="name" placeholder="Identifiant" data-lenght="25" />
            </div>
            <?php
            if (isset($formError['name'])) { ?> 
                <p class="text-danger center-align"><?= $formError['name'] ?></p>
            <?php } ?>            
            <div class="input-field">
                <i class="small material-icons prefix">mail</i>
                <input class="input-field" type="email" name="mail" id="mail" placeholder="Email" />
            </div>
            <?php
            if (isset($formError['mail'])) { ?> 
                <p class="text-danger center-align"><?= $formError['mail'] ?></p>
            <?php } ?>
            <div class="input-field">
                <i class="small material-icons prefix">lock_open</i>
                <input class="input-field" name="password" id="password" type="password" placeholder="Mot de passe">
            </div>
            <div class="input-field">
                <i class="small material-icons prefix">check</i>
                <input class="input-field" name="passwordVerify" id="passwordVerify" type="password"
                    placeholder="Confirmation mot de passe" />
            </div>
            <?php
            if (isset($formError['password'])) { ?> 
                <p class="text-danger center-align"><?= $formError['password'] ?></p>
            <?php } ?>
            <button class="btn waves-effect waves-light" type="submit" name="submitForm" id="submitRegistrationForm">S'inscrire
               <i class="material-icons right">send</i>
            </button>
        </div>
        <?php if ($message != '') { ?>
        <p class="center-align text-success"><?= $message; ?></p>
        <?php } ?>
    </form>
    <button class="close-button" data-close aria-label="Close modal">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<script src="assets/js/script.js"></script>
