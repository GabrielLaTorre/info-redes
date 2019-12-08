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
        $where_id = "1";
        if($id){
            $where_id = "articulo.id = $id";    
        }
        
        $sql =  "SELECT articulo.id, articulo.titulo, articulo.contenido, articulo.imagen_1, articulo.genero_id, articulo.subtitulo, articulo.fecha, autor.nombre autor, genero.nombre genero, articulo.autor_id 
                from articulo
                inner join autor on autor_id=autor.id
                inner join genero on genero_id=genero.id  WHERE articulo.activo=1 AND $where_id 
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
    function updateArticulo( $arrayArticulo , $arrayFiles , $ruta_subida ){
        
			$id_noticia = $arrayArticulo['id'];
			$titulo = $arrayArticulo['titulo'];
			$subtitulo = $arrayArticulo['subtitulo'];
			$contenido = $arrayArticulo['contenido'];
			$genero_id = $arrayArticulo['genero_id'];
			$autor_id = $arrayArticulo['autor_id'];
			$img = $arrayFiles['imagen']['name'];

			if($img){
				$sql = "UPDATE `articulo` 
				SET `titulo`='$titulo',`contenido`='$contenido',`imagen_1`='$img',`autor_id`=$autor_id,`subtitulo`='$subtitulo',`genero_id`=$genero_id 
				WHERE `id`=$id_noticia";
				move_uploaded_file($arrayFiles['imagen']['tmp_name'],$ruta_subida.$img);

			}else{
				$sql = "UPDATE `articulo` 
				SET `titulo`='$titulo',`contenido`='$contenido', `autor_id`=$autor_id,`subtitulo`='$subtitulo',`genero_id`=$genero_id 
				WHERE `id`=$id_noticia";
			
			}
            
			ejecutarConsulta($sql);
     

    }


    //--
    //--
    //Borra la noticia que se le pasa por parametro
    //recibe el id de la noticia a borrar
    //devuelve true/false
    //implementar borrado logico
    function deleteArticulo( $id ){
        $sql = "UPDATE `articulo` SET `activo`= 0 WHERE `id`= $id";
        ejecutarConsulta($sql);
    }

    //--
    //--
    //devuelve las noticias por un autor especifico
    //recibe el id del autor
    function getArticuloByAutor( $autor_id ){
        
        if( $autor_id == NULL) return false; // no pasa id devuelve false;

        $sql =  "SELECT articulo.id, articulo.titulo, articulo.contenido, articulo.imagen_1, articulo.subtitulo, articulo.fecha, articulo.autor_id, autor.nombre autor, genero.nombre genero, articulo.activo 
        from articulo
        inner join autor on autor_id=autor.id
        inner join genero on genero_id=genero.id   WHERE articulo.autor_id = $autor_id ORDER BY `articulo`.`id` DESC";
        
        return ejecutarConsulta($sql);

    }


    //--
    //--
    //devuelve las noticias por un autor especifico
    //recibe el id del autor
    function getArticuloByGenero( $genero_id ){
        
        if( $genero_id == NULL) return false; // no pasa id devuelve false;

        $sql =  "SELECT articulo.id, articulo.titulo, articulo.contenido, articulo.imagen_1, articulo.subtitulo, articulo.fecha, articulo.autor_id, autor.nombre autor, genero.nombre genero, articulo.activo 
        from articulo
        inner join autor on autor_id=autor.id
        inner join genero on genero_id=genero.id   WHERE articulo.genero_id = $genero_id ORDER BY `articulo`.`id` DESC";
        
        return ejecutarConsulta($sql);

    }



?>