<?php
require "connexion.php";

$Idtitre = intval($_POST['id_select_delcat']);


$con = mysqli_connect($host, $user, $passwd, $db);
if(!$con)
{ die('Erreur de connexion : ' . mysqli_error($con)); }

mysqli_select_db($con, $db);

$query = "DELETE FROM Categorie WHERE IdCat = '$Idtitre' ";

if(mysqli_query($con, $query) == true)
{
	echo" <div class = \"oferta_title\">la categorie dont le ID etait \" $Idtitre \" a ete supprimer avec succes </div>";
}
else
{
	echo"<h2>Erreur lors de la requette de suppression<h2>";

}
mysqli_close($con);

?>
