<?php
    //Incluimos el archivo de conexión
    include ("conexio");
    function consultaSelect(){
        try{
            $conexion = crearConexion();
            $sql = "SELECT * FROM ATRACCIONS";
            $sentencia = $conexion->prepare($sql);
            $sentencia->execute();
            //Preguntamos si retorno algo, método feth()
            if($sentencia->fetch()){
                $conexion->close();
                $sentencia->close();
                //Retornamos ese algo, referenciando la variable de bind_result()
                return $nombre;
            }else{
                $conexion->close();
                $sentencia->close();
                return “No encontrado”;
            }
        }catch(Exception $e){
            echo $e;
            $conexion->close();
            $sentencia->close();
            return false;
        }
    }
?>
