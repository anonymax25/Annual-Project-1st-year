<header>
	<h1>ChoiceUp - <?php echo ($_SESSION["page"]);?></h1>

	<?php
	if(isset($_SESSION["email"])){
	?>
	<?php if (basename($_SERVER['PHP_SELF']) == "produit.php") { ?>
		<form action="idAnnonceReset.php" method="post">
			<input type="submit" name="deconnect" value="Accueil">
		</form>
	<?php }else{ ?>
		<form action="index.php" method="post">
			<input type="submit" name="Back" value="Accueil">
		</form>
	<?php } ?>
		<br>
		<form action="annonce.php" method="post">
			<input type="submit" name="annonce" value="Créez votre annonce!">
		</form>
		<br>
		<form action="compte.php" method="post">
			<input type="submit" name="perso" value="Mon compte">
		</form>
		<br>
		<form action="deconnect.php" method="post">
			<input type="submit" name="deconnect" value="Deconnexion">
		</form>
		<p>Connecté: <?php echo($_SESSION['pseudo'])?></p>
	<?php
	}else{
		?>
		<form action="index.php" method="post">
			<input type="submit" name="Back" value="Accueil">
		</form>
		<br>
		<form action="connexion.php" method="post">
			<input type="submit" name="connect" value="Connexion">
		</form>
		<br>
		<form action="inscription.php" method="post">
			<input type="submit" name="connect" value="Inscription">
		</form>
		<br>
		<form action="connexion.php" method="post">
			<input type="submit" name="perso" value="Mon compte">
		</form>
		<p>Non connecté: Visiteur</p>
		<?php
	}
	?>
</header>
