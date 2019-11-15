<?php
    //Credenciales
    define('HOST','localhost');
    define('USER','root');
    define('PWD','');
    define('DB','wm2019');

    define('TABLE_COMMENTS','comentarios');
    define('TABLE_NEWS','articulo');
    define('TABLE_AUTHORS','autor');
    
    //Obtener conexion
    $conexion = NULL;
    function getConexion()
    {
        global $conexion;

        if($conexion){
            return $conexion;
        }

        $conexion = mysqli_connect(HOST, USER, PWD, DB);
        mysqli_set_charset($conexion,"utf8");
        return $conexion;
    }

    //ejecutar una consulta
    function ejecutarConsulta($sql){
        $conexion = getConexion();
        $response = mysqli_query($conexion,$sql);

        return mysqli_fetch_all($response, MYSQLI_ASSOC);
    }

    
?>