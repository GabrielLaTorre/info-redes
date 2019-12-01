<?php
    
    require "../../backend/manejo_sesiones.php"; //para comprobar si esta logueado
    require "../../backend/articulos_crud.php"; //para traernos los articulos del autor logueado

		
    //preguntamos si esta logeado
    if( $autor = estaLogueado() ){
        //hacer algo, la variable $autor tiene los datos del autor loguedo
        //descomentar la linea siguiente linea y saldran los datos en pantalla
        //print_r( $autor );

        //Algunas variables de apollo
        $nombre = $autor['nombre'];
        $mis_articulos = getArticuloByAutor( $autor['id'] );

        
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
                    <img src="../imagenes/cara-1.jpg" alt="cara" class="bd-placeholder-img rounded-circle"> <!--TODO: Hacer que salga la foto guardada en bbdd-->
                    <button type="button" class="btn btn-outline-secondary"><i class="fas fa-user-edit"></i></button>
                </div>
                <h2 class="mt-2">Hola <?php echo $nombre?>!!</h2>
                <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                <p><a class="btn btn-secondary" href="./registro_articulo.php" role="button">Agregar articulo</a></p>

            </div>
        </div>


        <!-- NOTICIAS DE ESTE AUTOR -->
        <!-- TODO: poner esto en una tabla bonita -->

        <?php
            //iteramos sobre los articulos de este autor
            foreach( $mis_articulos as $articulo ){  
                    //en este punto $articulo contiene una fila con los datos de un articulo
                    echo "<pre>";
                    print_r($articulo);
                    echo "</pre>";
            }
        ?>



    </div>



   




    <!-- Cosas de bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>

</body>
</html>