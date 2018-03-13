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
		$_POST["birthDate"] = htmlspecialchars($_POST["birthDate"]);
		$_POST["country"] = htmlspecialchars($_POST["country"]);
		$_POST["gender"] = htmlspecialchars($_POST["gender"]);

		include("config.php");

		if (!(isset($_POST["pseudo"]) && isset($_POST["password"]) && isset($_POST["email"]) && isset($_POST["birthDate"]) && /*isset($_POST["country"]) && */isset($_POST["gender"]) && !empty($_POST["pseudo"]) && !empty($_POST["password"])
		 && !empty($_POST["email"]) && !empty($_POST["birthDate"]) && /*!empty($_POST["country"]) &&*/ !empty($_POST["gender"]))){

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

		$query2 = $bdd->prepare('SELECT email FROM users');

		$query2 ->execute();
		$emails = $query2->fetch();
		$query2 -> closeCursor();

		$email = $_POST["email"];

		if((in_array($email,$emails))){
			header("location: inscription.php?errorVe=email deja pris");
			exit;
		}




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





		function verifPassword($password){
			if (strlen($password)<5 OR strlen($password)>20){
				return false;
			}else{
				return true;
			}

		}

		if(!verifPassword($_POST["password"])){
			header("location: inscription.php?errorVe= Mot de passe trop long ou courts");
			exit;
		}

		function verifGender($gender){
			if ($gender>3 OR $gender<0) {
				return false;
			}else{
				return true;
			}
		}

		if(!verifGender($_POST["gender"])){
			header("location: inscription.php?errorVe=gender");
			exit;
		}




		function verifCountry($country){
			if (strlen($country)<1 OR strlen($country)>20){
				return false;
			}else{
				return true;
			}
		}

		if(!verifCountry($_POST["country"])){
			header("location: inscription.php?errorVe=country");
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

		$dirtyPassword=chiffrer($_POST["password"]);

		include "config.php";

		$query = $bdd->prepare('INSERT INTO users (pseudo,password,email,birthDate,country,gender) VALUES (:pseudo,:password,:email,:birthDate,:country,:gender)');
		$params = array(
												'pseudo' => htmlspecialchars($_POST["pseudo"]),
												'password' => htmlspecialchars($dirtyPassword),
												'email' => htmlspecialchars($_POST["email"]),
												'birthDate' => htmlspecialchars($_POST["birthDate"]),
												'country' => htmlspecialchars($_POST["country"]),
												'gender' => htmlspecialchars($_POST["gender"])
		);
		$query->execute($params);
		$lastId = $bdd->lastInsertid();
		$query -> closeCursor();

		session_start();
		//id pseudo
		$_SESSION["id"]=$lastId;
		$_SESSION["pseudo"]=htmlspecialchars($_POST["pseudo"]);
		$_SESSION["email"]=htmlspecialchars($_POST["email"]);

		header("location: index.php");
		exit;

		}

		?>
	</body>
</html>
