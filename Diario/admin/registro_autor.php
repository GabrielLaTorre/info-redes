<?php

 require "../../backend/manejo_sesiones.php"; // para comprobar que esta logueado
 require "../../backend/autor_crud.php"; //para manejar la tabla de autores
 require "../../backend/usuario_crud.php"; //para manejar la tabla de usuario
 require "../../backend/articulos_crud.php"; //para saber cuantos articulos tiene el autor

 	

  //si no estas logueado te vas a la pantalla de login
  if( !$autor = estaLogueado() ){ 
		header( 'location: index.html' );
		die();
	}

	//--
	//--
	//si llegamos aqui por POST se esta intentando borrar un autor
	//el id del autor viene por post, esto lo manejamos ASINCRONO
	if( !empty($_POST) ){
		$id = $_POST['id'];
		deleteUsuario( $id );
		die();
	}

	//lista completa de autores
	$listaAutores = getAutor();


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>InfoRedes | Adm. autores</title>
		
	<link rel="stylesheet" href="estilos.css">
	<script src="./script.js"></script>
	
	<!--Libreria Axios-->
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	
	<!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!-- Cosas de bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">

</head>

<body>

	<?php include "navbar.html"; ?> <!--INCLUIMOS EL NAVABAR-->
	<h1 class="text-center mt-5">Zona de gestion de autor</h1>

	<div class="container">

		<div class="row  d-flex flex-row-reverse mt-5">
		
			
			<form class="invisible" >
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Buscar..." aria-label="Recipient's username" aria-describedby="button-addon2">
					<div class="input-group-append">
						<button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</form>
		</div>

		<div class="row mt-3">
			<table class="table table-hover">
				<thead class="thead-dark">
					<tr>
					<th scope="col">#</th>
					<th scope="col">Username</th>
					<th scope="col">Nombre</th>
					<th scope="col" class='text-center'>Cant. articulos</th>
					<th scope="col "></th>
					</tr>
				</thead>
				<tbody>
					<?php
						//Recorremos la lista de generos 
						foreach( $listaAutores as $autor ) {
							$id = $autor['id'];
							$cant_noticias = count( getArticuloByAutor($id) );

							echo "  <tr>
									<th scope='row'>{$autor['id']}</th>
									<td>{$autor['username']}</td>
									<td>{$autor['nombre']}</td>
									<td class='text-center'>{$cant_noticias}</td>
									<td class='text-center'>
									<button onclick='borrarRegistro($id)' class='btn btn-outline-danger'><i class='fas fa-trash'></i> Borrar</button>
									</td>
									</tr>";	
						}
					?>
				</tbody>
			</table>
		</div>
	</div>


</body>
</html>