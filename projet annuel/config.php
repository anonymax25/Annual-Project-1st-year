<?php

try{

$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','root',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)); //affich err mysql

}catch(Exception $e){
	die("Erreur : ".$e->getMessage());
}

?>
