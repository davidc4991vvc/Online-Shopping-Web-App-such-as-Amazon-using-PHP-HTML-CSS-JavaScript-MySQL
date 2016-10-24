<?php
require "connexion.php";

$productname = $_POST['nomproduit'];
$productcatid = intval($_POST['id_selc_cat']);
$productprice = intval($_POST['prixproduit']);
$active_state = intval($_POST['etatpro']);
$productdesc = $_POST['desciption'];

$con = mysqli_connect($host, $user, $passwd, $db);
if(!$con)
{ die('Erreur de connexion : ' . mysqli_error($con)); }

mysqli_select_db($con, $db);

$query = "INSERT INTO Item (Actif,DateCreation,DateMaj,Description,IdCat,Nom,Prix) VALUES ($active_state,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP(),'$productdesc','$productcatid', '$productname','$productprice')";

if(mysqli_query($con, $query) == true)
{
	echo" <div class = \"oferta_title\">
 		le nouveau produit a ete inserer avec succes
		<p>Nom du produit : $productname</p>
		<p>Prix du produit : $productprice </p>
		<p>Description du produit : $productdesc </p>
		<p>Statut de visibiliter du produit : $active_state</p>


             </div>";
}
else
{
	echo"<h2>Erreur lors de la requette de creation de produit<h2>";

}
mysqli_close($con);

?>
