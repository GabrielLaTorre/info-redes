<?php

 require "../../backend/manejo_sesiones.php"; // para comprobar que esta logueado
 require "../../backend/genero_crud.php"; //para manejar la tabla de generos
 	

  //si no estas logueado te vas a la pantalla de login
  if( !$autor = estaLogueado() ){ 
		header( 'location: index.html' );
		die();
	}

	//traemos la lista con todos los generos
	$listaGeneros = getGenero();


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar nueva Noticia</title>

	<link rel="stylesheet" href="estilos.css">
	<script src="./script.js"></script>

	 <!--Fontawesome CDN-->
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


	<!-- Cosas de bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">

</head>

<body>

<?php include "navbar.html"; ?> <!--INCLUIMOS EL NAVABAR-->
<h1 class="text-center mt-5">Zona de gestion de genero</h1>

<div class="container">

	<div class="row  d-flex justify-content-between mt-5">
		<button class="btn btn-light" onclick="desplegarForm()"><i class="fas fa-plus-circle"></i> Agregar nueva</button>
		
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
				<th scope="col">Nombre</th>
				<th scope="col">Cant. articulos</th>
				<th scope="col " >
					
				</th>
				</tr>
			</thead>
			<tbody>
				<?php
					//Recorremos la lista de generos 
					foreach( $listaGeneros as $genero ) {
						echo "  <tr>
								<th scope='row'>{$genero['id']}</th>
								<td>{$genero['nombre']}</td>
								<td>cant. noticias</td>
								<td class='text-center'><a href='#' class='btn btn-outline-primary mr-3'><i class='fas fa-edit'></i> Editar</a><a href='#' class='btn btn-outline-danger'><i class='fas fa-trash'></i> Borrar</a></td>
								</tr>";	
					}
				?>
			</tbody>
		</table>
	</div>

	<div id="form-oculto" class="cont-oculto oculto" onclick="desplegarForm()">
		<form class="form-oculto" action="">
			<div class="form-group">
				<label for="exampleInputEmail1">Nombre de nuevo genero</label>
				<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="ejm: Politica, Negocios, etc..">
			</div>
						
			<button type="submit" class="btn btn-primary">Añadir</button>
		</form>
	</div>

</div>


	



</body>
</html>