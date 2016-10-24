<?php
require "connexion.php";

$choix_ordre = $_GET['type'];
$choix_ascd = $_GET['ascd'];
$etat_cat = intval($_GET['cat']);

$con = mysqli_connect($host, $user, $passwd, $db);
if(!$con)
{ die('Erreur de connexion : ' . mysqli_error($con)); }

mysqli_select_db($con, $db);
if ($etat_cat == 0)
{$query = "SELECT * FROM Item ORDER BY $choix_ordre $choix_ascd";}
else
{$query = "SELECT * FROM Item WHERE IdCat = $etat_cat ORDER BY $choix_ordre $choix_ascd";}
$tuples = mysqli_query($con, $query);

echo "<strong><center><h2>Liste des produits disponbles</h2></center></strong><br/>";

if ( ($row = mysqli_fetch_array($tuples)) == true )
	{
	echo "<div class=\"center_content\">\n"; 
	do
	{ echo "<div class=\"prod_box\">\n" ;
	  echo "<div class=\"center_prod_box\">\n";
	  printf("<div class=\"product_title\"><a href=\"javascript:getdetails(%s)\">%s</a></div>\n", $row["IdItem"],$row["Nom"]);
	  printf("<div class=\"product_img\"><a href=\"javascript:getdetails(%s)\"> <img src=\"images/%s\" width=\"310px\" height = \"325px\" style = \"box-shadow:0 0 3px 3px grey;\"alt=\"\" border=\"0\" /></a></div>\n", $row["IdItem"],$row["Image"]);
	  printf("<div class=\"prod_price\"><span class=\"price\">$%s </span></div>\n", $row["Prix"]);
	  echo "</div>\n" ;	  
	  echo "<div class=\"prod_details_tab\">\n";
 	  printf("<a class=\"prod_details\" href=\"javascript:getdetails(%s)\">Detail</a></div>\n", $row["IdItem"]);
	  echo "</div>\n" ;
	  $row = mysqli_fetch_array($tuples);
	}
	while($row);
	echo ("</div>");
	}
else { echo "Desole, nous avons aucun produit en stock actuellement!"; }
 mysqli_close($con);
?>
