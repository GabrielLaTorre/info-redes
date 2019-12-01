<?php 

    //Operaciones CREATE, READ, UPDATE y DELETE para la tabla de 'genero'
    require_once 'base_datos.php';

    //CAMPOS: `id`, `nombre`


    //--
    //--
    // trae los articulos de la base de datos
    // si no se le pasa id, trae todas los articulos
    function getGenero( $id=NULL ){
        $where = "";
        if($id){
            $where = " WHERE id = '{$id}'";    
        }
        $sql = "SELECT genero.* FROM genero" . $where;
        
        return ejecutarConsulta($sql);
    }

?>