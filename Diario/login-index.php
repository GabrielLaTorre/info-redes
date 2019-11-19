<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php

$usuarioFail = false;

if (!empty($_POST)) {

	$username = $_POST["username"];
	$pwd = $_POST["password"];

	require_once "conexion.php";

	$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_DB);

	$sql = "select * from usuario
					WHERE username='$username'
					and pwd ='$pwd'
					and activo =1";

	$respuesta = mysqli_query($conexion, $sql);

	$usuario = mysqli_fetch_array($respuesta);

	if ($usuario) {

	session_start();
	$_SESSION["login_ok"] = true;
	$_SESSION["user_id"] = $usuario["id"];

	header('Location:index.html');
	} else {
		$usuarioFail = true;
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Sistema login</title>
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="estilo-login.css">
	<link rel="stylesheet" href="estilos.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header text-center">
				<h3>Ingreso de usuario</h3>
				<h3>Info Redes</h3>
			</div>
			<?php
				if ($usuarioFail) {
					echo '<div class="alert alert-danger card-body" role="alert">Usuario y/o contraseña incorrecto</div>';
				}
			?>
			<div class="card-body">
				<form action="login-index.php" method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="username" placeholder="Usuario" required>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" placeholder="Contraseña" required>
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Recordarme
					</div>
					<div class="form-group">
						<input type="submit" value="Ingresar" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					¿No tiene cuenta?<a href="#">Crear usuario</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once "footer.html";?>
</body>
