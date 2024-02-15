<?php
include_once('header.php'); 
?>
<?php
    if (isset($_GET["error"])){
        if ($_GET["error"]== "invalid"){
            echo('<div class="loginErr">Fromat nom / prénom invalide !</div>');
        }
    }
    if (isset($_GET["error"])){
        if ($_GET["error"]== "mismatch"){
            echo('<div class="loginErr">Veuillez bien confirmer votre mot de passe !</div>');
        }
    }
    if (isset($_GET["error"])){
        if ($_GET["error"]== "exists"){
            echo('<div class="loginErr">Un compte avec cette adresse mail existe déjà</div>');
        }
    }
    if (isset($_GET["error"])){
        if ($_GET["error"]== "phone"){
            echo('<div class="loginErr">Format numéro téléphone invalide !</div>');
        }
    }
    if (isset($_GET["info"])){
        if ($_GET["info"]== "created"){
            echo('<div class="CovErr">Votre profil a été crée, connectez vous pour voyager !</div>');
        }
    }
    ?>
<section class="Login">
    <div class="login__form">
    <form action="includes/sign.inc.php" method="post">
        <label for="nom">
            Nom
        </label>
        <input type="text" name="nom" placeholder="Votre nom" maxlength="15" autofocus required>

        <label for="prenom">
            Prenom
        </label>
        <input type="text" name="prenom" placeholder="Votre prénom" maxlength="15" required>

        <label for="phone">
            Télephone
        </label>
        <input type="text" name="phone" placeholder="+33" maxlength="9" required>

        <label for="mail">
            E-mail
        </label>
        <input type="email" name="mail" placeholder="user@example.com"  required>
        
        <label for="mdp">
            Mot de passe
        </label>
        <input type="password" name="mdp" placeholder="mot de passe..." maxlength="10" required>
        
        <label for="confirmation">
            Confirmation mot de passe
        </label>
        <input type="password" name="confirmation" placeholder="Confirmation..." maxlength="10" required>

        <input type="submit" name="Inscription" id="cnx_btn" value="Inscription">
    </form>
    </div>





</section>
