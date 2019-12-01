<?php

 require "../../backend/manejo_sesiones.php"; // para comprobar que esta logueado
 require "../../backend/autor_crud.php"; //para manejar la tabla de autores

 	

  //si no estas logueado te vas a la pantalla de login
  if( !$autor = estaLogueado() ){ 
		header( 'location: index.html' );
		die();
	}

	//lista completa de autores
	$listadoAutores = getAutor();


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

	<?php include "navbar.html"; ?> <!--INCLUIMOS EL NAVABAR-->
	<h1>Zona de gestion de autor</h1>


	<?php 
		foreach( $listadoAutores as $autor){
			echo "<pre>";
			print_r($autor);
			echo "</pre>";
		}
	?>


</body>
</html>