<?php
class Persona {
  protected $id;
  protected $nom;
  protected $usuari;
  protected $pswd;
  protected $email;
  protected $dni;

function __construct(){
  $args = func_get_args();
  $num = func_num_args();
  $f='__construct'. $num;
  if (method_exists($this,$f)) {
    call_user_func_array(array($this,$f),$args);
  }
}

function __construct5($nom,$usuari,$pswd,$email,$dni){
  $this->nom = $nom ;
  $this->usuari = $usuari;
  $this->pswd = $pswd;
  $this->email = $email;
  $this->dni = $dni;

}
public function getNom(){
    return $this->nom;
}

public function getUsuari(){
     return $this->usuari;
}

public function getPswd(){
    return $this->pswd;
}

public function getEmail(){
    return $this->email;
}

public function getDni(){
    return $this->dni;
}

public function setNom($nom){
  $this->nom = $nom;
}

public function setUsuari($usuari){
  $this->usuari = $usuari;
}

public function setPswd($pswd){
  $this->pswd = $pswd;
}

public function setEmail($email){
  $this->email = $email;
}

public function setDni($dni){
  $this->dni = $dni ;
}
}
?>
