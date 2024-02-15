<?php

    require_once('dbh.inc.php');

    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];  

    $requete = "SELECT * FROM internautes WHERE email = '$mail' AND mdp ='$mdp';";
    $WeIN = $pdo->prepare($requete);
    $WeIN->execute();
    $tableBase = $WeIN->fetchAll();

if(isset($_POST["Connexion"])) {
    if (empty($mail) || empty($mdp)){
        header("location: ../login.php?error=empty");
        exit();
    }
    else {
        if (count($tableBase) > 0){
            foreach ($tableBase as $element) {
                session_start();
                $_SESSION["NOM"] = $element['nom'];
                $_SESSION["PRENOM"] = $element['prenom'];
                $_SESSION["email"] = $mail;
                $_SESSION["phone"] = $element["phone"];
                header("location: ../PageBV.php");
                exit();
            }
        }
            else {
                header("location: ../login.php?error=na");
                exit();
            }
        }
    }
else {
    header("location: ../login.php ");
}
