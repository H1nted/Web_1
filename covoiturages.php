<?php
include_once('header.php');
if(isset($_SESSION["NOM"])){ 
?>
<h1 style="text-align:center;margin-top:30px;">~ Cherchez votre prochain voyage ~</h1>
<div class="booking__form">
    <form action="includes/cov.inc.php" method="post">
    
    <div class="villes1">
        <label for="Vdep">Ville de départ :                     </label>
            <select name="Vdep" class="VilleDeDepart" required>
            <option value="">--Choisir votre ville de départ--</option>
            <option value="Montpellier">Montpellier</option>
            <option value="Nimes">Nimes</option>
            <option value="Bordeaux">Bordeaux</option>
            <option value="Lyon">Lyon</option>
            <option value="Marseille">Marseille</option>
            <option value="Toulouse">Toulouse</option>
            <option value="Nice">Nice</option>
            <option value="Paris">Paris</option>
            <option value="Lille">Lille</option>
            <option value="Brest">Brest</option>
            <option value="Strasbourg">Strasbourg</option>
        </select>
    </div>

    <div class="villes2">
        <label for="Varv">Ville d'arrivée :                     </label>
            <select name="Varv" class="VilleArrive" required>
                <option value="">--Choisir votre ville d'arrivée--</option>
                <option value="Montpellier">Montpellier</option>
                <option value="Nimes">Nimes</option>
                <option value="Bordeaux">Bordeaux</option>
                <option value="Lyon">Lyon</option>
                <option value="Marseille">Marseille</option>
                <option value="Toulouse">Toulouse</option>
                <option value="Nice">Nice</option>
                <option value="Paris">Paris</option>
                <option value="Lille">Lille</option>
                <option value="Brest">Brest</option>
                <option value="Strasbourg">Strasbourg</option>
            </select>
    </div>

    <div class="voyageurs">
        <label for="ppl">Nombre de personnes :                     </label>
            <select name="ppl" class="ppl" required>
                <option value="">--Choisir le nombre de voyageurs--</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
    </div>

    <div class="date">
        <label for="date">Date du voyage :                     </label>
            <input type="date" name="date" required>
    </div>
    <br/>
    <input type="submit" name="Rechercher" id="rechercheBTN" value="Rechercher">
    </form>
</div>

<?php 
    if (isset($_GET["error"])){
        if ($_GET["error"] == "same"){
            echo('<div class="loginErr">La ville de départ et la ville d\'arrivée sont identiques !</div>');
        }
    }
    
    if (isset($_GET["info"])){
        if ($_GET["info"] == "found"){
            echo'<form action="includes/cov.inc.php" method="post">';
            echo'<div class="covliste">';            
            echo('<label for="Covoiturages">Les Covoiturages disponibles :</label>');
            echo('<select name="search" class="covo">');
            foreach ($_SESSION["sessionTable"] as $element){
                echo('<option value="'.$element['idCovo'].'"> De '.$element['Vdep'].' à '.$element['Varv'].' || date : '.$element['datecovo'].' || Nombre de place : '.$element['nbPlaces'].' || prix : '.$element['price'].' Euros || Proposé par : '.$element['prenom'].'</option>');
                }
            echo('<input type="submit" name="Selectionner" id="rechercheBTN" value="Selectionner">');
            echo"</select>";
            echo"</div>";
            echo"</form>";
            }}

    if (isset($_GET["info"])){
        if ($_GET["info"] == "Notfound"){
            echo('<h2 style="text-align:center;margin-top:30px;"> Malheureusement aucun covoiturages n\'est proposé pour l\'instant<br/><br/>Creez votre propre covoiturage !!</h2>');
            echo('<a href="publish.php" id="rechercheBTN">Publier</a>');
        }
    }


    if (isset($_GET["info"])){
        if ($_GET["info"] == "Success"){
            echo('<div class="CovErr">Voyage ajouté à votre profil</div>');
        }
    }


















}
else {
    header("location:acceuil.php");
}