<?php
//include_once("php/class/class_atraccio.php");
include_once $_SERVER['DOCUMENT_ROOT']."/php/class/classeAssignacio.php";
//include_once $_SERVER['DOCUMENT_ROOT']."/php/class/classeAtraccio.php";
//include_once $_SERVER['DOCUMENT_ROOT']."/php/class/classeEmpleat.php";
var_dump($_POST);
foreach ( $_POST['seleccio_empleat'] as $value){
  echo $value;
//$Assignacio = new Assignacio ($value,$_POST['seleccio_atraccio'],$_POST['data_inici_assign'],$_POST['data_fi_assign']);

$comprovacio_registre = $Assignacio->RegistrarAssignacio();
if($comprovacio_registre == true){

  //header('Location: ./registreAtraccions.php');
  //header('Location: ./registreAssignacions.php');
}
}








 ?>
