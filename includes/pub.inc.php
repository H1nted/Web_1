<?php

    require_once('dbh.inc.php');

if(isset($_POST["Publier"])) {
    session_start();
    $villeDep = $_POST["Vdep"];
    $villeArv = $_POST["Varv"];
    $place = $_POST["ppl"];
    $date = $_POST["date"];

    if ($villeDep == $villeArv){

        header("location: ../publish.php?error=same");
        exit();

    }
    else  {
        
        $requeteID = "SELECT idTrajet 
                        FROM trajets
                            WHERE trajets.Vdep = '$villeDep'
                            AND trajets.Varv = '$villeArv';";
        $statementID = $pdo->prepare($requeteID);
        $statementID->execute();
        $tableID = $statementID->fetchAll();
        $ID = $tableID[0][0];

        $requeteCHECK = "SELECT * 
                            FROM covoiturages
                                WHERE datecovo = '$date' 
                                AND email ='".$_SESSION["email"]."';";
        $statementCHECK = $pdo->prepare($requeteCHECK);
        $statementCHECK->execute();
        $tableCHECK = $statementCHECK->fetchAll();

        if (count($tableCHECK) > 0){

            header("location: ../publish.php?error=overlap");
            exit();

        }
        else{
            $requeteADD = "INSERT INTO covoiturages (idTrajet, email, datecovo, nbPlaces) 
                                VALUES ('$ID', '".$_SESSION["email"]."', '$date', '$place');";
            $statementADD = $pdo->prepare($requeteADD);
            $statementADD->execute();

            header("location: ../publish.php?info=success");
            exit();
        }
        }
    }

else {
        header("location: ../publish.php ");
    }