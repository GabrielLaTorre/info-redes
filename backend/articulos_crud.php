<?php 

    //Operaciones CREATE, READ, UPDATE y DELETE para la tabla de 'articulo'
    require_once 'base_datos.php';

    //CAMPOS: `id`, `titulo`, `contenido`, `imagen_1`, `autor_id`, 
    //           `subtitulo`, `fecha`, `genero_id`, `activo`


    //--
    //--
    // trae los articulos de la base de datos
    // si no se le pasa id, trae todas los articulos
    function getArticulo( $id=NULL){
        $where = "";
        if($id){
            $where = " WHERE articulo.id = $id";    
        }
        
        $sql =  "SELECT articulo.id, articulo.titulo, articulo.contenido, articulo.imagen_1, articulo.genero_id, articulo.subtitulo, articulo.fecha, autor.nombre autor, genero.nombre genero 
                from articulo
                inner join autor on autor_id=autor.id
                inner join genero on genero_id=genero.id $where 
                ORDER BY `articulo`.`id` DESC";
        
        return ejecutarConsulta($sql);
    }


    //--
    //--
    //inserta una nueva articulo en la base de datos
    //recibe un array con los datos a insertar
    //si la pudo insertar devuelve un array con el articulo
    //si no devuelve false
    function insertarArticulo( $arrayArticulo , $arrayFiles , $ruta_subida ){
        
        $titulo  = $arrayArticulo['titulo'];    
        $contenido  = $arrayArticulo['contenido'];
        $autor_id  = $arrayArticulo['autor_id'];
        $subtitulo  = $arrayArticulo['subtitulo'];
        $genero_id  = $arrayArticulo['genero_id'];
        $activo = 1;

        //manejo de la imagen
        $imagen_1 =  $arrayFiles['imagen']['name'];
        if( !move_uploaded_file($arrayFiles['imagen']['tmp_name'], $ruta_subida . $imagen_1) ){
            $imagen_1 = "NULL"; 
        }

        $sql = "INSERT INTO articulo 
                ( `titulo`, `contenido`, `imagen_1`, `autor_id`,`subtitulo`, `genero_id`, `activo` )
                VALUES 
                ( '{$titulo}' , '{$contenido}' , '{$imagen_1}' , '{$autor_id}' , '{$subtitulo}' , '{$genero_id}' , {$activo})"; 
        
        if( $id = ejecutarConsulta($sql) ){ 
            return getArticulo( $id );
        }else{
            return false;
        }
 
        

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

    //--
    //--
    //devuelve las noticias por un autor especifico
    //recibe el id del autor
    function getArticuloByAutor( $autor_id ){
        
        if( $autor_id == NULL) return false; // no pasa id devuelve false;

        $sql =  "SELECT articulo.id, articulo.titulo, articulo.contenido, articulo.imagen_1, articulo.subtitulo, articulo.fecha, autor.nombre autor, genero.nombre genero 
        from articulo
        inner join autor on autor_id=autor.id
        inner join genero on genero_id=genero.id   WHERE articulo.autor_id = $autor_id ORDER BY `articulo`.`id` DESC";
        
        return ejecutarConsulta($sql);

    }


?>