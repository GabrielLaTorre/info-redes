<?

include "conexion.php";

$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_DB);

if (!empty($_POST)) {

$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$subtitulo = $_POST['subtitulo'];
$idAutor = $_POST['idAutor'];
$idGenero = $_POST['idGenero'];
$fecha = date("Y-m-d H:i:s");

$dir_subida = '/opt/lampp/htdocs/Info-redes/info-redes/Diario/imagenes-noticias/';
$destino = $dir_subida . $_FILES['imagen']['name'];
move_uploaded_file($_FILES['imagen']['tmp_name'], $destino);

$sql3 = "INSERT INTO `articulo` (`id`, `titulo`, `contenido`, `imagen_1`, `autor_id`,`subtitulo`, `fecha`, `genero_id`, `activo`)
VALUES (NULL, '$titulo', '$contenido', '$destino', '$idAutor', '$subtitulo', '$fecha', '$idGenero', 1)";

$respuesta = mysqli_query($conexion, $sql3);

header("Location: noticias.php");


}

// Consulta listado autores
$sql = "SELECT id, nombre FROM autor WHERE borrado = 0";
$nombresAutor = mysqli_query($conexion, $sql);

// Consulta listado géneros
$sql2 = "SELECT id, nombre FROM genero";
$nombresGenero = mysqli_query($conexion, $sql2);

//Fecha formato para Argentina
date_default_timezone_set('America/Argentina/Buenos_Aires');
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
	<link rel="stylesheet" href="estilos.css">


</head>

<body>

<div class="img">
	<div class="container col-md-6 text-center">
		<form action="agregarNoticia.php" method="POST" enctype="multipart/form-data">
			  <div class="form-group">
			    <label for="titulo"><h3>Título de la noticia</h3></label>
			    <input type="input" class="form-control" id="titulo" name="titulo" placeholder="Ingrese aquí el título" required>
			  </div>
				<div class="form-group">
					<label for="subtitulo"><h3>Subtitulo de la noticia</h3></label>
					<input type="input" class="form-control" id="subtitulo"  name="subtitulo" maxlength="40" placeholder="Ingrese aquí el subtítulo" required>
				</div>
				<label for="idGenero"><h4>Seleccione género de la noticia</h4></label>
				<select class="form-control form-control-sm" id="idGenero" name='idGenero'>
					<?
					while 	($fila = mysqli_fetch_array($nombresGenero)) {
									$idGenero = $fila["id"];
									$nombreGenero = $fila["nombre"];
									echo "<option value='$idGenero'>$nombreGenero</option>";
									}
					?>
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
				<h4>Seleccione autor de la noticia</h4>
				<select class="form-control form-control-sm" name='idAutor'>
					<?
					while 	($fila = mysqli_fetch_array($nombresAutor)) {
									$idAutor = $fila["id"];
									$nombreAutor = $fila["nombre"];
					        echo "<option value='$idAutor'>$nombreAutor</option>";
									}
					?>
				</select>
					<hr>
				<div class="form-group">
						<? echo date("Y-m-d H:i:s")?>
						<button type="submit" class="btn btn-primary btn-lg btn-block">Subir noticia</button>
				</div>
		</form>
	</div>
</div>

<? /*
<script>
tinymce.init({
		selector: 'textarea#contenido',
		height: 500,
		menubar: false,
		plugins: [
				'advlist autolink lists link image charmap print preview anchor',
				'searchreplace visualblocks code fullscreen',
				'insertdatetime media table paste code help wordcount'
		],
		toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
		content_css: [
				'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
				'//www.tiny.cloud/css/codepen.min.css'
		]
});
</script>
*/
?>

</body>
</html>
