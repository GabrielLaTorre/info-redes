<head>
	<meta charset="UTF-8">
	<title>Noticias diarios</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="estilos.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

<p class="text-center"><b>Agregar, modificar y/o borrar una noticia</b></p>

<div class="table-responsive">
	<table class="table table-bordered table table-hover table-info">
		<thead>
			<tr>
				<th scope="col">#</th>
			  <th scope="col">Título</th>
			  <th scope="col">Contenido</th>
			  <th scope="col">Imagen</th>
			  <th scope="col">Autor</th>
			  <th scope="col">Subtitulo</th>
			  <th scope="col">Fecha</th>
			  <th scope="col">Genero</th>
			  <th scope="col">Acción</th>
			</tr>
		</thead>
	<?php require_once "mostrarNoticias.php";?>
	</table>
</div>

<form action="agregarNoticia.php" method="POST">
	<button type="submit button" class="btn btn-info">Agregar nueva noticia</button>
</form>

</body>
</html>
