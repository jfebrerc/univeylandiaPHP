<?php

function crearConnexio(){
  /*$server = "localhost";
  $usuari = "admin_web";
  $passwd = "Alumne123";
  $namedb = "univeylandia";*/

  $server = "localhost";
  $usuari = "admin_web";
  $passwd = "Alumne123";
  $namedb = "univeylandia";

  $connection= new mysqli($server, $usuari, $passwd, $namedb);

  if($connection->connect_error){
    die("Error: ". $connection->connect_error);
  }
  //echo "Conexio correcta";
  return $connection;
}

?>
