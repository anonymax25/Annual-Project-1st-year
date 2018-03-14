<?php session_start(); $_SESSION["page"]="Connexion";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Connexion</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<?php
	include "header.php";
	?>

	<section>
		<h2>Connectez vous</h2>
		<div>
			<form action="verificationConnexion.php" method="post">
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
		<form action="index.php" method="post">
			<input type="submit" name="adminBack" value="Retour à la page d'accueil">
		</form>
	</section>
	<br>
	<?php
	include "footer.php";
	?>
</body>
</html>
