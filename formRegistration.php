<?php 
    include_once 'models/users.php'; 
    include_once 'controllers/registrationCtrl.php';
?>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
<div id="modalRegistation" class="reveal" data-reveal>
    <form action="index.php" method="POST">
        <div class="form-icons">
            <h4>Inscription</h4>
            <div class="input-group">
                <span class="input-group-label">
                    <i class="fa fa-user"></i>
                </span>
                <input class="input-group-field" type="text" name="name" id="name" placeholder="Identifiant" />
            </div>
            <?php
            if (isset($formError['name'])) { ?> 
                <p class="text-danger"><?= $formError['name'] ?></p>
            <?php } ?>            
            <div class="input-group">
                <span class="input-group-label">
                    <i class="fa fa-envelope"></i>
                </span>
                <input class="input-group-field" type="email" name="mail" id="mail" placeholder="Email" />
            </div>
            <?php
            if (isset($formError['mail'])) { ?> 
                <p class="text-danger"><?= $formError['mail'] ?></p>
            <?php } ?>
            <div class="input-group">
                <span class="input-group-label">
                    <i class="fa fa-key"></i>
                </span>
                <input class="input-group-field" name="password" id="password" type="password" placeholder="Mot de passe">
            </div>
            <div class="input-group">
                <span class="input-group-label">
                    <i class="fa fa-check-square" aria-hidden="true"></i>
                </span>
                <input class="input-group-field" name="passwordVerify" id="passwordVerify" type="password"
                    placeholder="Confirmation mot de passe" />
            </div>
            <?php
            if (isset($formError['password'])) { ?> 
                <p class="text-danger"><?= $formError['password'] ?></p>
            <?php } ?>
            <button class="button expanded" type="submit" name="submitForm">S'inscrire</button>
        </div>
    </form>
    <button class="close-button" data-close aria-label="Close modal">
        <span aria-hidden="true">&times;</span>
    </button>
</div>