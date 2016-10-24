<?php
require "connexion.php";

$con = mysqli_connect($host, $user, $passwd, $db);
if(!$con)
{ die('Erreur de connexion : ' . mysqli_error($con)); }

mysqli_select_db($con, $db);

$query = "SELECT * FROM Categorie ORDER BY TitreCat";
$tuples = mysqli_query($con, $query);


if ( ($row = mysqli_fetch_array($tuples)) == true )
	{
	do
	{
	  printf("<li class=\"odd\"><a href =\"javascript:categorizer(%s);\">%s</a></li>\n", $row['IdCat'],$row['TitreCat']);
	  $row = mysqli_fetch_array($tuples);
	  printf("<li class=\"even\"> <a href =\"javascript:categorizer(%s);\">%s</a></li>\n", $row['IdCat'],$row['TitreCat']);
	  $row = mysqli_fetch_array($tuples);
	}
	while($row);
	}
else { echo "Eror requette categorie"; }
 mysqli_close($con);
?>
