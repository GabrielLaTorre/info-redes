<?php

	require "../../backend/manejo_sesiones.php"; // para comprobar que esta logueado
  require "../../backend/articulos_crud.php"; //para manejar la tabla de articulos
  require "../../backend/genero_crud.php"; // para traernos la lista generos de la base de datos
	
	//--
  //si no estas logueado te vas a la pantalla de login
  if( !$autor = estaLogueado() ){ 
		header( 'location: index.php' );
		die();
	}


	//--
  //si la peticion llega por POST insertamos/editamos el articulo segun si trae o no id
  if ( !empty($_POST) ) { 

		if( isset($_POST['id']) ){ //AQUI EDITAMOS
			$conexion = getConexion();
			
			$id_noticia = $_POST['id'];
			$titulo = $_POST['titulo'];
			$subtitulo = $_POST['subtitulo'];
			$contenido = $_POST['contenido'];
			$genero_id = $_POST['genero_id'];
			$autor_id = $_POST['autor_id'];
			$img = $_FILES['imagen']['name'];

			if($img){
				$sql = "UPDATE `articulo` 
				SET `titulo`='$titulo',`contenido`='$contenido',`imagen_1`=$img,`autor_id`=$autor_id,`subtitulo`='$subtitulo',`genero_id`=$genero_id 
				WHERE `id`=$id_noticia";
				move_uploaded_file($_FILES['imagen']['tmp_name'],"../imagenes/$img");

			}else{
				$sql = "UPDATE `articulo` 
				SET `titulo`='$titulo',`contenido`='$contenido', `autor_id`=$autor_id,`subtitulo`='$subtitulo',`genero_id`=$genero_id 
				WHERE `id`=$id_noticia";
			
			}

			ejecutarConsulta($sql);

			header( 'location: listado_articulos.php' );
			die();

		}else{ //AQUI INSERTAMOS
			insertarArticulo( $_POST , $_FILES , "../imagenes/");
			header( 'location: index.php' );
			die();
		}

	}
	

	//--
  //si llega por GET es par editar la noticia que viene por id
  if( !empty($_GET) ){
		$editar=true;
		$id=$_GET['id'];
		$articulo = getArticulo( $id )[0];
		
		$titulo = $articulo['titulo'];
		$subtitulo = $articulo['subtitulo'];
		$contenido = $articulo['contenido'];
		$genero_id = $articulo['genero_id'];
  }


  //--
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
			<input type="input" <?php if($editar){ echo "value='$titulo'"; } ?> class="form-control" id="titulo" name="titulo" placeholder="Ingrese aquí el título" required>
			</div>
			<div class="col">
			<input type="input" <?php if($editar){ echo "value='$subtitulo'"; } ?> class="form-control" id="subtitulo"  name="subtitulo" maxlength="40" placeholder="Ingrese aquí el subtítulo" required>
			</div>
		</div>

			<label for="idGenero"><h5>Género</h5></label>
			<select class="form-control form-control-sm" id="idGenero" name='genero_id' <?php if($editar){ echo ""; } ?>>
				
				<?php
				foreach($nombresGenero as $fila) {
					$idGenero = $fila["id"];
					$nombreGenero = $fila["nombre"];
					
					$selecionado = $genero_id==$idGenero ? " selected='selected'" : "";

					echo "<option value='$idGenero' $selecionado >$nombreGenero</option>";
				}
				?>

        
			</select>
			
      <hr>
			<div class="form-group">
				<label for="contenido" ><h5>Contenido: </h5></label>
				<textarea class="form-control"  rows="4" cols="50" id="contenido" name="contenido" required><?php if($editar){ echo $contenido; } ?></textarea>

			</div>
			<hr>
			
      <div class="form-group">
				<label for="imagen-noticia"><i class="fa fa-image"></i> Imágen de la noticia </label> <i class="far fa-arrow-alt-circle-right"></i>
				<input type="file" name="imagen" class="form-control-file" id="imagen-noticia">
			</div>
			<div class="form-group">

					<input hidden name='autor_id' value='<?php echo $autor['id'] ?>' > <!-- AQUI PASAMOS EL AUTOR -->
					<?php if($editar){ echo "<input hidden name='id' value='$id' > "; } ?> <!-- AQUI PASAMOS EL id DEL ARTICULO -->

				<button title="Cargar noticia" type="submit" class="btn btn-primary btn-lg"><i class="fa fa-chevron-circle-right"></i></button>

			</div>
</form>
	</div>
</div>


</body>
</html>