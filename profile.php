<?php 
include_once('header.php'); 
include_once('includes/dbh.inc.php');

$requeteProp ="SELECT t.Vdep, t.Varv, c.datecovo, c.nbPlaces, t.price
            FROM trajets t, covoiturages c 
                WHERE c.idTrajet = t.idTrajet 
                AND c.email ='".$_SESSION["email"]."';";
$statementProp = $pdo->prepare($requeteProp);
$statementProp->execute();
$tableProp = $statementProp->fetchAll();

$requeteRes = "SELECT t.Vdep, t.Varv, t.price, c.datecovo, i.nom, i.prenom, i.email, i.phone
                FROM trajets t, transports p, covoiturages c, internautes i
                    WHERE t.idTrajet = c.idTrajet
                    AND c.email = i.email 
                    AND c.idCovo = p.idCovo
                    AND p.email ='".$_SESSION["email"]."';";
$statementRes = $pdo->prepare($requeteRes);
$statementRes->execute();
$tableRes = $statementRes->fetchAll();

if(isset($_SESSION["NOM"])){?>
<div style="margin-top:70px;">
<table class="Infos__table">
    <tr>           <th>Informations Utilisateur</th>        </tr>
    <tr>         <td style="border-bottom:none;"> Nom : <?php echo($_SESSION["NOM"]);?></td>        </tr>
    <tr>         <td style="border-top:none;border-bottom:none;"> Prénom : <?php echo($_SESSION["PRENOM"]);?></td>        </tr>
    <tr>         <td style="border-top:none;border-bottom:none;"> Email : <?php echo($_SESSION["email"]);?></td>        </tr>
    <tr>         <td style="border-top:none;"> Téléphone : +33 <?php echo($_SESSION["phone"]);?></td>        </tr>
</table>

<table class="panier1">
    <tr><th>Covoiturages Proposés</th></tr>
    <tr> <td>
        <?php
        if (count($tableProp) > 0){
            foreach ($tableProp as $prop){
                echo('--De '.$prop['Vdep'].' à '.$prop['Varv'].'<br/>
                        Date : '.$prop['datecovo'].'<br/>
                        '.$prop['nbPlaces'].' places à '.$prop['price'].' €/place <br/><br/>');
            }
        }
        ?>
    </td></tr>
</table>
<table class="panier2">
    <tr><th>Covoiturages Reservés</th></tr>
    <tr> <td>
        <?php
        if (count($tableRes) > 0){
            foreach ($tableRes as $res){
                echo('--De '.$res['Vdep'].' à '.$res['Varv'].'<br/>
                        Date : '.$res['datecovo'].'<br/>
                        Prix : '.$res['price'].' € <br/>
                        Proposé par : '.$res['nom'].' '.$res['prenom'].' <br/>
                        Tel : +33 '.$res['phone'].'<br/>
                        Mail : '.$res['email'].'<br/><br/>');
            }
        }
        else {}
        ?>
    </td></tr>
</table>
</div>
<?php 
}
else {
    header("location:acceuil.php");
}
?>

