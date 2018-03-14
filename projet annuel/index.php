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


		<?php
		if(isset($_SESSION["email"])){
		?>
		<h3>Personne connecté: <?php echo($_SESSION['pseudo'])?></h3>
		<h3>Email connecté: <?php echo($_SESSION['email'])?></h3>
		<p>Numero id :<?php echo($_SESSION['id'])?></p>

		<form action="deconnect.php" method="post">
			<input type="submit" name="deconnect" value="Deconnexion">
		</form>

		<?php
		}else{
			?>
			<form action="connexion.php" method="post">
				<input type="submit" name="connect" value="Connexion">
			</form>
			<form action="inscription.php" method="post">
				<input type="submit" name="connect" value="Inscription">
			</form>
			<?php
		}
		?>

		<h1 style="color:red;">Contenu du site, on est bien d'accord?</h1>
		<h2>rajoutez les idées qu'on avait</h2>
		<br>
		J'ai mis quemques bouttons pour revenir en arrier vous verez :D
		<br>
		<br>
		Pour avoir acces au bouton admin dans le footer: créer un compte avec<br> pseudo = "admin"  (il faut juste avoir la table utilisateur qui marche :)
		<br>
		<br>
		Wow il y aura un carousel geant qui fera toute la taille de la fenetre avec du background ici: AMAZING
		<br>
		En dessous un autre carousel plus petit avec une liste d'annonces qui va défiler
		<br>
		<h1 style="color: purple;">NOICE</h1>
		<h1 style="color: lime;">VERY DOGE</h1>
		oui ce vert fait mal au yeux :)

		<br>
		<?php
		/*
		?>

		<br>
		<br>
		<br>


		<form action="message.php" method="post" id="messageForm">
			<input type="text" name="message" placeholder="ecrivez votre message ici">
			<input type="submit" name="send" value="Envoyer le message">
		</form>

		<?php
		if(isset($_GET["error"])){
			echo("<p>Erreur d'envoi: ".$_GET["error"]."</p>");
		}
		?>

		<h2>Chat:<h2>

		<?php

		$limit=10;
		//$limit=$_GET["limit"];
		$messages = $bdd->query("SELECT message,auteur,dateNow FROM messages ORDER BY id DESC LIMIT ".$limit."");

		while($message = $messages->fetch()){?>
			<div><?= $message["dateNow"]?> <?= $message["auteur"]?>: <?= $message["message"]?></div>
		<?php } ?>

		<form action="moreMsg.php" methode="POST">
			<input type="submit" name="moreMsg" value="Plus de messages"></input>
		</form>

		<?php

		if(isset($_POST["moreMsg"])){
			header("location: moreMsg.php?limit=".$limit."");
			exit;
		}


		//boutton pour incrémenter la limite de 5
		*/

		include "footer.php";
		?>
	</body>
</html>
<?php
/*
}
*/
?>
