<?php

require "../backend/base_datos.php";

    

    $titulo = addslashes ( $_POST['titulo'] );
    $subtitulo = addslashes ($_POST['subtitulo'] );
    $contenido  = addslashes ($_POST['contenido'] );
    $genero_id = $_POST['genero_id'];
    $autor_id = $_POST['autor_id'];
    $img = $_POST['imagen'];


    $sql = "INSERT INTO articulo 
                ( `titulo`, `contenido`, `imagen_1`, `autor_id`,`subtitulo`, `genero_id`, `activo` )
                VALUES 
                ( '$titulo' , '$contenido' , '$img' , '$autor_id' , '$subtitulo' , '$genero_id' , 1)"; 

    echo ejecutarConsulta($sql);
?>
