<?php
include_once $_SERVER['DOCUMENT_ROOT']."/php/classes/class_habitacio.php";

$habitacio = new Habitacio($_POST['num_hab'],$_POST['tipus_hab']);

$habitacio->crearHabitacio();

 ?>
