<?php
require "connexion.php";

$choix = $_GET['choice'];

$con = mysqli_connect($host, $user, $passwd, $db);
if(!$con)
{ die('Erreur de connexion : ' . mysqli_error($con)); }

mysqli_select_db($con, $db);

// AJOUTER UNE CATEGORIE
if ($choix == 'addcat')

{
    echo "<form id=\"formulairecat\" name=\"formulairecat\" method=\"post\" action= \"addcat.php\" onSubmit=\"addcat(this)\">
      <p>
        <label>
	 Entrez le titre de la categorie : 
          <input type=\"text\" name=\"titrecat\" id=\"titrecat\" />
        </label>
        </p>
      <p>
        <label>
	Entrez une Description : 
          <textarea type=\"text\" name=\"desciption\" rows=\"5\" cols=\"40\"id=\"desciption\"> </textarea>
        </label>
      </p>
      <p>
        <input type=\"submit\" name=\"addcat_button\" id=\"addcat_button\" value=\"Envoyer\" />
      </p>
    </form>";

}

//SUPPRESSION CATEGORIE
elseif ($choix == 'delcat')
{

$query = "SELECT * FROM Categorie ORDER BY IdCat ASC";
$tuples = mysqli_query($con, $query);
$row = mysqli_fetch_array($tuples);

 echo " <h2> Selectionner dans la liste deroulante la categorie a supprimer:  </h2>";
 echo " <p> <form name = \"formulairecat\" id = \"formulairecat\" method=\"post\" action= \"deletecat.php\" onSubmit=\"deletecat(this)\">  </p>";
 
echo "	<select id = \"id_select_delcat\" name=\"id_select_delcat\">";

while ($row)
   {	
    printf("<option value=\"%s\">%s</option>\n", $row["IdCat"],$row["TitreCat"]);
    $row = mysqli_fetch_array($tuples); 
   }
    
echo "</select><input type=\"submit\" name=\"deletecat_button\" id=\"deletecat_button\" value=\"supprimer\"></form>";
}

//MISE A JOUR CATEGORIE
elseif ($choix == 'updatecat')
{
$query = "SELECT * FROM Categorie ORDER BY IdCat ASC";
$tuples = mysqli_query($con, $query);
$row = mysqli_fetch_array($tuples);
 echo " <h2> Selectionner dans la liste deroulante la categorie a mettre a jour :  </h2>";
 echo " <p> <form name = \"formulairecat\" id = \"formulairecat\" method=\"post\"action= \"updatecat.php\" onSubmit=\"deletecat(this)\">  </p>";
 echo "	<select id = \"id_select_updcat\" name=\"id_select_updcat\">";
 
while ($row)
   {	
    printf("<option value=\"%s\">%s</option>", $row["IdCat"],$row["TitreCat"]);
    $row = mysqli_fetch_array($tuples); 
   }
    
echo "</select>

<p>
        <label>
	 Entrez le nouveau titre de la categorie : 
          <input type=\"text\" name=\"titrecat\" id=\"titrecat\" />
        </label>
        </p>
      <p>
        <label>
	Entrez la nouvelle Description : 
          <textarea type=\"text\" name=\"desciption\" rows=\"5\" cols=\"40\"id=\"desciption\"> </textarea>
        </label>
      </p>

<input type=\"submit\" name=\"updcat_button\" id=\"updcat_button\" value=\"update\"></form>";

}
//AJOUT DE PRODUIT
elseif ($choix == 'addpro')
{
$query = "SELECT * FROM Categorie ORDER BY IdCat ASC";
$tuples = mysqli_query($con, $query);
$row = mysqli_fetch_array($tuples);

    echo "<form id=\"formulairepro\" name=\"formulairepro\" method=\"post\" action= \"addproduct.php\" onSubmit=\"addproduct(this)\">
      <p>
        <label>
	 Entrez le nom du produit : 

          <input type=\"text\" name=\"nomproduit\" id=\"nomproduit\" />
        </label>
      </p>
      <p>
        <label>
	 Entrez le prix du produit : 
          <input type=\"text\" name=\"prixproduit\" id=\"prixproduit\" />
        </label>
      </p>";

 echo "<p> Selectionner la categorie du produit : <select id = \"id_selc_cat\" name=\"id_selc_cat\">";
 
while ($row)
   {	
    printf("<option value=\"%s\">%s</option>\n", $row["IdCat"],$row["TitreCat"]);
    $row = mysqli_fetch_array($tuples); 
   }
   

echo "</select> </p>";

echo "<p> Saisir '0' pour rendre le produit invisible et '1' pour le rendre visible a l'utilisateur:
       <input type=\"text\" name=\"etatpro\" id=\"etatpro\" />
     </p>";

echo "<p>
        <label>
	Entrez la description du produit :  
          <textarea type=\"text\" name=\"desciption\" rows=\"5\" cols=\"40\"id=\"desciption\"> </textarea>
        </label>
      </p>

      <p>
        <input type=\"submit\" name=\"addpro_button\" id=\"addpro_button\" value=\"Ajouter\" />
      </p>

    </form>";

}
//SUPRESSION PRODUIT
elseif ($choix == 'delpro')
{

$query = "SELECT * FROM Item ORDER BY Nom ASC";
$tuples = mysqli_query($con, $query);
$row = mysqli_fetch_array($tuples);

 echo " <h2> Selectionner dans la liste deroulante le produit a supprimer:  </h2>";
 echo " <p> <form name = \"formulairepro\" id = \"formulairepro\" method=\"post\" action= \"deleteproduct.php\" onSubmit=\"deleteproduct(this)\">  </p>";
 echo "	<select id = \"id_selc_pro\" name=\"id_selc_pro\">";
 
while ($row)
   {	
    printf("<option value=\"%s\">%s</option>", $row["IdItem"],$row["Nom"]);
    $row = mysqli_fetch_array($tuples); 
   }
    
echo "</select><input type=\"submit\" name=\"deletepro_button\" id=\"deletepro_button\" value=\"supprimer\"></form>";
}

