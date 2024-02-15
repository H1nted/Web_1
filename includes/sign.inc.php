<?php

    require_once('dbh.inc.php');
    if(isset($_POST["Inscription"])){


        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $phone = $_POST["phone"];       
        $mail = $_POST["mail"];
        $mdp = $_POST["mdp"];
        $confirmation = $_POST["confirmation"];

        $requete = "SELECT * FROM internautes WHERE email = '$mail';";

        $WeIN = $pdo->prepare($requete);
        $WeIN->execute();
        $tableBase = $WeIN->fetchAll();

        if(!preg_match("/^[a-zA-Z]*$/",$nom) || !preg_match("/^[a-zA-Z]*$/",$prenom)){
            header("location: ../inscription.php?error=invalid");
            exit();
        }
        if(!preg_match("/^[0-9]*$/",$phone)){
            header("location: ../inscription.php?error=phone");
            exit();
        }

        if ($mdp != $confirmation) {
            header("location: ../inscription.php?error=mismatch");
            exit();
        }
        if(count($tableBase) > 0){
            header("location: ../inscription.php?error=exists");
            exit();
        }
        else {
            $requeteinsc ="INSERT INTO internautes (email, mdp, nom, prenom, phone) VALUES
            ('$mail','$mdp','$nom','$prenom','$phone');";
            $statement = $pdo->prepare($requeteinsc);
            $statement->execute();
            header("location: ../inscription.php?info=created");
            exit();

        }
    }
    else{
        header("location: ../inscription.php ");
    }