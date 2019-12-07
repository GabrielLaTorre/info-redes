<?php
    require_once "base_datos.php";

    // ----
    // ----
    //Si el usuario pasado por parametros existe lo devuelve, si no devuelve false
    function getUsuario($username , $pwd){
       
        $conexion = getConexion();
        $sql = "select * from usuario
                        WHERE username='$username'
                        and activo =1";

        $respuesta = mysqli_query($conexion, $sql); 
        if( !$respuesta ){
            return false;  // no existe usuario
        }

        $usuario = mysqli_fetch_array($respuesta);
        if( !password_verify( $pwd , $usuario['pwd'] ) ){
            return false;  // no coincide la contraseña
        }

        return $usuario;  // todo ok!!!
    }

    

    // ----
    // ----
    // Registro seguro de usuario, regresa true/false dependiendo si se pudo registrar o no
    function registrarUsuario( $username , $pwd ){
        
        $conexion =getConexion();
        $pwd_encriptado = password_hash( $pwd , PASSWORD_BCRYPT) ;

        $sql = "INSERT INTO usuario 
                (username , pwd , activo)
                VALUES 
                ( '$username' , '$pwd_encriptado' , 1 ) ";
        
        
        if ( mysqli_query( $conexion , $sql ) ){
            return getUsuario( $username , $pwd ); //todo ok, retornamos el usuario
        }

        return false;
    }



    //--
    //--
    // borramos un genero de la base de datos
    function deleteUsuario( $id ){

        $sql = "UPDATE `usuario` SET `activo`= 0 WHERE `id`= $id";
    
        return ejecutarConsulta($sql);
        
    }



?>