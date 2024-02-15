<?php

    require_once('dbh.inc.php');

if(isset($_POST["Rechercher"])) {

    $requeteDelete = "DELETE FROM covoiturages
                        WHERE nbPlaces = 0;";
    $statementDelete = $pdo->prepare($requeteDelete);
    $statementDelete->execute();

    $villeDep = $_POST["Vdep"];
    $villeArv = $_POST["Varv"];
    $place = $_POST["ppl"];
    $date = $_POST["date"];
    session_start();
    $requeteP = "SELECT t.Vdep, t.Varv, c.datecovo, c.nbPlaces, i.prenom, t.price, t.idTrajet,c.idCovo
                    FROM covoiturages c, trajets t, internautes i
                        WHERE c.idTrajet = t.idTrajet
                        AND c.email = i.email
                        AND t.Vdep = '$villeDep'
                        AND t.Varv = '$villeArv'
                        AND c.datecovo = '$date'
                        AND c.nbPlaces > 0
                        AND c.nbPlaces >= '$place'
                        AND c.email <> '".$_SESSION["email"]."';";

    $statement = $pdo->prepare($requeteP);
    $statement->execute();
    $tableCov = $statement->fetchAll();

    if ($villeDep == $villeArv){
        header("location: ../covoiturages.php?error=same");
        exit();
    }
    else {
        if (count($tableCov)>0){
            $_SESSION["sessionTable"] =$tableCov;
            $_SESSION["places"]=$place;
            $_SESSION["idtrajet"] = $tableCov[0][6];
            header("location: ../covoiturages.php?info=found");
            exit();
        }
        else {
            header("location: ../covoiturages.php?info=Notfound");
            exit();
            }
        }
    }


    if(isset($_POST["Selectionner"])) {
        $idcovo = $_POST["search"];
        session_start();

        $update ="UPDATE covoiturages SET nbPlaces = (nbPlaces - ".$_SESSION["places"].") 
                    WHERE covoiturages.idCovo = '$idcovo';";
        $statementUpdate = $pdo->prepare($update);
        $statementUpdate->execute();
        $_SESSION["idcov"] = $idcovo;

        $add ="INSERT INTO transports (idCovo, email) 
                VALUES (".$_SESSION["idcov"].",'".$_SESSION["email"]."');";
        $statementADD = $pdo->prepare($add);
        $statementADD->execute();

        header("location: ../covoiturages.php?info=Success");
    }

else {
    header("location: ../covoiturages.php ");
}


