<?php
    $usuarioFail = false;
    if (!empty($_POST)) {

		require "../../backend/autor_crud.php";
        require "../../backend/usuario_crud.php";
        require "../../backend/manejo_sesiones.php";

		//recogemos los parametros que vienen por POST
		$nombre = $_POST["nombre"];
        $username = $_POST["username"];
        $pwd = $_POST["password"]; 
		
		
        if( $usuario = registrarUsuario( $username , $pwd ) ){
			$autor = registrarAutor( $usuario['id'] , $nombre );
			iniciarSesion( $autor );
			header( 'location: main.php' ); // vamos a la zona de usuario
			die();
        }else{
            $usuarioFail = true;
        }

    }
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Info-Redes | Registro usuario</title>
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="estilo-login.css">
	<link rel="stylesheet" href="estilos.css">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
<div class="container fondo">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header text-center">
				<h3>Registro de Usuario</h3>
				<h3>Info Redes</h3>
			</div>
			<?php
				if ($usuarioFail) {
					echo '<div class="alert alert-danger card-body" role="alert">Por favor prueba otro Usuario/Contraseña</div>';
				}
			?>
			<div class="card-body">
				<form method="post">
					
					<label class="label" for="nombre">Nombre</label>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
					</div>

					<label class="label" for="username">Username</label>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-at"></i></span>
						</div>
						<input type="text" id="username" class="form-control" name="username" placeholder="Eligue tu username" required>
					</div>

					<label class="label" for="password">Contraseña</label>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" id="password" class="form-control" name="password" placeholder="Ingresa tu contraseña" required>
					</div>
					
					<div class="form-group mt-5">
						<input type="submit" value="Registrame" class="btn float-right login_btn">
					</div>

				</form>
			</div>


			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					¿Tienes cuenta?<a href="index.php">Logueate!</a>
				</div>
			</div>
		</div>
	</div>
</div>

</body>