<?php
include ("conexio.php");
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

  /*public function Registrar(){
    try{
      $conexio = crearConexio();
      $sql = "INSERT INTO ATRACCIO (nom_atraccio,tipus_atraccio,data_inauguracio,altura_min,altura_max,accessibilitat,acces_express) VALUES (?,?,?,?,?,?,?);";
        $sentencia = $conexio->prepare($sql);
        $sentencia->bind_param("sssiiii",$this->nomAtraccio,$this->tipusAtraccio,$this->dataInauguracio,$this->alturaMin,$this->alturaMax,$this->accessibilitat,$this->accesExpress);
        if($sentencia->execute()){
          $conexio->close();
          $sentencia->close();
          return true;
        }
        else{
          $conexio->close();
          $sentencia->close();
          return "Error en el registre.";
        }
        }catch(Exception $error){
          echo $error;
          $conexio->close();
          $sentencia->close();
          return false;

    }
  }*/
  /*public function Eliminar(){
    try{
      $connection = crearConnexio();
      $sql ="DELETE FROM ATRACCIO WHERE id"


  }*/
  /*public function gestionarEmpleats(){
    $conexio = crearConexio();
    if ($conexio->connect_error)
    {
        die('Error de conexión: ' . $conexion->connect_error);
    }

    $sql = "SELECT * FROM ATRACCIO";
    $result = $conexio->query($sql);
    echo '<table class="table">';
    echo '  <thead>';
    echo '    <tr>';
    echo '      <th scope="col">ID</th>';
    echo '      <th scope="col">Nom</th>';
    echo '      <th scope="col">Tipus</th>';
    echo '      <th scope="col">Data inauguracio</th>';
    echo '      <th scope="col">Altura minima</th>';
    echo '      <th scope="col">Altura maxima</th>';
    echo '      <th scope="col">Accessibilitat</th>';
    echo '      <th scope="col">Acces express</th>';
    echo '      <th scope="col">Data creacio registre</th>';
    echo '      <th scope="col"></th>';
    echo '      <th scope="col"></th>';
    echo '    </tr>';
    echo '  </thead>';
    if ($result) {
        while($row = $result->fetch_assoc()) {
          $id_atraccio = $row["id_atraccio"];
          $nom_atraccio = $row["nom_atraccio"];
          $tipus_atraccio = $row["tipus_atraccio"];
          $data_inauguracio = $row["data_inauguracio"];
          $altura_min = $row["altura_min"];
          $altura_max = $row["altura_max"];
          $accessibilitat = $row["accessibilitat"];
          $acces_express = $row["acces_express"];
          $data_creacio_registre = $row["data_creacio_registre"];
          echo '  <tbody>';
          echo '    <tr>';
          echo '      <th scope="row">'.$row["id_atraccio"].'</th>';
          echo '      <td>'.$row["nom_atraccio"].'</td>';
          echo '      <td>'.$row["tipus_atraccio"].'</td>';
          echo '      <td>'.$row["data_inauguracio"].'</td>';
          echo '      <td>'.$row["altura_min"].'</td>';
          echo '      <td>'.$row["altura_max"].'</td>';
          echo '      <td>'.$row["accessibilitat"].'</td>';
          echo '      <td>'.$row["acces_express"].'</td>';
          echo '      <td>'.$row["data_creacio_registre"].'</td>';
          echo '      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter'.$id_atraccio.'"> Modificar
                      </button></td>';
          echo '      <td><a href=#> Eliminar </a></td>';
          echo '    </tr>';
          echo '  </tbody>';

          echo '<!-- Modal -->
          <div class="modal fade" id="exampleModalCenter'.$id_atraccio.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Modificar atraccio</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="container">
                    <form method="post">
                    <div class="form-group row">
                    <div class="col-10">
                      <input class="form-control" type="text" value="'.$id_atraccio.'" id="example-text-input" name="id_atraciomod" style="display: none;">
                    </div>
                    </div>
                    <div class="form-group row">
                      <label for="example-text-input" class="col-2 col-form-label">Nom</label>
                      <div class="col-10">
                        <input class="form-control" type="text" value="'.$nom_atraccio.'" id="example-text-input" name="nom_atracciomod">
                      </div>
                      </div>
                      <div class="form-group row">
                      <label for="example-search-input" class="col-2 col-form-label">Tipus</label>
                      <div class="col-10">
                        <input class="form-control" type="text" value="'.$tipus_atraccio.'" id="example-text-input" name="tipus_atracciomod">
                      </div>
                      </div>
                      <div class="form-group row">
                      <label for="example-email-input" class="col-2 col-form-label">Altura min</label>
                      <div class="col-10">
                        <input class="form-control" type="text" value="'.$altura_min.'" id="example-text-input" name="altura_minimamod">
                      </div>
                      </div>
                      <div class="form-group row">
                      <label for="example-url-input" class="col-2 col-form-label">Altura max</label>
                      <div class="col-10">
                        <input class="form-control" type="text" value="'.$altura_max.'" id="example-text-input" name="altura_maximamod">
                      </div>
                      </div>
                      <div class="form-group row">
                      <label for="example-tel-input" class="col-2 col-form-label">Accesibilitat</label>
                      <div class="col-10">
                        <input class="form-control" type="text" value="'.$accessibilitat.'" id="example-text-input" name="accessibilitatmod">
                      </div>
                      </div>
                      <div class="form-group row">
                      <label for="example-password-input" class="col-2 col-form-label">Acces expres</label>
                      <div class="col-10">
                        <input class="form-control" type="text" value="'.$acces_express.'" id="example-text-input" name="acces_expressmod">
                      </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <input type="submit" class="btn btn-primary" name="modificar" value="Modificar"">';
              echo'          </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tancar</button>
                </div>
              </div>
            </div>
          </div>';
        }
        if (isset($_POST['modificar'])) {
          $id_atraccio = $_POST['id_atraciomod'];
          $nom_atraccio = $_POST['nom_atracciomod'];
          $tipus_atraccio = $_POST['tipus_atracciomod'];
          $altura_min = $_POST['altura_minimamod'];
          $altura_max = $_POST['altura_maximamod'];
          $accessibilitat = $_POST['accessibilitatmod'];
          $acces_express = $_POST['acces_expressmod'];

          $sql_update = "UPDATE ATRACCIO SET nom_atraccio='$nom_atraccio', tipus_atraccio='$tipus_atraccio', altura_min='$altura_min', altura_max='$altura_max', accessibilitat='$accessibilitat', acces_express='$acces_express' WHERE id_atraccio=$id_atraccio";
            if (mysqli_query($conexio, $sql_update)) {
                echo "<script>window.location.href='consulta_test.php';</script>";
            } else {
                echo "Error updating record: " . mysqli_error($conexio);
            }
            }
    } else {
        //echo "0 results";
    }
    echo '</table>';
    $conexio->close();
  }*/

  public static function llistarEmpleats(){


  $conexio = crearConexio();
  //if ($conexio->connect_error)
  //{
  //    die('Error de conexión: ' . $conexion->connect_error);
  //}

  $sql = "SELECT * FROM ATRACCIO";
  $result = $conexio->query($sql);
  echo '<table class="table">';
  echo '  <thead>';
  echo '    <tr>';
  echo '      <th scope="col">ID</th>';
  echo '      <th scope="col">Nom</th>';
  echo '      <th scope="col">Tipus</th>';
  echo '      <th scope="col">Data inauguracio</th>';
  echo '      <th scope="col">Altura minima</th>';
  echo '      <th scope="col">Altura maxima</th>';
  echo '      <th scope="col">Accessibilitat</th>';
  echo '      <th scope="col">Acces express</th>';
  echo '      <th scope="col">Data creacio registre</th>';
  echo '      <th scope="col"></th>';
  echo '      <th scope="col"></th>';
  echo '    </tr>';
  echo '  </thead>';
  if ($result) {
      while($row = $result->fetch_assoc()) {
        $id_atraccio = $row["id_atraccio"];
        $nom_atraccio = $row["nom_atraccio"];
        $tipus_atraccio = $row["tipus_atraccio"];
        $data_inauguracio = $row["data_inauguracio"];
        $altura_min = $row["altura_min"];
        $altura_max = $row["altura_max"];
        $accessibilitat = $row["accessibilitat"];
        $acces_express = $row["acces_express"];
        $data_creacio_registre = $row["data_creacio_registre"];
        echo '  <tbody>';
        echo '    <tr>';
        echo '      <th scope="row">'.$row["id_atraccio"].'</th>';
        echo '      <td>'.$row["nom_atraccio"].'</td>';
        echo '      <td>'.$row["tipus_atraccio"].'</td>';
        echo '      <td>'.$row["data_inauguracio"].'</td>';
        echo '      <td>'.$row["altura_min"].'</td>';
        echo '      <td>'.$row["altura_max"].'</td>';
        echo '      <td>'.$row["accessibilitat"].'</td>';
        echo '      <td>'.$row["acces_express"].'</td>';
        echo '      <td>'.$row["data_creacio_registre"].'</td>';
        echo '      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter'.$id_atraccio.'"> Modificar
                    </button></td>';
        echo '      <td><a href=#> Eliminar </a></td>';
        echo '    </tr>';
        echo '  </tbody>';

        echo '<!-- Modal -->
        <div class="modal fade" id="exampleModalCenter'.$id_atraccio.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modificar atraccio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container">
                  <form method="post">
                  <div class="form-group row">
                  <div class="col-10">
                    <input class="form-control" type="text" value="'.$id_atraccio.'" id="example-text-input" name="id_atraciomod" style="display: none;">
                  </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Nom</label>
                    <div class="col-10">
                      <input class="form-control" type="text" value="'.$nom_atraccio.'" id="example-text-input" name="nom_atracciomod">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="example-search-input" class="col-2 col-form-label">Tipus</label>
                    <div class="col-10">
                      <input class="form-control" type="text" value="'.$tipus_atraccio.'" id="example-text-input" name="tipus_atracciomod">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="example-email-input" class="col-2 col-form-label">Altura min</label>
                    <div class="col-10">
                      <input class="form-control" type="text" value="'.$altura_min.'" id="example-text-input" name="altura_minimamod">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="example-url-input" class="col-2 col-form-label">Altura max</label>
                    <div class="col-10">
                      <input class="form-control" type="text" value="'.$altura_max.'" id="example-text-input" name="altura_maximamod">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="example-tel-input" class="col-2 col-form-label">Accesibilitat</label>
                    <div class="col-10">
                      <input class="form-control" type="text" value="'.$accessibilitat.'" id="example-text-input" name="accessibilitatmod">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="example-password-input" class="col-2 col-form-label">Acces expres</label>
                    <div class="col-10">
                      <input class="form-control" type="text" value="'.$acces_express.'" id="example-text-input" name="acces_expressmod">
                    </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <input type="submit" class="btn btn-primary" name="modificar" value="Modificar"">';
            echo'          </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tancar</button>
              </div>
            </div>
          </div>
        </div>';
      }

  } else {
      //echo "0 results";
  }
  echo '</table>';
  $conexio->close();

  }

  public static function modificarAtraccio(){
    $conexio = crearConexio();
    $id_atraccio = $_POST['id_atraciomod'];
    $nom_atraccio = $_POST['nom_atracciomod'];
    $tipus_atraccio = $_POST['tipus_atracciomod'];
    $altura_min = $_POST['altura_minimamod'];
    $altura_max = $_POST['altura_maximamod'];
    $accessibilitat = $_POST['accessibilitatmod'];
    $acces_express = $_POST['acces_expressmod'];

    $sql_update = "UPDATE ATRACCIO SET nom_atraccio='$nom_atraccio', tipus_atraccio='$tipus_atraccio', altura_min='$altura_min', altura_max='$altura_max', accessibilitat='$accessibilitat', acces_express='$acces_express' WHERE id_atraccio=$id_atraccio";
      if (mysqli_query($conexio, $sql_update)) {
          echo '<script>window.location.href = window.location.href + "?myVar=awesomeValue";</script>'
          echo "oket";
      } else {
          echo "Error updating record: " . mysqli_error($conexio);
      }
      $conexio->close();
  }

}
?>
