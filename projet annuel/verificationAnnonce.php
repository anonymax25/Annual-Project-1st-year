<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>verificationAnnonce</title>
	</head>
	<body>
		<?php
    include("config.php");
    session_start();

		$_POST["titre"] = htmlspecialchars($_POST["titre"]);
		$_POST["description"] = htmlspecialchars($_POST["description"]);

		$champs = array('description','type','titre');

    foreach ($champs as $value) {
        if(!isset($_POST[$value]) || empty($_POST[$value]))
        {
            header("Location: annonce.php?errorVe= isset/empty de ".$value."");
            exit;
        }
    	}

			function verifTitre($titre){
				if (strlen($titre)<3 OR strlen($titre)>80){
					return false;
				}else{
					return true;
				}
			}

			if(!verifTitre($_POST["titre"])){
				header("location: annonce.php?errorVe=titre");
				exit;
			}

      function verifDescription($description){
				if (strlen($description)<3 OR strlen($description)>400){
					return false;
				}else{
					return true;
				}
			}

			if(!verifDescription($_POST["description"])){
				header("location: annonce.php?errorVe=description");
				exit;
			}



      session_start();
			$query = $bdd->prepare('INSERT INTO annonce (description,type,email,titre) VALUES (:description,:type,:email,:titre)');
			$params = array(
													'description' => $_POST["description"],
													'type' => $_POST["type"],
                          'email' => $_SESSION["email"],
                          'titre' => $_POST["titre"]
			);
			$query->execute($params);
			$lastId = $bdd->lastInsertid();
			$query -> closeCursor();

      $_SESSION["idAnnonce"]=$lastId;


			header("location: produit.php");
			exit;



			?>
	</body>
</html>
