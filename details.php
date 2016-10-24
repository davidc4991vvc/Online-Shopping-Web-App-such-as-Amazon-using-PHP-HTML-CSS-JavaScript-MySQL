<?php
require "connexion.php";

$produit = intval($_GET['product']);

$con = mysqli_connect($host, $user, $passwd, $db);
if(!$con)
{ die('Erreur de connexion : ' . mysqli_error($con)); }

$query = "SELECT * FROM Item WHERE IdItem = $produit";
$query2 = "SELECT TitreCat FROM Categorie WHERE IdCat IN (SELECT IdCat FROM Item WHERE IdItem = $produit) ";
$tuples = mysqli_query($con, $query)  or die("MySQL error: " . mysqli_error($con) . "<hr>\nQuery: $query");

$tuples2 = mysqli_query($con,$query2) or die("MySQL error: " . mysqli_error($con) . "<hr>\nQuery: $query2");
if (($row = mysqli_fetch_array($tuples)) == true)
{
$row2 = mysqli_fetch_array($tuples2);

echo "<div class=\"center_content\">\n"; 
printf ("<div class=\"center_title_bar\">%s</div>\n", $row["Nom"]);
echo "<div class=\"prod_box_big\">\n"; 
echo "<div class=\"center_prod_box_big\">\n"; 
printf("<div class=\"product_img_big\"><a href=\"getdetails(%s)\"> <img src=\"images/%s\" width=\"310px\" height = \"325px\" style = \"box-shadow:0 0 3px 3px grey;\"alt=\"\" border=\"0\" /></a></div>\n", $row["IdItem"],$row["Image"]);

echo "<div class=\"details_big_box\">\n"; 
printf ("<div class=\"product_title_big\">%s</div>\n", $row["Nom"]);
printf("<div class=\"specifications\">");
printf("Categories: <span class=\"blue\">%s</span><br />", $row2["TitreCat"]);
printf("Date de publication: <span class=\"blue\">%s</span><br />", $row["DateCreation"]);
printf("Moyenne des scores: <span class=\"blue\"> %s</span><br />", $row["ScoreMoyen"]);
printf("Description: <span class=\"blue\">%s</span><br />", $row["Description"]);     
echo "</div>";
printf("<div class=\"prod_price_big\"><span class=\"price\">$%s </span></div>\n", $row["Prix"]);
echo "</div>"."</div>"; 
}
echo "<div class = \"appr_css\" id = \"appr_css\"><form id=\"Appr\" name=\"Appr\" method=\"post\" action= \"appreciation.php\" onSubmit=\"setappreciation(this)\">
      <input type = \"hidden\" name = \"iditem\" id = \"iditem\" value =\"$produit\">
      <p>
        <label>
        <div class = \"oferta_title\">Merci de nous laisser vos appreciations et commentaires sur ce produit </div>";

echo "
      <p>
        <label>
          <input type=\"radio\" name=\"apprlevel\" value=\"1\" id=\"apprlevel0\" />
          tres mauvais</label>
        <br />
        <label>
          <input type=\"radio\" name=\"apprlevel\" value=\"2\" id=\"apprlevel1\" />
          mauvais</label>
        <br />
        <label>
          <input type=\"radio\" name=\"apprlevel\" value=\"3\" id=\"apprlevel2\" />
          assez-bien</label>
        <br />
        <label>
          <input type=\"radio\" name=\"apprlevel\" value=\"4\" id=\"apprlevel3\" />
          bien</label>
        <br />
        <label>
          <input type=\"radio\" name=\"apprlevel\" value=\"5\" id=\"apprlevel4\" />
          tresBien</label>
        <br />
        <label>
          <input type=\"radio\" name=\"apprlevel\" value=\"6\" id=\"apprlevel5\" />
          Excellent</label>
        <br />
      </p>";
  

echo "<p>
        <label>
	<h2>Commentaire : </h3> 
          <textarea type=\"text\" name=\"commentairebox\" rows=\"5\" cols=\"40\"id=\"commentairebox\"> </textarea>
        </label>
      </p>";
echo  "    <p>
        <input type=\"submit\" name=\"Appr_button\" id=\"Appr_button\" value=\"Envoyer\" />
      </p>
    </form>";

echo "</div></div></div>"; 
mysqli_close($con);
?>
