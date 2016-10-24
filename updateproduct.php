<?php
require "connexion.php";

$idprod_toUpdate = intval($_POST['id_selc_pro']);
$newName = $_POST['nomproduit'];
$newPrice = intval($_POST['prixproduit']);
$newCat = intval($_POST['id_selc_cat']);
$newProd_Sate = $_POST['etatpro'];
$newDescrip = $_POST['desciption'];


$con = mysqli_connect($host, $user, $passwd, $db);
if(!$con)
{ die('Erreur de connexion : ' . mysqli_error($con)); }

mysqli_select_db($con, $db);

$query = "UPDATE Item SET DateMaj = CURRENT_TIMESTAMP(), Description = '$newDescrip ', IdCat ='$newCat', Nom ='$newName',Prix ='$newPrice' WHERE IdItem ='$idprod_toUpdate'";

if(mysqli_query($con, $query) == true)
{
	echo" <div class = \"oferta_title\">
		<p>Le produit dont le ID est : $idprod_toUpdate a bien ete mise a jour </p>
		<p>Nouveau nom du produit : $newName</p>
		<p>Nouveau prix du produit : $newPrice </p>
		<p>Nouvelle description du produit : $newDescrip </p>
		<p>Nouveau statut de visibiliter du produit : $newProd_Sate</p></div>";
}
else
{
	echo"<h2>Erreur lors de la requette de mise a jour du produit ID = $idprod_toUpdate <h2>";

}
mysqli_close($con);

?>
