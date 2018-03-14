<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<!--<link rel="stylesheet" type="text/css" href="css/inscription.css">-->
</head>
<body>
	<?php
	include "header.php";
	?>

	<section id="section 1">
		<h2>Connectez vous</h2>
		<div id="div1">
			<form action="connection.php" method="post">
				email: <input type="text" name="email" placeholder="Votre email"><br>
				Mot de Passe: <input type="password" name="motDePasse" placeholder="Votre mdp"><br>
				<br>
				<input type="submit" value="Valider"><?php
				if(isset($_GET["errorCo"])){
					echo ("   Erreur: ".$_GET["errorCo"]."");
				}
				?>
			</form>
		</div>
		<br>
		<div id="div2">
			<h2>Ou inscrivez vous</h2>
			<form action="verificationinscription.php" method="post">
				Pseudo: <input type="text" name="pseudo" placeholder="Entre 3 et 20 caractères"><br>
				Nom: <input type="text" name="nom" placeholder="Mettez votre nom"><br>
				Prénom: <input type="text" name="prenom" placeholder="Mettez votre prénom"><br>
				e-mail: <input type="text" name="email" placeholder="addresse@nomDuSite.com"><br>
				Mot de Passe: <input type="password" name="motDePasse" placeholder="Entre 5 et 20 caractères"><br>
				Date de Naissance: <input type="date" name="dateNaissance"><br>
				Telephone: <input type="text" name="telephone"><br>
				Pays:
				<select name="pays">
					<option value="france">France</option>
					<option value="allemange">Allemagne</option>
					<option value="United K">United K</option>
					<option value="espagne">Espagne</option>
				</select>
				<br>
				Adresse: <input type="text" name="address"><br>
	   		Description profil: <input type="text" name="description"><br>
				Acceptez vous de recevoir la Newsletter?<br>
				Oui: <input type="radio" name="newsletter" value="true"><br>
				Non: <input type="radio" name="newsletter" value="false"><br>
				Voulez vous etre vendeur?:
				Oui: <input type="radio" name="vendeur" value="true"><br>
				Non: <input type="radio" name="vendeur" value="false"><br>


				<br>Genre:<br>
				<input type="radio" name="sexe" checked="checked" value="1">Homme<br>
				<input type="radio" name="sexe" value="2">Femme<br>
				<input type="radio" name="sexe" value="3">Autre<br>
				<br>
				<input type="submit" value="Valider"><?php
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