//MISE A JOUR PRODUIT
elseif ($choix == 'updatepro')
{

$query = "SELECT * FROM Categorie ORDER BY IdCat ASC";
$tuples = mysqli_query($con, $query);
$catrow = mysqli_fetch_array($tuples);

$proquery = "SELECT * FROM Item ORDER BY Nom ASC";
$protuples = mysqli_query($con, $proquery);
$prorow = mysqli_fetch_array($protuples);

echo "<form id=\"formulairepro\" name=\"formulairepro\" method=\"post\" action= \"updateproduct.php\" onSubmit=\"updateproduct(this)\">
      <p>
        <label>
        <h2> Selectionner dans la liste deroulante le produit a mettre a jour:  </h2>";

echo "<select id = \"id_selc_pro\" name=\"id_selc_pro\">";
 
while ($prorow)
   {	
    printf("<option value=\"%s\">%s</option>", $prorow["IdItem"],$prorow["Nom"]);
    $prorow = mysqli_fetch_array($protuples); 
   }   
echo"</select> </label>
      </p>";

echo"   <p>
        <label>
	 Entrez le nouveau nom du produit : 
          <input type=\"text\" name=\"nomproduit\" id=\"nomproduit\" />
        </label>
      </p>";

echo"   <p>
        <label>
	 Entrez le nouveau prix du produit : 
          <input type=\"text\" name=\"prixproduit\" id=\"prixproduit\" />
        </label>
      </p>";

echo "<p> Selectionner la categorie du produit : <select id = \"id_selc_cat\" name=\"id_selc_cat\">";
 
while ($catrow)
   {	
    printf("<option value=\"%s\">%s</option>", $catrow["IdCat"],$catrow["TitreCat"]);
    $catrow = mysqli_fetch_array($tuples); 
   }
    
echo "</select> </p>";

echo "<p> Modifier la visibilite '0' pour rendre le produit invisible et '1' pour le rendre visible a l'utilisateur:
       <input type=\"text\" name=\"etatpro\" id=\"etatpro\" />
     </p>";

echo "<p>
        <label>
	Entrez la nouvelle description du produit :  
          <textarea type=\"text\" name=\"desciption\" rows=\"5\" cols=\"40\"id=\"desciption\"> </textarea>
        </label>
      </p>";



echo  "    <p>
        <input type=\"submit\" name=\"updpro_button\" id=\"updpro_button\" value=\"Update\" />
      </p>

    </form>";
}

 mysqli_close($con);
?>
