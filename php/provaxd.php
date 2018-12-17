<?php
include_once $_SERVER['DOCUMENT_ROOT']."/php/class/classeAssignacio.php";
if (isset($_POST['Exportar'])) {
  Assignacio::llistatAssignacionsPDF();
}
?>
