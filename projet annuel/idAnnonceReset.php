<?php
session_start();
unset($_SESSION["idAnnonce"]);
unset($_SESSION["idProduit"]);
header("location: index.php");
 ?>
