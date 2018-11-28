
<?php
//include_once("php/class/class_atraccio.php");
include_once ("classeAtraccio.php");
include_once $_SERVER['DOCUMENT_ROOT']."/Atraccions/classes/classeAtraccio"

$atraccio = new Atraccio ($_POST['nom'],$_POST['tipusatraccio'],$_POST['datainauguracio'],$_POST['alturamin'],$_POST['alturamax'],$_POST['accessible'],$_POST['accesexpress']);

$atraccio->Registrar();




if($atraccio->Registrar() == true){
  //header('Location: ./registreAtraccions.php');
    header('Location: ./registreAtraccions.php');
}


 ?>
