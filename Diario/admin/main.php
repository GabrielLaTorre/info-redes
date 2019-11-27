<?php
    
    require "../../backend/manejo_sesiones.php";

    //preguntamos si esta logeado
    if( $autor = estaLogueado() ){
        //hacer algo, la variable $autor tiene los datos del autor loguedo
        //descomentar la linea siguiente linea y saldran los datos en pantalla
        //print_r( $autor );


        //Algunas variables de apollo
        $nombre = $autor['nombre'];


        
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
        
    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
        <a class="navbar-brand" href="#">InfoRedes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Mi perfil <span class="sr-only">(current)</span></a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#">Articulos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Generos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Autores</a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0" action="logout.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </div>

    </nav>

    <div class="container info-perfil">
        <div class="row">
            <div class="col-12 text-center mt-4">
                <div class="foto-perfil">
                    <img src="../imagenes/cara-1.jpg" alt="cara" class="bd-placeholder-img rounded-circle"> <!--TODO: Hacer que salga la foto guardada en bbdd-->
                    <button type="button" class="btn btn-outline-secondary"><i class="fas fa-user-edit"></i></button>
                </div>
                <h2 class="mt-2">Hola <?php echo $nombre?>!!</h2>
                <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>

            </div>
        </div><!-- /.row -->
    </div>

    <!-- START THE FEATURETTES -->

    



    <h1>Hola <?php echo $nombre?>!!</h1>
    <h2>Bienvenido a tu zona de usuario</h2>

    <!-- Cosas de bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>

</body>
</html>