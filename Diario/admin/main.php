<?php
    
    require "../../backend/manejo_sesiones.php"; //para comprobar si esta logueado
    require "../../backend/articulos_crud.php"; //para traernos los articulos del autor logueado
    require "../../backend/autor_crud.php"; //para recuperar la imagen

    //--
    //--	
    //preguntamos si esta logeado
    if( $autor = estaLogueado() ){
        
        //si llegamos a esta pagina por POST se esta intentado 
        //hacer UPDATE a este autor o BORRAR una noticia
        //el borrado se maneja ASINCRONO
        if( !empty($_POST)){

            if( count($_POST)==1 ){
                deleteArticulo ( $_POST['id'] );
                die();
            }else{
                updateAutor( $_POST , $_FILES , '../imagenes/' );
            } 
                              
        }



        //Algunas variables de apollo
        $autor = getAutor($autor['id'])[0];
        $nombre = $autor['nombre'];
        $mis_articulos = getArticuloByAutor( $autor['id'] );
        $imagen = $autor['foto'];
  
    }else{
        header ("location: index.php"); //te vas a login
        die();
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>InforRedes | <?php echo $nombre ?></title>

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
        
   <?php include "navbar.html" ?> <!--INCLUIMOS EL NAVABAR-->

    <div class="container info-perfil">
        <div class="row">
            <div class="col-12 text-center mt-4">
                <div class="foto-perfil">
                    <img src="../imagenes/<?php echo $imagen?>" alt="cara" class="bd-placeholder-img rounded-circle"> <!--TODO: Hacer que salga la foto guardada en bbdd-->
                    <button type="button" class="btn btn-outline-secondary"  onclick="desplegarForm()"><i class="fas fa-user-edit"></i></button>
                </div>
                <h2 class="mt-2">Hola <?php echo $nombre?>!!</h2>
                <p>Bienvenido a tu zona de gestion, aqui podras administrar toda la información de InfoRedes usando la barra de navegación, pulsando "Reset" todos los registros volveran a aparecer.</p>
                <p><a class="btn btn-secondary" href="./registro_articulo.php" role="button">Agregar articulo</a></p>

            </div>
        </div>


        <!-- NOTICIAS DE ESTE AUTOR -->
    
        <div class="container">
            <div class="row">
                <h2>Tus articulos</h2>
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
                        <?php foreach( $mis_articulos as $articulo ) { ?>
                            <tr>
                                <th scope='row'><?php echo $articulo['id']	?></th>
                                <td>
                                    
                                    <p class='mb-1'><span class='font-weight-bold'><?php echo $articulo['titulo']; ?></span> <span class='text-muted'> - <?php echo $articulo['genero']; ?></span><?php if($articulo['activo']==0){ echo "<span class='text-muted'> - Inactiva </span>"; }?></p>
                                    <p class='font-italic mb-1'><?php echo $articulo['subtitulo']; ?></p>
                                </td>
                                <td class='text-center'><a href='<?php echo "./registro_articulo.php?id={$articulo['id']}"; ?>' class='btn btn-outline-primary mr-3'><i class='fas fa-edit'></i> Editar</a><button onclick="borrarRegistro(<?php echo $articulo['id']; ?>)" class='btn btn-outline-danger'><i class='fas fa-trash'></i> Borrar</button></td>
                            </tr>	
                        <?php }	?>
                    
                    </tbody>
                </table>
            </div>
        </div>



    </div>


    
	<div id="form-oculto" class="row cont-oculto oculto" >
		<form class="form-oculto col-4" method="post" enctype="multipart/form-data">
            <div class="d-flex justify-content-between border-bottom border-ligth pb-2">
                <h3>Modifica tu perfil</h3>
                <i class="fas fa-times text-muted" onclick="desplegarForm()"></i>
            </div>
			<div class="cont-inputs">
                <div class="form-group mt-4 mb-5 pr-2 pl-2">
                    <div class="foto-perfil mb-3">
                        <img src="../imagenes/<?php echo $imagen?>" alt="cara" class="img-edit border border-ligth" id="img-edit">
                        <label for="imagen"  class="input-img-edit btn btn-outline-secondary" id="input-img-edit"><i class="fas fa-camera"></i></label>
                        <input type="file" class="d-none" name="imagen" id="imagen" onchange="previewFile()"></button>
                    </div>
                    <label class="block" for="nombre">Editar tu nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $nombre ?>">
                    <input type="text" hidden name="id" value="<?php echo $autor['id'] ?>">
                </div>
                <div class="d-flex flex-row-reverse border-top border-ligth pt-3">
                    <button type="submit" class="btn btn-primary ">Añadir</button>
                    <span onclick="desplegarForm()" class="btn btn-outline-dark mr-2">Cancelar</span>
                </div>
            </div> 
		</form>
	</div>



   




    <!-- Cosas de bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>

</body>
</html>