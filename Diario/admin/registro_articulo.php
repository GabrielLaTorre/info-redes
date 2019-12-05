<?php

 require "../../backend/manejo_sesiones.php"; // para comprobar que esta logueado
  require "../../backend/articulos_crud.php"; //para manejar la tabla de articulos
  require "../../backend/genero_crud.php"; // para traernos la lista generos de la base de datos
	

  //si no estas logueado te vas a la pantalla de login
  if( !$autor = estaLogueado() ){ 
		header( 'location: index.php' );
		die();
	}

  //si la peticion llega por POST guardamos el articulo
  if ( !empty($_POST) ) { 
	  insertarArticulo( $_POST , $_FILES , "../imagenes/");
	  header( 'location: index.php' );
    die();
  }

  //si llega por GET es par editar la noticia que viene por id
  if( !empty($_GET) ){
		print_r($_GET);
  }

  
  // Consulta listado géneros, la funcion devuelve la lista completa
  $nombresGenero = getGenero();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar nueva Noticia</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.0.16/tinymce.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

<style>
h5, img {
	margin-top: 10px;
}
</style>

<?php include "navbar.html"; ?> <!--INCLUIMOS EL NAVABAR-->


<div class="img">

	<div class="container col-md-5 text-center">
	
	<img src="../imagenes/icono-noticia.png" alt="icono-noticia"><h1>Agregar nueva noticia</h1>

	<form method="POST" enctype="multipart/form-data">
		<div class="form-row">
			<div class="col">
			<input type="input" class="form-control" id="titulo" name="titulo" placeholder="Ingrese aquí el título" required>
			</div>
			<div class="col">
			<input type="input" class="form-control" id="subtitulo"  name="subtitulo" maxlength="40" placeholder="Ingrese aquí el subtítulo" required>
			</div>
		</div>

			<label for="idGenero"><h5>Género</h5></label>
			<select class="form-control form-control-sm" id="idGenero" name='genero_id'>
				
				<?php
				foreach($nombresGenero as $fila) {
					$idGenero = $fila["id"];
					$nombreGenero = $fila["nombre"];
					echo "<option value='$idGenero'>$nombreGenero</option>";
				}
				?>

        
			</select>
			
      <hr>
			<div class="form-group">
				<label for="contenido" ><h5>Contenido: </h5></label>
				<textarea class="form-control" rows="4" cols="50" id="contenido" name="contenido" required></textarea>

			</div>
			<hr>
			
      <div class="form-group">
				<label for="imagen-noticia"><i class="fa fa-image"></i> Imágen de la noticia </label> <i class="far fa-arrow-alt-circle-right"></i>
				<input type="file" name="imagen" class="form-control-file" id="imagen-noticia">
			</div>
			<div class="form-group">

					<input hidden name='autor_id' value='<?php echo $autor['id'] ?>' > <!-- AQUI PASAMOS EL AUTOR -->


				<button title="Cargar noticia" type="submit" class="btn btn-primary btn-lg"><i class="fa fa-chevron-circle-right"></i></button>

			</div>
</form>
	</div>
</div>


</body>
</html>