<?php
    //--
    //--
    //inicia la sesion del usuario que le pasas como parametro
    function iniciarSesion( $autor ){
        session_start();
        $_SESSION["login_ok"] = true;
        $_SESSION["autor"] = $autor[0];
    }


    //--
    //--
    //devuelve el autor si el usuario esta logueado o false si no lo esta
    function estaLogueado(){
        session_start();
        if( isset($_SESSION["login_ok"]) && $_SESSION["login_ok"] ){
            return $_SESSION["autor"]; //hacky para devolver solo el array de datos
        }
        
        return false;
    }


    //--
    //--
    // cerramos la sesion, LOGOUT
    function cerrarSesion(){
        session_start();
        $_SESSION["login_ok"] = false;
    }

?>