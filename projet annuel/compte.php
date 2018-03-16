<?php session_start(); $_SESSION["page"]="Accueil";?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil</title>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
	</head>
	<body>
		<?php
		include "config.php";
		include "header.php";
		?>
    <form action="changeCompte.php" method="post">
			<input type="submit" name="change" value="Changez vos informations personnelles">
		</form>
		<h3>Votre pseudo: <?php echo($_SESSION['pseudo'])?></h3>
		<h3>Votre email: <?php echo($_SESSION['email'])?></h3>
		<h3>Votre id sur le site :<?php echo($_SESSION['id'])?></h3>

		<?php
		include "footer.php";
		?>
	</body>
</html>
<?php
/*
}
*/
?>
