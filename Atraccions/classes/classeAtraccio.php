<?php
class Atraccio{
  /*Atributs*/ //Faltaran mes Atributs
  private $nom;
  private $tipus;
  private $dataInauguracio;
  private $zona;

  /*Constructor*/
  function __construct(){
   $args = func_get_args();
   $num = func_num_args();
   $f='__construct'.$num;
   if (method_exists($this,$f)){
     call_user_func_array(array($this,$f),$args);
   }
  }

  function __construct4($nom,$tipus,$dataInauguracio,$zona){
    $this->nom=$nom;
    $this->tipus=$tipus;
    $this->dataInauguracio=$dataInauguracio;
    $this->zona=$zona;
  }

  /*Getters*/
  public function getNom(){
	return $this->nom;
  }

  public function getTipus(){
	return $this->tipus;
  }

  public function getDataInauguracio(){
	return $this->dataInauguracio;
  }

  public function getZona(){
	return $this->zona;
  }

  /*Setters*/
  public function setNom($nom){
   $this->nom=$nom;
  }

  public function setTipus($tipus){
    $this->tipus=$tipus;
  }

  public function setDataInauguracio($dataInauguracio){
    $this->dataInauguracio=$dataInauguracio;
  }

  public function setZona($zona){
    $this->zona=$zona;
  }

  /* METODES */
  public function modificar_atraccio($id_atraccio2, $nom_atraccio2, $tipus_atraccio2, $altura_min2, $altura_max2, $accessibilitat2, $acces_express2){
    include ("conexio.php");
    $conexio = crearConexio();
    if ($conexio->connect_error)
    {
        die('Error de conexión: ' . $conexion->connect_error);
    }
    $sql_update = "UPDATE ATRACCIO SET nom_atraccio='$nom_atraccio2', tipus_atraccio='$tipus_atraccio2', altura_min='$altura_min2', altura_max='$altura_max2', accessibilitat='$accessibilitat2', acces_express='$acces_express2' WHERE id_atraccio=$id_atraccio2";
    if ($conexio->query($sql_update) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conexio->error;
    }
  }
  $conexio->close();
}
?>
