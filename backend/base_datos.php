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
        }else{
            $conexion = mysqli_connect(HOST, USER, PWD, DB);
            mysqli_set_charset($conexion,"utf8");
            return $conexion;
        }
        
    }

    //--
    //--
    //ejecutar una consulta
    //devuelve false si no se pudo ejecurtar
    //si es INSERT o UPDATE devuelve el id del registro
    //si es SELECT devuelve los registros
    function ejecutarConsulta($sql){
        $conexion = getConexion(); 
        $response = mysqli_query($conexion,$sql);

        if(!$response){
            return false;
        }

        $tipo_sql = substr( $sql , 0 , 6); 
        if( $tipo_sql=="INSERT" || $tipo_sql=="UPDATE" ){
            return mysqli_insert_id( $conexion );
        
        }else{ 
           $array_result =  mysqli_fetch_all($response, MYSQLI_ASSOC);

           if( count($array_result) == 1 ){
               return $array_result[0];
           }else{
               return $array_result;
           }
           
        }
        
        
    }

    
?>