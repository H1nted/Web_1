<?php 
include_once('header.php'); 
?>
<section class="Login">
    <div class="login__form">
    <form action="includes/login.inc.php" method="post">
        <label for="mail">
            E-mail
        </label>
        <input type="email" name="mail" placeholder="user@example.com" autofocus required>
        <label for="mdp">
            Mot de passe
        </label>
        <input type="password" name="mdp" placeholder="mot de passe..." required>
        <input type="submit" name="Connexion" id="cnx_btn" value="Connexion">
    </form>
    </div>
    </section>
    <?php
    
    if (isset($_GET["error"])){
        if ($_GET["error"]== "empty"){
            echo('<div class="loginErr">Veuillez remplir tous les champs pour pouvoir vous connecter</div>');
        }
    }
    if (isset($_GET["error"])){
        if ($_GET["error"]== "na"){
            echo('<div class="loginErr">Adresse mail ou mot de passe invalide !</div>');
        }
    }
    if (isset($_GET["error"])){
        if ($_GET["error"]== "NotConnected"){
            echo('<div class="loginErr">Connectez-vous pour effectuer un voyage !</div>');
        }
    }
    ?>
    


