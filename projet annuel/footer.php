<footer>
	<p>Copyright: Maxime d'Harboullé</p>
	<?php
	if (isset($_SESSION["pseudo"]) && $_SESSION["pseudo"] == "admin" ){
	?>
	<?php
		if (basename($_SERVER['PHP_SELF']) == "administration.php") {
			?>
			<form action="index.php" method="post">
				<input type="submit" name="adminBack" value="Retour à la page d'accueil">
			</form>
			<?php
		}else{
			?>

		<form action="administration.php" method="post">
			<input type="submit" name="administration" value="Acces administrateur">
		</form>
		<?php
		}
	}
	?>
</footer>
