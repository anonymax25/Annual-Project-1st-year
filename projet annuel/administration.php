<?php session_start(); $_SESSION["page"]="Administration";?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Administration</title>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
	</head>
	<body>
		<?php
		include "config.php";
		include "header.php";
		?>
    <h2>Gérer les utilisateurs</h2>

    <ul>
      <?php
      $query1 = $bdd->prepare('SELECT pseudo,id FROM utilisateur ORDER BY id DESC');
      $query1->execute();
      while($utilisateur = $query1->fetch()){?>
  		<li>ID <?= $utilisateur["id"]?>: <?= $utilisateur["pseudo"]?></li>
  	   <?php }
       $query1->closeCursor();
       ?>
    </ul>

    <h2>Gérer les annonces</h2>
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
