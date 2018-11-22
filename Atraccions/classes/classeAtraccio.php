<?php
//include("connection.php");
class Atraccio{
  /*Atributs*/ //Faltaran mes Atributs
  private $idAtraccio;
  private $nomAtraccio;
  private $tipusAtraccio;
  private $dataInauguracio;
  private $alturaMin;
  private $alturaMax;
  private $accessibilitat;
  private $accesExpress;

  /*Constructor*/
  function __construct(){
   $args = func_get_args();
   $num = func_num_args();
   $f='__construct'.$num;
   if (method_exists($this,$f)){
     call_user_func_array(array($this,$f),$args);
   }
  }

  function __construct8($idAtraccio,$nomAtraccio,$tipusAtraccio,$dataInauguracio,$alturaMin,$alturaMax,$accessibilitat,$accesExpress){
    $this->idAtraccio=$idAtraccio;
    $this->nomAtraccio=$nomAtraccio;
    $this->tipusAtraccio=$tipusAtraccio;
    $this->dataInauguracio=$dataInauguracio;
    $this->alturaMin=$alturaMin;
    $this->alturaMax=$alturaMax;
    $this->accessibilitat=$accessibilitat;
    $this->accesExpress=$accesExpress;

  }

  /*Getters*/
  public function getIdAtraccio(){
  return $this->idAtraccio;
  }

  public function getNomAtraccio(){
	return $this->nomAtraccio;
  }

  public function getTipusAtraccio(){
	return $this->tipusAtraccio;
  }

  public function getDataInauguracio(){
	return $this->dataInauguracio;
  }

  public function getAlturaMin(){
	return $this->alturaMin;
  }

  public function getAlturaMax(){
	return $this->alturaMax;
  }

  public function getAccessibilitat(){
	return $this->accessibilitat;
  }

  public function getAccesExpress(){
	return $this->accesExpress;
  }

  /*Setters*/
  public function setIdAtraccio($idAtraccio){
    $this->idAtraccio=$idAtraccio;
  }

  public function setNomAtraccio($nomAtraccio){
   $this->nomAtraccio=$nomAtraccio;
  }

  public function setTipusAtraccio($tipusAtraccio){
    $this->tipusAtraccio=$tipusAtraccio;
  }

  public function setDataInauguracio($dataInauguracio){
    $this->dataInauguracio=$dataInauguracio;
  }

  public function setAlturaMin($alturaMin){
    $this->alturaMin=$alturaMin;
  }

  public function setAlturaMax($alturaMax){
    $this->alturaMax=$alturaMax;
  }

  public function setAccessibilitat($accessibilitat){
    $this->accessibilitat=$accessibilitat;
  }

  public function setAccesExpress($accesExpress){
    $this->accesExpress=$accesExpress;
  }

  public function Registrar(){
    try{
      $connection = crearConnexio();
      $sql = "INSERT INTO ATRACCIO (nom_atraccio,tipus_atraccio,data_inauguracio,altura_min,altura_max,accessibilitat,acces_express) VALUES (?,?,?,?,?,?,?);";
        $sentencia = $connection->prepare($sql);
        $sentencia->bind_param("sssiiii",$this->nomAtraccio,$this->tipusAtraccio,$this->dataInauguracio,$this->alturaMin,$this->alturaMax,$this->accessibilitat,$this->accesExpress);
        if($sentencia->execute()){
          $connection->close();
          $sentencia->close();
          return true;
        }
        else{
          $connection->close();
          $sentencia->close();
          return "Error en el registre.";
        }
        }catch(Exception $error){
          echo $error;
          $connection->close();
          $sentencia->close();
          return false;

    }
  }
  /*public function Eliminar(){
    try{
      $connection = crearConnexio();
      $sql ="DELETE FROM ATRACCIO WHERE id"


  }*/



}
?>
