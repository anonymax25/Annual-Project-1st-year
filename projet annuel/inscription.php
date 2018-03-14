<?php session_start(); $_SESSION["page"]="Inscription";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<?php
	include "header.php";
	?>

	<section>
		<div>
			<h2>Inscrivez vous</h2>
			<form action="verificationInscription.php" method="post">
				Pseudo: <input type="text" name="pseudo" placeholder="Entre 3 et 20 caractères"><br>
				Nom: <input type="text" name="nom" placeholder="Mettez votre nom"><br>
				Prénom: <input type="text" name="prenom" placeholder="Mettez votre prénom"><br>
				e-mail: <input type="text" name="email" placeholder="addresse@nomDuSite.com"><br>
				Mot de Passe: <input type="password" name="motDePasse" placeholder="Entre 5 et 20 caractères"><br>
				Date de Naissance: <input type="date" name="dateNaissance"><br>
				Telephone: <input type="text" name="telephone" placeholder="Numero à 10 chiffres"><br>
				Pays:
				<select name="pays">

					<option value="Allemagne">Allemagne</option>
					<option value="Australie">Australie</option>
					<option value="Belgique">Belgique</option>
					<option value="Chine">Chine</option>
					<option value="Corée du Sud ">Corée du sud</option>
					<option value="Espagne">Espagne</option>
					<option value="France">France</option>
					<option value="Inde">Inde</option>
					<option value="Japon">Japon</option>
					<option value="Suisse">Suisse</option>
					<option value="Thailande">Thailande</option>
					<option value="United K">United K</option>
					<option value="USA">USA</option>

				</select>
				<br>
				Adresse: <input type="text" name="adresse" placeholder="Mettez votre adresse"><br>
	   		Description profil: <input type="text" name="description" placeholder="Mettez une description pour votre profil"><br>
				Acceptez vous de recevoir la Newsletter?<br>
				Oui: <input type="radio" name="newsletter" checked="checked" value="true"><br>
				Non: <input type="radio" name="newsletter" value="false"><br>
				Voulez vous etre vendeur?:
				Oui: <input type="radio" name="vendeur" value="true"><br>
				Non: <input type="radio" name="vendeur" checked="checked" value="false"><br>


				<br>Genre:<br>
				<input type="radio" name="sexe" checked="checked" value="1">Homme<br>
				<input type="radio" name="sexe" value="2">Femme<br>
				<input type="radio" name="sexe" value="3">Autre<br>
				<br>
				Vous pourrez mettre un avatar sur <br> votreprofil une fois qu'il sera créé.
				<br>
				<br>
				<input type="submit" value="Valider"><?php
				if(isset($_GET["errorVe"])){
					echo ("  Erreur: ".$_GET["errorVe"]."");
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
