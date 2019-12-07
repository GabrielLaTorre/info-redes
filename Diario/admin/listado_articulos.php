<?php
	
	require "../../backend/manejo_sesiones.php"; // para comprobar que esta logueado
  require "../../backend/articulos_crud.php"; //para manejar la tabla de articulos

	//--
	//--
  //si no estas logueado te vas a la pantalla de login
	if( !$autor = estaLogueado() ){ 
		header( 'location: index.html' );
		die();
	}



	//--
	//--
	//si llegamos aqui por POST se esta intentando borrar una noticia
	//el id de la noticia viene por post, esto lo manejamos asincrono
	if( !empty($_POST) ){
		$id = $_POST['id'];
		deleteArticulo( $id );
		die();
	}
	

	//recuperamos todas los articulos
	$listaArticulos = getArticulo();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>InforRedes | Listado de noticias</title>

  	<link rel="stylesheet" href="estilos.css">
		<script src="script.js"></script>

		<!--Libreria Axios-->
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script> 

		<!--Fontawesome CDN-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


		<!-- Cosas de bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">

</head>
<body>

	<?php include "navbar.html" ?> <!--INCLUIMOS EL NAVABAR-->


	<h1 class="text-center mt-5">Listado de articulos</h1>
			
	<div class="container">

		<div class="row  d-flex justify-content-between mt-5">
			<a href="registro_articulo.php" class="btn btn-primary" ><i class="fas fa-plus-circle"></i> Agregar nueva</a>
			
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
					<th scope="col " >
						
					</th>
					</tr>
				</thead>
				<tbody>

				<!--Recorremos la lista de generos -->
					<?php foreach( $listaArticulos as $articulo ) { ?>
						<tr>
							<th scope='row'><?php echo $articulo['id']	?></th>
							<td>
								
								<p class='mb-1'><span class='font-weight-bold'><?php echo $articulo['titulo']; ?></span> <span class='text-muted'> - <?php echo $articulo['genero']; ?></span></p>
								<p class='font-italic mb-1'><?php echo $articulo['subtitulo']; ?></p>
							</td>
							<td class='text-center'><a href='<?php echo "./registro_articulo.php?id={$articulo['id']}"; ?>' class='btn btn-outline-primary mr-3'><i class='fas fa-edit'></i> Editar</a><button onclick="borrarRegistro(<?php echo $articulo['id']; ?>)" class='btn btn-outline-danger'><i class='fas fa-trash'></i> Borrar</button></td>
						</tr>	
					<?php }	?>


				</tbody>
			</table>
		</div>

		

	</div>


</body>