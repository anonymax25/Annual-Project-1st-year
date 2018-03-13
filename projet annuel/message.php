<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ma page</title>
	</head>
	<body>
		<?php
		include "config.php";

		if (!isset($_POST['message']) || empty($_POST['message'])){
			header("location: index.php?error=message vide");
		}else{
      $message = htmlspecialchars($_POST['message']);
      if (strlen($message)>200){
        header("location: index.php?error=message au dessus de 200 caractères");
      }else {
        if(strlen($message)<3){
          header("location: index.php?error=message en dessous de 3 caractères");
        }else{
					$date = date('H:i:s');
					session_start();
          $msg = $bdd->prepare('INSERT INTO messages (message,auteur,dateNow) VALUES (:message,:auteur,:dateNow)');
					$param = array(
							'message' => htmlspecialchars($_POST['message']),
							'auteur' => htmlspecialchars($_SESSION["pseudo"]),
							'dateNow' => $date
					);
					$msg->execute($param);
					$msg->closeCursor();



            header("location: index.php?msgstate=sent");
						exit;
        }
      }
    }
		?>
	</body>
</html>
