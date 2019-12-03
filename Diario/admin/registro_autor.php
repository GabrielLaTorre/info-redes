<?php

 require "../../backend/manejo_sesiones.php"; // para comprobar que esta logueado
 require "../../backend/autor_crud.php"; //para manejar la tabla de autores

 	

  //si no estas logueado te vas a la pantalla de login
  if( !$autor = estaLogueado() ){ 
		header( 'location: index.html' );
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
		
			
			<form >
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
					<th scope="col">Cant. articulos</th>
					<th scope="col "></th>
					</tr>
				</thead>
				<tbody>
					<?php
						//Recorremos la lista de generos 
						foreach( $listaAutores as $autor ) {
							echo "  <tr>
									<th scope='row'>{$autor['id']}</th>
									<td>{$autor['username']}</td>
									<td>{$autor['nombre']}</td>
									<td>cant. articulos</td>
									<td class='text-center'><a href='#' class='btn btn-outline-primary mr-3'><i class='fas fa-edit'></i> Editar</a><a href='#' class='btn btn-danger'><i class='fas fa-trash'></i> Borrar</a></td>
									</tr>";	
						}
					?>
				</tbody>
			</table>
		</div>
	</div>


</body>
</html>