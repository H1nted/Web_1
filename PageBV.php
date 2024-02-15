<?php 
include_once('header.php');

if(isset($_SESSION["NOM"])){
    echo '<h1 style="text-align:center;margin-top:180px;word-spacing: 5px;">Connexion réussie !</h1>';
    echo '<h1 style="text-align:center;margin-top:60px;word-spacing: 5px;">Bonjour  '.$_SESSION["PRENOM"].' '.$_SESSION["NOM"].'</h1>';
}   
else {
    header("location:acceuil.php?error=userERR");
}