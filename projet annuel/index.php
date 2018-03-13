<?php
session_start();

if(!isset($_SESSION['email'])){
	header("location: inscription.php?error=no_session");
	exit;

}else{
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mon TP</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<?php
	include "config.php";
	include "header.php";
	?>

	<h3>Personne connecté: <?php echo($_SESSION['pseudo'])?></h3>
	<h3>Email connecté: <?php echo($_SESSION['email'])?></h3>
	<p>Numero id :<?php echo($_SESSION['id'])?></p>




	<form action="deconnect.php" method="post">
		<input type="submit" name="deconnect" value="Deconnexion">
	</form>

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

	/*
	boutton pour incrémenter la limite de 5
	*/

	include "footer.php";
	?>
</body>
</html>
<?php
}
?>
