<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ma page</title>
	</head>
	<body>
		<?php
		include "config.php";
		session_start();

		if (!(isset($_POST['email']) && isset($_POST['motDePasse']) && !empty($_POST['email']) && !empty($_POST['motDePasse']))){
			header("location: connexion.php?errorCo= case non remplie");
			exit;
		}else{

			echo($_POST["motDePasse"]);

			$query1 = $bdd->prepare('SELECT * FROM utilisateur WHERE email=?');
			$email = htmlspecialchars($_POST["email"]);
			$query1->execute(array($email));

			$emails = $query1->fetch();
			$query1 -> closeCursor();

			if(!(in_array($email,$emails))){
				header("location: connexion.php?errorCo=email invalid");
				exit;
			}else if($isSupprime=="1"){
					header("location: connexion.php?errorCo= Compte Bani RIP");
			}else{

				$query2 = $bdd->prepare('SELECT motDePasse FROM utilisateur WHERE email = :email');
				$params = array(
					'email' => htmlspecialchars($_POST["email"])
				);
				$query2 ->execute($params);
				$passwords = $query2->fetch();
				$query2 -> closeCursor();

				$dirtyPassword = $passwords[0];
				//from bdd


				function hashIt($password){
					$salage="ILOVESANANESXcp5yjO777";
					return hash("sha512",$password.$salage);
				}

				$password = hashIt(htmlspecialchars($_POST["motDePasse"]));
				//from input



				$query3 = $bdd->prepare('SELECT id FROM utilisateur WHERE email = :email');
				$params = array(
					'email' => htmlspecialchars($_POST["email"])
				);
				$query3 ->execute($params);
				$ids = $query3->fetch();
				$query3 -> closeCursor();
				$id = $ids[0];

				$query4 = $bdd->prepare('SELECT pseudo FROM utilisateur WHERE email = :email');
				$params = array(
					'email' => htmlspecialchars($_POST["email"])
				);
				$query4 ->execute($params);
				$pseudos = $query4->fetch();
				$query4 -> closeCursor();
				$pseudo=$pseudos[0];




				$query5 = $bdd->prepare('SELECT isSupprime FROM utilisateur WHERE email = :email');
				$params = array(
					'email' => htmlspecialchars($_POST["email"])
				);
				$query5 ->execute($params);
				$isSupprime = $query5->fetch();
				$query5 -> closeCursor();
				$isSupprime=$isSupprimes[0];




				if($dirtyPassword==$password){

					$_SESSION["email"]=$email;
					$_SESSION["id"]=$id;
					$_SESSION["pseudo"]=$pseudo;

					header("location: index.php");
					exit;

				}else{
					header("location: connexion.php?errorCo= Mot de passe incorrect");
					exit;
				}
	 		 }
	 	 }
		?>
	</body>
</html>
