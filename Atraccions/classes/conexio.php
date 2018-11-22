<?php
    function crearConexio2(){
        $servidor   = "localhost";
        $nombreBD   = "univeylandia";
        $usuario    = "admin_web";
        $contrasena = "Alumne123";
        $conexio = new mysqli($servidor,$usuario,$contrasena,$nombreBD);
        if($conexio->connect_error){
            die("Error en la conexio : ".$conexion->connect_errno.
                                      "-".$conexion->connect_error);
        }
        return $conexio;
    }
?>
