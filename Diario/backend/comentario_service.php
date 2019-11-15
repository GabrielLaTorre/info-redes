<?php
    //Primero manejamos las peticiones, al final del documento estan las funciones
    // --
    // --

    require 'comentario_funciones.php';  
 
    //POST: si la peticion viene por POST el cliente esta intentando guardar un nuevo comentario.
    //      si la peticion viene con todos los datos devolvemos un HTML con el ultimo registro
    //      guardado. Si esta incompleta NULL
    if(isset($_POST))
    {
        
        //validamos que esten todos los datos
        if( !( isset($_POST['noticia_id']) &&
               isset($_POST['nombre'])     &&
               isset($_POST['comentario']) )){
            
                echo NULL;
                die(); //no devolvemos nada
        }
        
        insertComment($_POST); //insertamos en la base de datos el comentario
        $comentario =  getLastComment($_POST['noticia_id']);

        echo "
                <img class='avatar' src='imagenes/anon.png' title='Usuario anónimo' alt='logo-header'>
                <div>
                    <p class='nombre-comentario'> {$comentario['nombre']} </p>
                    <p> {$comentario['comentario']} </p>
                    <small>Hace 2 horas</small>
                </div>
            ";

        die();
    }






?>

