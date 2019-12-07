<?php 

    //Operaciones CREATE, READ, UPDATE y DELETE para la tabla de 'genero'
    require_once 'base_datos.php';

    //CAMPOS: `id`, `nombre`


    //--
    //--
    // trae los generos de la base de datos
    // si no se le pasa id, trae todas los articulos
    function getGenero( $id=NULL ){
        $where_id = "1";
        if($id){
            $where_id = "id = '{$id}'";    
        }
        $sql = "SELECT genero.* FROM genero WHERE activo = 1 AND $where_id";
        
        return ejecutarConsulta($sql);
    }


     //--
    //--
    // inserta un genero de la base de datos
    function registrarGenero( $arrayGenero ){

			$nombre =  $arrayGenero['nombre'];
			$sql = "INSERT INTO `genero`( `nombre`, `activo`) VALUES ( '$nombre' , 1 )";
      
      return ejecutarConsulta($sql);
		}
		

		//--
    //--
    // borramos un genero de la base de datos
    function deleteGenero( $id ){

			$sql = "UPDATE `genero` SET `activo`= 0 WHERE `id`= $id";
      
			return ejecutarConsulta($sql);
			
		}

?>