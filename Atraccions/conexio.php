<?php
    function crearConexio(){
        $servidor   = "192.168.223.182";
        $nombreBD   = "univeylandia";
        $usuario    = "jfebrer";
        $contrasena = "Alumne123";
        $conexio = new mysqli($servidor,$usuario,$contrasena,$nombreBD);
        if($conexio->connect_error){
            die("Error en la conexio : ".$conexion->connect_errno.
                                      "-".$conexion->connect_error);
        }
        return $conexio;
    }
?>
