<?php
	
	require "../../backend/manejo_sesiones.php"; // para comprobar que esta logueado
  require "../../backend/articulos_crud.php"; //para manejar la tabla de articulos

  //si no estas logueado te vas a la pantalla de login
  if( !$autor = estaLogueado() ){ 
    header( 'location: index.html' );
    die();
	}
	
	//recuperamos todas los articulos
	$todosArticulos = getArticulo();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>InforRedes | <?php echo $nombre ?></title>

    <link rel="stylesheet" href="estilos.css">

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


    <!-- Cosas de bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">

</head>
<body>

    <?php include "navbar.html" ?> <!--INCLUIMOS EL NAVABAR-->


		<h1>Listado de todos los articulos (hay que hacerlo mas lindo)</h1>

		<!--TODO: poner un lindo boton, lo dejo como un link por ahora-->
		<a href="registro_articulo.php">Registrar nueva noticia (este enlace hay que hacerlo mas lindo)</a>

		<?php
				//TODO: trabajar esta vista, debe incluir botones de edita|borrar

				//iteramos sobre los articulos
				foreach( $todosArticulos as $articulo ){  
					//en este punto $articulo contiene una fila con los datos de un articulo
					echo "<pre>";
					print_r($articulo);
					echo "</pre>";
				}
		?>


</body>