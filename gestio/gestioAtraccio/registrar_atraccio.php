
<?php
//include_once("php/class/class_atraccio.php");
include_once $_SERVER['DOCUMENT_ROOT']."/php/classes/classeAtraccio.php";

$Atraccio = new Atraccio ($_POST['nom'],$_POST['tipusatraccio'],$_POST['datainauguracio'],$_POST['alturamin'],$_POST['alturamax'],$_POST['accessible'],$_POST['accesexpress']);
/**
 * [$Atraccio->Registrar Una vegada creat el objecte fem servir la funció de registrar y li passem les dades. ]
 *
 */
$Atraccio->Registrar();




if($Atraccio->Registrar() == true){
    header('Location: ./registreAtraccions.php');
}


 ?>
