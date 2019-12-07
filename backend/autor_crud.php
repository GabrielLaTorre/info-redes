<?php 

    require_once 'base_datos.php';

    //--
    //--
    //Obtener los autores de la base de datos, 
    //si no se pasa $id regresa toda la tabla
    function getAutor($id=NULL)
    {
        $where_id = "1";
        if($id){
            $where_id = "autor.id = $id";    
        }
        $sql = "SELECT autor.*, usuario.username as username 
                FROM autor INNER JOIN usuario
                ON autor.usuario_id = usuario.id  WHERE usuario.activo = 1 AND $where_id";
        
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
       $sql = "INSERT INTO autor ( nombre , usuario_id , foto ) VALUES ( '{$nombre}' , '{$usuario_id}' , 'perfil_default.png' )"; 
       
       if( $id = ejecutarConsulta($sql) ){ 
		return getAutor($id);
       }else{
        return false;
       }
    }
    

    //updatear autor, se le pasa un array que contenga los valores, 
    //devuelve el autor modificado
    function updateAutor( $arrayAutor , $arrayFiles , $ruta_subida ){
        $nom =  $arrayAutor['nombre'];
        $img =  $arrayFiles['imagen']['name'];
        $id = $arrayAutor['id'];
        if($img){
            $sql = "UPDATE `autor` SET `nombre`='$nom',`foto`='$img' WHERE `id`=$id";
            move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta_subida . $img);
        } else {
            $sql = "UPDATE `autor` SET `nombre`='$nom' WHERE `id`=$id";
        }
        
        ejecutarConsulta($sql);
    }

    //borrado de un autor, 
    //devuelve true o false
    function deleteAutor($id){

    }


?>