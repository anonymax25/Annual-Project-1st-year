<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>verificationProduit</title>
	</head>
	<body>
		<?php
    session_start();

		$_POST["nom"] = htmlspecialchars($_POST["nom"]);
		$_POST["description"] = htmlspecialchars($_POST["description"]);
    $_POST["photo"] = htmlspecialchars($_POST["photo"]);
    $_POST["prix"] = htmlspecialchars($_POST["prix"]);


		include("config.php");

		$champs = array('nom','description','photo','prix');

    foreach ($champs as $value) {
        if(!isset($_POST[$value]) || empty($_POST[$value]))
        {
            header("Location: produit.php?errorVe= isset/empty de ".$value."");
            exit;
        }
    	}

			function verifNom($nom){
				if (strlen($nom)<4 OR strlen($nom)>80){
					return false;
				}else{
					return true;
				}
			}

			if(!verifNom($_POST["nom"])){
				header("location: produit.php?errorVe=nom");
				exit;
			}
      echo $_POST["nom"];

      function verifPhoto($photo){
				if (strlen($photo)<3 OR strlen($photo)>80){
					return false;
				}else{
					return true;
				}
			}

			if(!verifPhoto($_POST["photo"])){
				header("location: produit.php?errorVe=photo");
				exit;
			}

      function verifPrix($prix){
				if (is_numeric($prix)){
					return true;
				}else{
					return false;
				}
			}

			if(!verifPrix($_POST["prix"])){
				header("location: produit.php?errorVe=prix");
				exit;
			}

      function verifDescription($description){
				if (strlen($description)<0 OR strlen($description)>400){
					return false;
				}else{
					return true;
				}
			}

			if(!verifDescription($_POST["description"])){
				header("location: produit.php?errorVe=description");
				exit;
			}


			$query = $bdd->prepare('INSERT INTO produit (nom,description,photo,prix,idAnnonce,vote,valide) VALUES (:nom,:description,:photo,:prix,:idAnnonce,:vote,:valide)');
			$params = array(
													'description' => $_POST["description"],
													'nom' => $_POST["nom"],
                          'photo' => $_POST["photo"],
                          'prix' => $_POST["prix"],
                          'idAnnonce' => $_SESSION["idAnnonce"],
                          'vote' => 0,
                          'valide' => 0
			);
			$query->execute($params);
			$lastId = $bdd->lastInsertid();
			$query -> closeCursor();

      $_SESSION["idProduit"]=$lastId;


			header("location: produit.php");
			exit;



			?>
	</body>
</html>
