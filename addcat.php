<?php
require "connexion.php";

$titre = $_POST['titrecat'];
$descript = $_POST['desciption'];

$con = mysqli_connect($host, $user, $passwd, $db);
if(!$con)
{ die('Erreur de connexion : ' . mysqli_error($con)); }

mysqli_select_db($con, $db);

$query = "INSERT INTO Categorie (DateCreation,DateMaj,Description,TitreCat) VALUES (CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP(),'$descript','$titre')";

if(mysqli_query($con, $query) == true)
{
	echo" <div class = \"oferta_title\">la categorie $titre a ete ajouter avec succes </div>";
}
else
{
	echo"<h2>Erreur lors de la requette d'insertion<h2>";

}
mysqli_close($con);

?>
