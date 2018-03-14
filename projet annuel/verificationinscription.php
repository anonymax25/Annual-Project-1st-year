<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ma page</title>
	</head>
	<body>
		<?php

		$_POST["pseudo"] = htmlspecialchars($_POST["pseudo"]);
		$_POST["email"] = htmlspecialchars($_POST["email"]);
		$_POST["dateNaissance"] = htmlspecialchars($_POST["dateNaissance"]);
		$_POST["pays"] = htmlspecialchars($_POST["pays"]);
		$_POST["motDePasse"] = htmlspecialchars($_POST["motDePasse"]);
		$_POST["sexe"] = htmlspecialchars($_POST["sexe"]);
		$_POST["nom"] = htmlspecialchars($_POST["nom"]);
		$_POST["prenom"] = htmlspecialchars($_POST["prenom"]);
		$_POST["address"] = htmlspecialchars($_POST["address"]);
		$_POST["description"] = htmlspecialchars($_POST["description"]);
		$_POST["telephone"] = htmlspecialchars($_POST["telephone"]);
		//$_POST["vendeur"] = htmlspecialchars($_POST["vendeur"]);
		//$_POST["newsletter"] = htmlspecialchars($_POST["newsletter"]);

		include("config.php");

		if (!(isset($_POST["pseudo"]) && isset($_POST["password"]) && isset($_POST["email"]) && isset($_POST["dateNaissance"]) && isset($_POST["pays"])
			&& isset($_POST["sexe"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["address"]) && isset($_POST["description"]) &&
			isset($_POST["motDePasse"]) && isset($_POST["vendeur"]) && isset($_POST["vendeur"]) && isset($_POST["newsletter"]) && !empty($_POST["pseudo"]) &&
			!empty($_POST["motDePasse"]) && !empty($_POST["email"]) && !empty($_POST["dateNaissance"]) && !empty($_POST["pays"]) && !empty($_POST["sexe"]) && !empty($_POST["nom"])
			&& !empty($_POST["prenom"]) && !empty($_POST["address"]) && !empty($_POST["description"]) && !empty($_POST["telephone"]) && !empty($_POST["vendeur"]) &&
			!empty($_POST["vendeur"]) && !empty($_POST["newsletter"]))){

				header("location: inscription.php?errorVe=case vide");
				exit;

		}else{

		/*
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

		/*if((in_array($email,$emails))){
			header("location: inscription.php?errorVe=email deja pris");
			exit;
		}*/




		function verifPseudo($pseudo){
			if (strlen($pseudo)<3 OR strlen($pseudo)>20){
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
			if (strlen($nom)<3 OR strlen($nom)>20){
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
			if (strlen($prenom)<3 OR strlen($prenom)>20){
				return false;
			}else{
				return true;
			}
		}

		if(!verifPrenom($_POST["prenom"])){
			header("location: inscription.php?errorVe=prenom");
			exit;
		}

		function verifAddress($address){
			if (strlen($address)<3 OR strlen($address)>20){
				return false;
			}else{
				return true;
			}
		}

		if(!verifAddress($_POST["address"])){
			header("location: inscription.php?errorVe=address");
			exit;
		}

		function verifDescription($description){
			if (strlen($description)<3 OR strlen($description)>20){
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
			if (strlen($password)<5 OR strlen($password)>20){
				return false;
			}else{
				return true;
			}

		}

		if(!verifPassword($_POST["motDePasse"])){
			header("location: inscription.php?errorVe=Mot de passe trop long ou courts");
			exit;
		}

		function verifSexe($sexe){
			if ($sexe>3 OR $sexe<0) {
				return false;
			}else{
				return true;
			}
		}

		if(!verifSexe($_POST["sexe"])){
			header("location: inscription.php?errorVe=sexe");
			exit;
		}




		function verifPays($pays){
			if (strlen($pays)<1 OR strlen($pays)>20){
				return false;
			}else{
				return true;
			}
		}

		if(!verifPays($_POST["pays"])){
			header("location: inscription.php?errorVe=pays");
			exit;
		}

		function verifTelephone($telephone){
			if (strlen($telephone)<10 OR strlen($telephone)>14){
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
			//md5(str); deja cracké
			//clé de salage
			$salage="Xy6rBI5";
			//md5($salage.$password.$salage);
			//sha1(str)
			return hash("sha512",$password.$salage);
		}

		$dirtyPassword=chiffrer($_POST["motDePasse"]);

		include "config.php";

		$query = $bdd->prepare('INSERT INTO utilisateur (pseudo,motDePasse,email,dateNaissance,pays,sexe,prenom,nom,adresse,description,telephone) VALUES (:pseudo,:password,:email,:dateNaissance,:pays,:sexe,:prenom,:nom,:address,:description,:telephone)');
		$params = array(
												'pseudo' => $_POST["pseudo"],
												'password' => $dirtyPassword,
												'email' => $_POST["email"],
												'dateNaissance' => $_POST["dateNaissance"],
												'pays' => $_POST["pays"],
												'sexe' => $_POST["sexe"],
												'prenom' => $_POST["prenom"],
												'nom' => $_POST["nom"],
												'address' => $_POST["address"],
												'description' => $_POST["description"],
												'telephone' => $_POST["telephone"]
		);
		$query->execute($params);
		$lastId = $bdd->lastInsertid();
		$query -> closeCursor();

		session_start();
		//id pseudo
		$_SESSION["id"]=$lastId;
		$_SESSION["pseudo"]=$_POST["pseudo"];
		$_SESSION["email"]=$_POST["email"];

		header("location: index.php");
		exit;

		}

		?>
	</body>
</html>
