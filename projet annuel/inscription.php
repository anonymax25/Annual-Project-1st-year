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
				Mot de Passe: <input type="password" name="password" placeholder="Votre mdp"><br>
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
				Mot de Passe: <input type="password" name="password" placeholder="Entre 5 et 20 caractères"><br>
				e-mail: <input type="text" name="email" placeholder="addresse@nomDuSite.com"><br>
				Date de Naissance: <input type="date" name="birthDate"><br>

				Pays:
				<select name="country">
					<option value="france">France</option>
					<option value="allemange">Allemagne</option>
					<option value="United K">United K</option>
					<option value="espagne">Espagne</option>
				</select>
				<br>

				<br>Genre:<br>
				<input type="radio" name="gender" value="1">Homme<br>
				<input type="radio" name="gender" value="2">Femme<br>
				<input type="radio" name="gender" value="3">Autre<br>
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
