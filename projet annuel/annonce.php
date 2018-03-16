<?php session_start(); $_SESSION["page"]="Création d'annonce";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Création d'annonce</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<?php
	include "header.php";
	?>

	<section>
		<div>
			<h2>Ajoutez Une annonce, pour ensuite mettre les differents produits.</h2>
			<form action="verificationAnnonce.php" method="post">
				Titre: <input type="text" name="titre" placeholder="Entre 3 et 80 caractères"><br>
				Description: <input type="text" name="description" placeholder="Mettez une description"><br>
        Type: <select name="type">
					<option value="1">Type 1</option>
          <option value="2">Type 2</option>
        </select><br>
        <br>
        <input type="submit" name="valider" value="Valider"><?php
        if(isset($_GET["errorVe"])){
          echo ("  Erreur: ".$_GET["errorVe"]."");
        }
        ?>

			</form>
		</div>
	</section>
	<br>
	<?php
	include "footer.php";
	?>
</body>
</html>
