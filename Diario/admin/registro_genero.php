<?php

 require "../../backend/manejo_sesiones.php"; // para comprobar que esta logueado
 require "../../backend/genero_crud.php"; //para manejar la tabla de generos
 require "../../backend/articulos_crud.php"; //para contar cuantas noticias por genero
 	

  //si no estas logueado te vas a la pantalla de login
  if( !$autor = estaLogueado() ){ 
		header( 'location: index.html' );
		die();
	}



	//si llega por POST insertamos / editamos / borramos el genero
	//el borrado se gestiona con un ASINCRONO
	if( !empty($_POST) ){
		
		if( !isset($_POST['id']) ){
			registrarGenero($_POST);

		}else if( isset($_POST['id']) && !isset($_POST['nombre'])){
			deleteGenero($_POST['id']);
			die; //no queremos devolver la pagina, la peticion viene asincronamente

		}else{
			updateGenero($_POST);
			
		}

	}



	//si llegamos por GET retornamos el JSON con los datos
	//del id que recibimos
	if( isset($_GET['id']) ){
		$id = $_GET['id'];
		$jsonGenero = json_encode( getGenero($id) , JSON_UNESCAPED_UNICODE);
		die( $jsonGenero );
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

	<!--Libreria Axios-->
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

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
		<button class="btn btn-primary" onclick="desplegarForm()"><i class="fas fa-plus-circle"></i> Agregar nueva</button>
		
		<form class = "invisible">
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
				<th scope="col" class="text-center">Cant. articulos</th>
				<th scope="col " >
					
				</th>
				</tr>
			</thead>
			<tbody>
			<!--Recorremos la lista de generos -->
				
			<?php foreach( $listaGeneros as $genero ) {?>
							  <tr>
								<th scope='row'><?php echo $genero['id']; ?></th>
								<td><?php echo $genero['nombre']; ?></td>
								<td class="text-center"><?php echo count( getArticuloByGenero($genero["id"]) ) ?></td>
								<td class='text-center'>
									<button onclick='pedirJson(<?php echo $genero["id"]; ?>)' class='btn btn-outline-primary mr-3'><i class='fas fa-edit'></i> Editar</button>
									<button onclick='borrarRegistro(<?php echo $genero["id"]; ?>)' class='btn btn-outline-danger'><i class='fas fa-trash'></i> Borrar</button></td>
								</tr>

			<?php	}	?>

			</tbody>
		</table>
	</div>

	<div id="form-oculto" class="row cont-oculto oculto" >
		<form class="form-oculto col-4" method="post" enctype="multipart/form-data">
            <div class="d-flex justify-content-between border-bottom border-ligth pb-2">
                <h3>Datos genero</h3>
                <i class="fas fa-times text-muted" onclick="resetarCamposGenero()"></i>
            </div>
			<div class="cont-inputs">
                <div class="form-group mt-4 mb-5 pr-2 pl-2">
                    <label class="block" for="nombre">Nombre de genero</label>
                    <input type="text" name="nombre" id="nombre" class="form-control">
					<input type="text" hidden id="comodin">
                </div>
                <div class="d-flex flex-row-reverse border-top border-ligth pt-3">
                    <button type="submit" class="btn btn-primary ">Listo</button>
                    <span onclick="resetarCamposGenero()" class="btn btn-outline-dark mr-2">Cancelar</span>
                </div>
            </div> 
		</form>
	</div>


</div>




</body>
</html>