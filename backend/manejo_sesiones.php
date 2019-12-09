<?php

    session_start();

    //--
    //--
    //inicia la sesion del usuario que le pasas como parametro
    function iniciarSesion( $autor ){
        
        $_SESSION["login_ok"] = true;
        $_SESSION["autor"] = $autor[0];
    }


    //--
    //--|
    //devuelve el autor si el usuario esta logueado o false si no lo esta
    function estaLogueado(){
        
        if( isset($_SESSION["login_ok"]) && $_SESSION["login_ok"] ){
            return $_SESSION["autor"]; //hacky para devolver solo el array de datos
        }
        
        return false;
    }


    //--
    //--|
    // cerramos la sesion, LOGOUT
    function cerrarSesion(){
        
        $_SESSION["login_ok"] = false;
    }

?>