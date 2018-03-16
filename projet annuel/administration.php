<?php session_start(); $_SESSION["page"]="Administration";
include "config.php";

if(isset($_GET["supprimeCompte"]) && !empty($_GET["supprimeCompte"])){
		$supprimeCompte = (int) $_GET["supprimeCompte"];

		$queryCompte = $bdd->prepare('UPDATE utilisateur SET isSupprime = "1" WHERE id = ?');
		$queryCompte->execute(array($supprimeCompte));
		$queryCompte->closeCursor();
}
if(isset($_GET["confirmeCompte"]) && !empty($_GET["confirmeCompte"])){
		$confirmeCompte = (int) $_GET["confirmeCompte"];

		$queryCompte2 = $bdd->prepare('UPDATE utilisateur SET isSupprime = "0" WHERE id = ?');
		$queryCompte2->execute(array($confirmeCompte));
		$queryCompte2->closeCursor();
}

if(isset($_GET["supprimeAnnonce"]) && !empty($_GET["supprimeAnnonce"])){
		$supprimeAnnonce = (int) $_GET["supprimeAnnonce"];

		$queryAnnonce = $bdd->prepare('DELETE FROM annonce WHERE idAnnonce = ?');
		$queryAnnonce->execute(array($supprimeAnnonce));
		$queryAnnonce->closeCursor();
}



?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Administration</title>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
	</head>
	<body>
		<?php
		include "header.php";
		?>
    <h2>Gérer les utilisateurs</h2>
		<div>
	    <ul>
	      <?php
	      $query1 = $bdd->prepare('SELECT pseudo,isSupprime,id FROM utilisateur ORDER BY id DESC');
	      $query1->execute();
	      while($utilisateur = $query1->fetch()){?>
	  		<li>ID <?= $utilisateur["id"]?>: <?= $utilisateur["pseudo"]?>: <?php echo("Statut: ".$utilisateur["isSupprime"]) ?> <a href='administration.php?supprimeCompte=<?= $utilisateur['id'] ?>'>Banir</a> : <a href='administration.php?confirmeCompte=<?= $utilisateur['id'] ?>'>Debanir</a></li>
	  	   <?php }
	       $query1->closeCursor();
	       ?>
	    </ul>
		</div>
		<h2>Gérer les annonces</h2>
		<div>
			<ul>
	      <?php
	      $query2 = $bdd->prepare('SELECT titre,idAnnonce,email FROM annonce ORDER BY idAnnonce DESC');
	      $query2->execute();
	      while($annonce = $query2->fetch()){?>
	  		<li> <?= $annonce["titre"]?>: <?= $annonce["email"]?> <a href='administration.php?supprimeAnnonce=<?= $annonce['idAnnonce'] ?>'>Supprimer</a></li>
	  	   <?php }
	       $query2->closeCursor();
	       ?>
	    </ul>
	</div>
    <?php
    /*
    $query2 = $bdd->prepare('SELECT pseudo,description FROM utilisateur ORDER BY id DESC');
    $query2->execute();
    while($utilisateur = $query1->fetch()){?>
		<ol><?= $utilisateur["pseudo"]?></ol>
	   <?php }
     $query2->closeCursor();
     */
     ?>
		<?php
		include "footer.php";
		?>
	</body>
</html>
