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



		<br>
		<h1>Les dernières annonces !:<h1>
		<?php
	  $query1 = $bdd->prepare('SELECT titre,description,idAnnonce,email FROM annonce ORDER BY idAnnonce DESC');
    $query1->execute();
    $query2 = $bdd->prepare('SELECT nom,description,prix,vote,idAnnonce FROM produit ORDER BY idAnnonce DESC');
    $query2->execute();
    while($annonce = $query1->fetch()){?>
      <h3 style="font-size: 20px;margin:0;">Nom: <?= $annonce["titre"]?> Description: <?= $annonce["description"]?> Auteur: <?= $annonce["email"]?></h3>
    	<?php while($produit = $query2->fetch() AND $annonce["idAnnonce"]==$produit["idAnnonce"]){ ?>
					          <br>  <p style="font-size: 15px;margin:0;">Nom: <?= $produit["nom"]?>, Description: <?= $produit["description"]?>, Prix: <?=$produit["prix"]?>, Nombre de votes: <?=$produit["vote"]?></p>
								<?php
		 				}
    }

     $query1->closeCursor();
     $query2->closeCursor();
    ?>

		<br><br><br><br><br>

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
		En dessous un autre carousel plus petit avec une liste d'annonces qui va défiler  <p style="color: red; font-size: 20px;">DEJA FAIT IL FAUT CREER DES ANNONCES POUR LES VOIR     Par contre celui des images est toujours à faire MERCI</p>

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
