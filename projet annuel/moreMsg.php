<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ma page</title>
	</head>
	<body>
		<?php
		include "config.php";
    $limit = $_GET["limit"] + 5;
    header("location: index.php?limit=".$limit."")
		?>
	</body>
</html>
