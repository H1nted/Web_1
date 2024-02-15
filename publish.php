<?php 
include_once('header.php'); 
if(isset($_SESSION["NOM"])){ 
?>
<h1 style="text-align:center;margin-top:30px;">~ Creez votre propre voyage ~</h1>
<div class="publishing__form">
    <form action="includes/pub.inc.php" method="post">
    
    <div class="villesP1">
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

    <div class="villesP2">
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

    <div class="voyageursP">
        <label for="ppl">Nombre de personnes :                     </label>
            <select name="ppl" class="ppl" required>
                <option value="">--Choisir le nombre de voyageurs--</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
    </div>

    <div class="dateP">
        <label for="date">Date du voyage :                     </label>
            <input type="date" name="date" required>
    </div>
    <br/>
    <input type="submit" name="Publier" id="rechercheBTN" value="Publier">
    </form>
</div>
<?php 
    if (isset($_GET["error"])){
        if ($_GET["error"] == "same"){
            echo('<div class="loginErr">La ville de départ et la ville d\'arrivée sont identiques !</div>');
        }
    }

    if (isset($_GET["error"])){
        if ($_GET["error"] == "overlap"){
            echo('<div class="loginErr">Vous avez déjà proposé un covoiturage à cette date !</div>');
        }
    }

    if (isset($_GET["info"])){
        if ($_GET["info"] == "success"){
            echo('<div class="CovErr">Voyage crée avec succés ! Visitez votre profil pour le visualiser</div>');
        }
    }

































}
else {
    header("location:acceuil.php");
}




