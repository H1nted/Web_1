<?php

    $dsn ="mysql:host=localhost;dbname=covoiturage;charset=UTF8";
    $DonneeUser ="root";
    $DonneePW ="";
    $pdo = new PDO($dsn, $DonneeUser, $DonneePW) or die("Pb de connexion !");
