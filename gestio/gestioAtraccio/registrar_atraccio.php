
<?php
include_once("classes/classeAtraccio.php");
/**
 * [$Atraccio Creem un nou objecte de tipus Atraccio el qual mitjançant el metode _$POST li passarem el que hem escrit als formularis
 * i es guardaran als atributs, seguidament cridarem a la funcio Registrar.]
 *
 */
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
