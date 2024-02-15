<?php
include_once('header.php'); 
include_once('includes/dbh.inc.php');

$request = "SELECT * FROM trajets;";
$state = $pdo->prepare($request);
$state->execute();
$tabletrajets = $state->fetchAll();
?>
<div style="text-align:center;font-size:large;">On vous propose les trajets suivants (plus de trajets en cliquant sur voyager !)</div>
<table class="trajets__table">
    <tr>    <th>Ville de départ</th>       <th>Ville d'arivéé</th>      <th>Prix recommandé</th>     </tr>
<?php
$i = 0;
foreach ($tabletrajets as $element) {
echo ("<tr>     <td>".$element['Vdep']."</td>   <td>".$element['Varv']."</td>     <td>".$element['price']." €</td>        </tr>");
$i++;
if($i ==10){
    break;
}
    }

?>

<?php
if (isset($_SESSION["NOM"])){
    echo('<tr>
                <td style="border: none;"></td>
                <td class ="megabutton"><a class="boutonCOV" href="covoiturages.php">Voyager !</a></td>
                <td style="border: none;"></td>
        </tr>');
    
}
else{
    echo('<tr>
                <td style="border: none;"></td>
                <td class ="megabutton"><a class="boutonCOV" href="login.php?error=NotConnected">Voyager !</a></td>
                <td style="border: none;"></td>
        </tr>');
}
?>