<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MonProjetWeb</title>
    <link rel="stylesheet" href="CSS/styleH.css">
</head>


<header>
    <div class="logo_container">
    <a href="acceuil.php"><h1>A<span>W</span></h1></a>
    </div>
    <nav>
        <ul class="nav__links">
            <?php 
            if (isset($_SESSION["NOM"])){
                echo('<li><a href="trajets.php">Trajets</a></li>');
                echo ('<li><a href="covoiturages.php">Covoiturages</a></li>');
                echo ('<li><a href="publish.php">Publier</a></li>');
                echo('<li><a href="includes/logout.inc.php">Deconnexion</a></li>');
            }
            else {
                echo('<li><a href="acceuil.php">Accueil</a></li>');
                echo('<li><a href="trajets.php">Trajets</a></li>');
                echo ('<li><a href="about.php">Credits</a></li>');
                echo('<li><a href="inscription.php">Inscription</a></li>');
            }
            ?>
        </ul>
    </nav>
    <?php
    if (isset($_SESSION["NOM"])){
        echo('<a class="boutonNAV" href="profile.php"><button>'.$_SESSION["PRENOM"].'</button></a>');
    }
    else{
        echo('<a class="boutonNAV" href="login.php"><button>Connexion</button></a>');
    }
    ?>
</header>
