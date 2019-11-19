<?php
session_start();

if (!isset($_SESSION["login_ok"])) {
	header("Location: login.html");
	die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Estas en el sistema - seguro</h1>

	<a href="logout.php">Salir</a>
</body>
</html>
