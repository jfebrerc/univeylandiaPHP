<?php
//include_once("php/class/class_atraccio.php");
include_once $_SERVER['DOCUMENT_ROOT']."/php/class/classeAssignacio.php";

$Atraccio = new Atraccio ($_POST['seleccio_empleat'],$_POST['seleccio_atraccio'],$_POST['datainauguracio'],$_POST['data_inici_assign'],$_POST['data_fi_assign']);

$Atraccio->RegistrarAssignacio();




if($Atraccio->RegistrarAssignacio() == true){
  //header('Location: ./registreAtraccions.php');
    header('Location: ./registreAtraccions.php');
}


 ?>
