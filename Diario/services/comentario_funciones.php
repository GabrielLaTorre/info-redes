<?php

    require_once 'base_datos.php';  

    //-----       -----
    //   FUNCIONES

    //--
    //Traer todos los comentario, devuelve un array de varias filas
    function getAllComments( $noticia_id ){

        $conn = getConnection();
        $sql = "SELECT * FROM " . TABLE_COMMENTS . " WHERE noticia_id = {$noticia_id} ORDER BY id DESC";
        $response = mysqli_query($conn,$sql);

        return mysqli_fetch_all($response, MYSQLI_ASSOC);
    }


    //--
    //Traer solo el ultimo comentario
    function getLastComment( $noticia_id )
    {
        $conn = getConnection();
        $sql = "SELECT * FROM " . TABLE_COMMENTS . " WHERE noticia_id = {$noticia_id} ORDER BY id DESC LIMIT 1";
        $response = mysqli_query($conn,$sql);

        return mysqli_fetch_assoc($response);
    }


    //--
    //comentario debe ser una array con indices [ 'noticia_id' , 'nombre' , 'comentario' ]
    function insertComment( $arrayDatos )  
    {
        $noticia_id = $arrayDatos['noticia_id'];
        $nombre = $arrayDatos['nombre'];
        $comentario = $arrayDatos['comentario'];
        
        $conn = getConnection();
        $sql = "INSERT INTO " . TABLE_COMMENTS . "(`noticia_id`, `nombre`, `comentario`) VALUES (\" {$noticia_id} \", \" {$nombre} \",\" {$comentario} \" )";
        
        return mysqli_query($conn,$sql);
    }

?>

