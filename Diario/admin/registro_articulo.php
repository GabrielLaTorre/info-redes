<?php

	require "../../backend/manejo_sesiones.php"; // para comprobar que esta logueado
  require "../../backend/articulos_crud.php"; //para manejar la tabla de articulos
  require "../../backend/genero_crud.php"; // para traernos la lista generos de la base de datos
	

  //si no estas logueado te vas a la pantalla de login
  if( !$autor = estaLogueado() ){ 
		header( 'location: index.html' );
		die();
	}

  //si la peticion llega por POST guardamos el articulo
  if ( !empty($_POST) ) { 
      $articulo = insertarArticulo( $_POST , $_FILES );
      var_dump($articulo);
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

<?php include "./componentes/navbar.html"; ?> <!--INCLUIMOS EL NAVABAR-->

<div class="img">
	<div class="container col-md-6 text-center">
		<form  method="POST" enctype="multipart/form-data">
			  
      <div class="form-group">
        <label for="titulo"><h3>Título de la noticia</h3></label>
        <input type="input" class="form-control" id="titulo" name="titulo" placeholder="Ingrese aquí el título" required>
      </div>
				
			<div class="form-group">
				<label for="subtitulo"><h3>Subtitulo de la noticia</h3></label>
				<input type="input" class="form-control" id="subtitulo"  name="subtitulo" maxlength="40" placeholder="Ingrese aquí el subtítulo" required>
			</div>
			
			<label for="idGenero"><h4>Seleccione género de la noticia</h4></label>
			<select class="form-control form-control-sm" id="idGenero" name='genero_id'>
				
				<?php
				foreach($nombresGenero as $fila) {
					$idGenero = $fila["id"];
					$nombreGenero = $fila["nombre"];
					echo "<option value='$idGenero'>$nombreGenero</option>";
				}
				?>

        <option>+ Agregar nuevo genero</option> <!--TODO: implementar un banner flotante con JS-->

			</select>
			
      <hr>
			<div class="form-group">
				<label for="contenido"><h3>Contenido de la noticia:</h3></label>
				<textarea class="form-control" rows="4" cols="50" id="contenido" name="contenido" required></textarea>

			</div>
			<hr>
			
      <div class="form-group">
				<label for="imagen-noticia">Seleccione imágen de la noticia</label>
				<input type="file" name="imagen" class="form-control-file" id="imagen-noticia">
			</div>
			<hr>
			
			<input hidden name='autor_id' value='<?php echo $autor['id'] ?>' > <!-- AQUI PASAMOS EL AUTOR -->
			
			<div class="form-group">
					<button type="submit" class="btn btn-primary btn-lg btn-block">Subir noticia</button>
			</div>

		</form>
	</div>
</div>




</body>
</html>