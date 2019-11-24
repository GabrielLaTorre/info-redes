<?php
    require "../../backend/manejo_sesiones.php";

    cerrarSesion();
    header("location: index.php");
?>