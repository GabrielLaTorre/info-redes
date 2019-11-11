<?php
    //Credenciales
    define('HOST','localhost');
    define('USER','root');
    define('PWD','');
    define('DB','wm2019');

    
    //Obtener conexion
    $conexion = NULL;
    function getConnection()
    {
        global $conexion;

        if($conexion){
            return $conexion;
        }

        $conexion = mysqli_connect(HOST, USER, PWD, DB);
        mysqli_set_charset($conexion,"utf8");
        return $conexion;
    }



    //NOMBRE DE TABLAS
    define('TABLE_COMMENTS','comentarios');
    define('TABLE_NEWS','');
    define('TABLE_AUTHORS','');
    


    
?>