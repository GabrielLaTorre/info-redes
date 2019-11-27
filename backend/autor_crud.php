<?php 

    require_once 'base_datos.php';

    //--
    //--
    //Obtener los autores de la base de datos, 
    //si no se pasa $id regresa toda la tabla
    function getAutor($id=NULL)
    {
        $where = "";
        if($id){
            $where = " WHERE id = '{$id}'";    
        }
        $sql = "SELECT * FROM autor" . $where;
        
        return ejecutarConsulta($sql);
    }



    //--
    //--
    //Obtener autor de la base de datos filtrado por el campo `usuario_id`
    function getAutorByUsuarioID( $usuario_id )
    {
        $sql = "SELECT * FROM autor  WHERE usuario_id = '{$usuario_id}' ";
        
        return ejecutarConsulta($sql);
    }

    


    //--
    //--
    //insertar autor,
    //devuelve el autor insertado
    function registrarAutor( $usuario_id , $nombre )
    { 
       $sql = "INSERT INTO autor ( nombre , usuario_id) VALUES ( '{$nombre}' , '{$usuario_id}' )"; 
       
       if( $id = ejecutarConsulta($sql) ){ 
           return getAutor($id);
       }

       return false;
    }
    

    //updatear autor, se le pasa un array que contenga los valores, 
    //devuelve el autor modificado
    function updateAutor($arrayAutor){

    }

    //borrado de un autor, 
    //devuelve true o false
    function deleteAutor($id){

    }


?>