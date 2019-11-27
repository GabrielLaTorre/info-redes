<pre>
<?php
    
    require "../../backend/manejo_sesiones.php";

    //preguntamos si esta logeado
    if( $autor = estaLogueado() ){
        //hacer algo, la variable $autor tiene los datos del autor loguedo
        //descomentar la linea siguiente linea y saldran los datos en pantalla
        //print_r( $autor );
        
    }else{
        header ("location: index.php"); //te vas a login
        die();
    }


?>
</pre>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hola <?php echo $autor["nombre"]; ?>, bienvenid@ a tu zona de admistración</h1>
    <a href="logout.php">logout</a>
</body>
</html>