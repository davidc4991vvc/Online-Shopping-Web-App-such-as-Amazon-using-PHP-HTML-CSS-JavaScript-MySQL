<?php
require "connexion.php";

$apprlevel = intval($_POST['apprlevel']);
$Iditem = intval($_POST['iditem']);
$comment= $_POST['commentairebox'];

$con = mysqli_connect($host, $user, $passwd, $db);
if(!$con)
{ die('Erreur de connexion : ' . mysqli_error($con)); }

mysqli_select_db($con, $db);

$query = "INSERT INTO Appreciation (Commentaire,IdItem,Score) VALUES ('$comment','$Iditem','$apprlevel')";

if(mysqli_query($con, $query) == true)
{
	echo" <div class = \"oferta_title\">
 		<p> Nous avons bien recu vos appreciations et commentaires . Merci!!!!!</p>
             </div>";
}
else
{
	echo"<h2>Erreur lors de l'envoie des appreciations<h2>";

}

$query2 = "UPDATE Item SET ScoreMoyen = (SELECT AVG(Score) FROM Appreciation WHERE IdItem = '$Iditem') WHERE IdItem = '$Iditem'";


mysqli_query($con, $query2);
mysqli_close($con);

?>
