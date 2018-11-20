<?php
 include_once("class_persones.php");
class Client extends Persona {
  private $targeta;


function __construct() {
  $args = func_get_args();
  $num = func_num_args();
  $f='__construct'. $num;
  if (method_exists($this,$f)) {
    call_user_func_array(array($this,$f),$args);
  }
  }

function __construct1($nom,$usuari,$pswd,$email,$dni,$targeta){
  parent:: __construct5($nom,$usuari,$pswd,$email,$dni);
  $this->targeta=$targeta;
}

  function getTargeta(){
      return $this->targeta;
  }

  function setTargeta($targeta){
      $this->targeta = $targeta;
  }
/*
  public function getEmail() {
    $email = parent::getEmail();
    return $email;
  }

  public function setNom($nom) {
    $nom = parent::setNom($nom);
    $this->nom=$nom;
  }


  public function setUsuari($usuari) {
    $usuari = parent::setUsuari($usuari);
    $this->usuari=$usuari;
  }
  */
}
?>
