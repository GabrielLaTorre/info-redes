<?php 

    //Operaciones CREATE, READ, UPDATE y DELETE para la tabla de 'articulo'
    require_once 'base_datos.php';

    //CAMPOS: `id`, `titulo`, `contenido`, `imagen_1`, `autor_id`, 
    //           `subtitulo`, `fecha`, `genero_id`, `activo`


    //--
    //--
    // trae los articulos de la base de datos
    // si no se le pasa id, trae todas los articulos
    function getArticulo( $id=NULL ){
        $where = "";
        if($id){
            $where = " WHERE id = '{$id}'";    
        }
        $sql = "SELECT * FROM articulo" . $where;
        
        return ejecutarConsulta($sql);
    }


    //--
    //--
    //inserta una nueva articulo en la base de datos
    //recibe un array con los datos a insertar
    //si la pudo insertar devuelve un array con el articulo
    //si no devuelve false
    function insertarArticulo( $arrayArticulo , $arrayFiles ){
        
        $titulo  = $arrayArticulo['titulo'];    
        $contenido  = $arrayArticulo['contenido'];
        $autor_id  = $arrayArticulo['autor_id'];
        $subtitulo  = $arrayArticulo['subtitulo'];
        $genero_id  = $arrayArticulo['genero_id'];
        $activo = 1;

        //manejo de la imagen
        $dir_subida = $_SERVER['DOCUMENT_ROOT'] . '/info-redes/imagenes_noticias/';
        $imagen_1 = $dir_subida . $arrayFiles['imagen']['name'];
        if( !move_uploaded_file($arrayFiles['imagen']['tmp_name'], $imagen_1) ){
            $imagen_1 = NULL; //TODO: imagen por defecto o algo
        }

        $sql = "INSERT INTO articulo 
                ( `titulo`, `contenido`, `imagen_1`, `autor_id`,`subtitulo`, `genero_id`, `activo` )
                VALUES 
                ( '{$titulo}' , '{$contenido}' , '{$imagen_1}' , '{$autor_id}' , '{$subtitulo}' , '{$genero_id}' , {$activo})"; 
        
        if( $id = ejecutarConsulta($sql) ){ 
            return getArticulo( $id );
        }
 
        return false;

    }


    //--
    //--
    //actualiza un articulo en la base de datos
    //recibe un array con los datos a actualizar
    //si lo pudo actualizar, devuelve un array con el articulo
    //si no devuelve false
    function updateArticulo( $arrayArticulo ){

    }


    //--
    //--
    //Borra la noticia que se le pasa por parametro
    //recibe el id de la noticia a borrar
    //devuelve true/false
    //implementar borrado logico
    function deleteArticulo( $id ){

    }


?>