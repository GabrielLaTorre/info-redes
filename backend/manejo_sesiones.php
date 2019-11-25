<?php
    //--
    //--
    //inicia la sesion del usuario que le pasas como parametro
    function iniciarSesion( $usuario ){
        session_start();
        $_SESSION["login_ok"] = true;
        $_SESSION["usuario"] = $usuario;
    }


    //--
    //--
    //devuelve el user_id si el usuario esta logueado o false si no lo esta
    function estaLogueado(){
        session_start();
        if( isset($_SESSION["login_ok"]) && $_SESSION["login_ok"] ){
            return $_SESSION["usuario"];
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