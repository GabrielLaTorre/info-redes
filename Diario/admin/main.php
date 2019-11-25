<?php
    
    require "../../backend/manejo_sesiones.php";

    //preguntamos si esta logeado
    if( $usuario = estaLogueado() ){
        //hacer algo, la variable $usuario tiene los datos del usuario loguedo
        //descomentar la linea siguiente si hay dudas.
        //var_dump( $usuario );
        
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
    <title>Document</title>
</head>
<body>
    <h1>Zona de Usuario Registrado</h1>
    <a href="logout.php">logout</a>
</body>
</html>