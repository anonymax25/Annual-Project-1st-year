<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ma page</title>
	</head>
	<body>
		<?php
		session_start();

		$_POST["pseudo"] = htmlspecialchars($_POST["pseudo"]);
		$_POST["email"] = htmlspecialchars($_POST["email"]);
		$_POST["dateNaissance"] = htmlspecialchars($_POST["dateNaissance"]);
		//$_POST["pays"] = htmlspecialchars($_POST["pays"]);
		$_POST["motDePasse"] = htmlspecialchars($_POST["motDePasse"]);
		//$_POST["sexe"] = htmlspecialchars($_POST["sexe"]);
		$_POST["nom"] = htmlspecialchars($_POST["nom"]);
		$_POST["prenom"] = htmlspecialchars($_POST["prenom"]);
		$_POST["adresse"] = htmlspecialchars($_POST["adresse"]);
		$_POST["description"] = htmlspecialchars($_POST["description"]);
		$_POST["telephone"] = htmlspecialchars($_POST["telephone"]);
		//$_POST["vendeur"] = htmlspecialchars($_POST["vendeur"]);
		//$_POST["newsletter"] = htmlspecialchars($_POST["newsletter"]);

		include("config.php");
		$champs = array('pseudo','email','dateNaissance','pays','motDePasse','sexe','nom','prenom','adresse','description','telephone','vendeur','newsletter');

    foreach ($champs as $value) {
        if(!isset($_POST[$value]) || empty($_POST[$value]))
        {
            header("Location:inscription.php?errorVe= isset/empty de ".$value."");
            exit;
        }
    	}
			//  /!\ CIMETIERE DU CODE MOCHE /!\
			/*
			isset($_POST["pseudo"]) && isset($_POST["password"]) && isset($_POST["email"]) && isset($_POST["dateNaissance"]) && isset($_POST["pays"])
			&& isset($_POST["sexe"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["address"]) && isset($_POST["description"]) &&
			isset($_POST["motDePasse"]) && isset($_POST["vendeur"]) && isset($_POST["vendeur"]) && isset($_POST["newsletter"]) && !empty($_POST["pseudo"]) &&
			!empty($_POST["motDePasse"]) && !empty($_POST["email"]) && !empty($_POST["dateNaissance"]) && !empty($_POST["pays"]) && !empty($_POST["sexe"]) && !empty($_POST["nom"])
			&& !empty($_POST["prenom"]) && !empty($_POST["address"]) && !empty($_POST["description"]) && !empty($_POST["telephone"]) && !empty($_POST["vendeur"]) &&
			!empty($_POST["vendeur"]) && !empty($_POST["newsletter"]

			$monLog = fopen("utilisateur.txt", "r+");
			fseek($monLog, 0, SEEK_END);
			fputs($monLog,"\n".$_POST["email"]." ".$_POST["pass"]);
			fclose($monLog);

			*/

			//verification

			function verifEmail($email){
				return filter_var($email, FILTER_VALIDATE_EMAIL);
			}

			if(!verifEmail($_POST["email"])){
				header("location: inscription.php?errorVe=email");
				exit;
			}

			$query1 = $bdd->prepare('SELECT email FROM utilisateur');

			$query1 ->execute();
			$emails = $query1->fetch();
			$query1 -> closeCursor();

			$email = $_POST["email"];

			function verifPseudo($pseudo){
				if (strlen($pseudo)<3 OR strlen($pseudo)>80){
					return false;
				}else{
					return true;
				}

			}

			if(!verifPseudo($_POST["pseudo"])){
				header("location: inscription.php?errorVe=pseudo");
				exit;
			}
			$query2 = $bdd->prepare('SELECT pseudo FROM utilisateur');

			$query2 ->execute();
			$emails = $query2->fetch();
			$query2 -> closeCursor();

			$pseudo = $_POST["pseudo"];

			/*
			if((in_array($pseudo,$pseudos))){
				header("location: inscription.php?errorVe=Pseudo deja pris");
				exit;
			}
			*/



			function verifNom($nom){
				if (strlen($nom)<3 OR strlen($nom)>80){
					return false;
				}else{
					return true;
				}
			}

			if(!verifNom($_POST["nom"])){
				header("location: inscription.php?errorVe=nom");
				exit;
			}

			function verifPrenom($prenom){
				if (strlen($prenom)<3 OR strlen($prenom)>80){
					return false;
				}else{
					return true;
				}
			}

			if(!verifPrenom($_POST["prenom"])){
				header("location: inscription.php?errorVe=prenom");
				exit;
			}

			function verifAdresse($adresse){
				if (strlen($adresse)<3 OR strlen($adresse)>80){
					return false;
				}else{
					return true;
				}
			}

			if(!verifAdresse($_POST["adresse"])){
				header("location: inscription.php?errorVe=adresse");
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
				header("location: inscription.php?errorVe=description");
				exit;
			}



			function verifPassword($password){
				if (strlen($password)<5 OR strlen($password)>128){
					return false;
				}else{
					return true;
				}

			}

			if(!verifPassword($_POST["motDePasse"])){
				header("location: inscription.php?errorVe=Mot de passe trop long(128 max) ou court(5 min)");
				exit;
			}

			function verifTelephone($telephone){
				if (strlen($telephone)<10 OR strlen($telephone)>14 OR !ctype_digit($telephone)){
					return false;
				}else{
					return true;
				}
			}

			if(!verifTelephone($_POST["telephone"])){
				header("location: inscription.php?errorVe=telephone");
				exit;
			}


			//fin verififcation

			//cryptage du MPD
			function chiffrer($password){
				$salage="ILOVESANANESXcp5yjO777";
				return hash("sha512",$password.$salage);
			}

			//mot de passe crypté
			$dirtyPassword=chiffrer($_POST["motDePasse"]);

			//insertion du user dans la base de donnée
			include "config.php";

			$query = $bdd->prepare('INSERT INTO utilisateur (pseudo,motDePasse,email,dateNaissance,pays,sexe,prenom,nom,adresse,description,telephone,isSupprime) VALUES (:pseudo,:password,:email,:dateNaissance,:pays,:sexe,:prenom,:nom,:adresse,:description,:telephone,:isSupprime)');
			$params = array(
													'pseudo' => $_POST["pseudo"],
													'password' => $dirtyPassword,
													'email' => $_POST["email"],
													'dateNaissance' => $_POST["dateNaissance"],
													'pays' => $_POST["pays"],
													'sexe' => $_POST["sexe"],
													'prenom' => $_POST["prenom"],
													'nom' => $_POST["nom"],
													'adresse' => $_POST["adresse"],
													'description' => $_POST["description"],
													'telephone' => $_POST["telephone"],
													'isSupprime' => "0"
			);
			$query->execute($params);
			$lastId = $bdd->lastInsertid();
			$query -> closeCursor();

			//on recupere Quelques données à afficher pour la session
			$_SESSION["id"]=$lastId;
			$_SESSION["pseudo"]=$_POST["pseudo"];
			$_SESSION["email"]=$_POST["email"];

			header("location: index.php");
			exit;



			?>
	</body>
</html>
