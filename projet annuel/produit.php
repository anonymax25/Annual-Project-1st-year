<?php session_start(); $_SESSION["page"]="Ajout de produits";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajout de produits</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<?php
	include "header.php";
	?>

	<section>
		<div>
			<h2>Ajoutez des produits à votre Annonce.</h2>
			<form action="verificationProduit.php" method="post">
				Nom: <input type="text" name="nom" placeholder="Entre 3 et 20 caractères"><br>
				Description: <input type="text" name="description" placeholder="Mettez une description"><br>
        Prix: <input type="text" name="prix" placeholder="Prix de ce produit"><br>
        Photo: <input type="text" name="photo" placeholder="Lien vers image(temporaire)"><br>
        <br>
        <br>
        <input type="submit" name="valider" value="Valider"><?php
        if(isset($_GET["errorVe"])){
          echo ("  Erreur: ".$_GET["errorVe"]."");
        }
        ?>

			</form>
		</div>
	</section>


  <ul>
    <?php

    include("config.php");
    if(isset($_SESSION["idProduit"])){

      $query1 = $bdd->prepare('SELECT titre,description FROM annonce WHERE idAnnonce='.$_SESSION["idAnnonce"].'');
      $query1->execute();
      $query2 = $bdd->prepare('SELECT nom,description,prix,vote FROM produit WHERE idAnnonce='.$_SESSION["idAnnonce"].'');
      $query2->execute();
      while($annonce = $query1->fetch()){?>
        <li><?= $annonce["titre"]?>:   <?= $annonce["description"]?></li>
          <?php while($produit = $query2->fetch()){?>
            <br>  -<?= $produit["nom"]?>: <?= $produit["description"]?> Prix: <?=$produit["prix"]?> Nombre de votes: <?=$produit["vote"]?>
         <?php }
      }
       $query1->closeCursor();
       $query2->closeCursor();
    }
	 	?>
  </ul>


	<br>
	<?php
	include "footer.php";
	?>
</body>
</html>
