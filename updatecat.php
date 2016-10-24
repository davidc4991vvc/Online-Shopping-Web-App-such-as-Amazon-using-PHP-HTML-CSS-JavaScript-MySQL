<?php
require "connexion.php";

$idcat = intval($_POST['id_select_updcat']);
$newtitle = $_POST['titrecat'];
$newdescrip = $_POST['desciption'];


$con = mysqli_connect($host, $user, $passwd, $db);
if(!$con)
{ die('Erreur de connexion : ' . mysqli_error($con)); }

mysqli_select_db($con, $db);

$query = "UPDATE Categorie SET DateMaj = CURRENT_TIMESTAMP(), Description = '$newdescrip', TitreCat ='$newtitle' WHERE IdCat = '$idcat' ";

if(mysqli_query($con, $query) == true)
{
	echo" <div class = \"oferta_title\">la categorie dont le ID etait $idcat a ete mise a jour avec success. Le nouveau titre est :  \" $newtitle \"</div>";
}
else
{
	echo"<h2>Erreur lors de la requette de suppression<h2>";

}
mysqli_close($con);

?>
