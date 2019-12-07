<?php
    require '../../backend/base_datos.php';

    ejecutarConsulta( 'UPDATE `usuario` SET `activo`= 1' );
    ejecutarConsulta( 'UPDATE `articulo` SET `activo`= 1' );
    ejecutarConsulta( 'UPDATE `genero` SET `activo`= 1' );

    header( 'location: main.php' );
?>