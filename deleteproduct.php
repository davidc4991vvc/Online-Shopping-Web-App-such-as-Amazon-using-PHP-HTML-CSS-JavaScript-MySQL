<?php
require "connexion.php";

$IdTodel = intval($_POST['id_selc_pro']);


$con = mysqli_connect($host, $user, $passwd, $db);
if(!$con)
{ die('Erreur de connexion : ' . mysqli_error($con)); }

mysqli_select_db($con, $db);

$query = "DELETE FROM Item WHERE IdItem = '$IdTodel' ";

if(mysqli_query($con, $query) == true)
{
	echo" <div class = \"oferta_title\"> <p>le produit dont le ID etait \" $IdTodel \" a ete supprimer avec succes </p></div>";
}
else
{
	echo"<h2>Erreur lors de la requette de suppression<h2>";

}
mysqli_close($con);

?>
