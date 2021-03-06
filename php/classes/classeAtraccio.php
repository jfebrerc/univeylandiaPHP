<?php
include_once $_SERVER['DOCUMENT_ROOT']."/php/connection.php";
class Atraccio{
/**
 * [Atributs de la clase]
 * @var [type Int.Guardem l'ID de la atraccio.]
 * @var [type String. Guardem el nom de l'atraccio.]
 * @var [type String. Guardem el tipus de l'atraccio.]
 * @var [type Date. Guardem la data inaugural de l'atraccio.]
 * @var [type Int. Guardem l'altura minima que permet l'atraccio.]
 * @var [type Int. Guardem l'altura maxima que permet l'atraccio.]
 * @var [type Boolean. Guardem si l'atraccio es accessible per als minusvalids.]
 * @var [type Boolean. Guardem si l'atraccio permet l'acces expres.]
 */
  private $idAtraccio;
  private $nomAtraccio;
  private $tipusAtraccio;
  private $dataInauguracio;
  private $alturaMin;
  private $alturaMax;
  private $accessibilitat;
  private $accesExpress;

/**
 * [__construct ens permet]
 */
  function __construct(){
   $args = func_get_args();
   $num = func_num_args();
   $f='__construct'.$num;
   if (method_exists($this,$f)){
     call_user_func_array(array($this,$f),$args);
   }
  }
/**
 * [__construct7 a aquest constructor li passem 7 parametres els quals introduirem al formulari i passarem amb _$POST ]
 * @param  [String] $nomAtraccio     [Guardem el nom de l'atraccio introduït al formulari.]
 * @param  [String] $tipusAtraccio   [Guardem el tipus de l'atraccio introduït al formulari.]
 * @param  [Date] $dataInauguracio [Guardem la data inaugural de l'atraccio introduïda al formulari.]
 * @param  [Int] $alturaMin       [Guardem l'altura minima que permet l'atraccio introduïda al formulari.]
 * @param  [Int] $alturaMax       [Guardem l'altura maxima que permet l'atraccio introduïda al formulari.]
 * @param  [Boolean] $accessibilitat  [Guardem si l'atraccio es accessible (introduït al formulari).]
 * @param  [Boolean] $accesExpress    [Guardem si l'atraccio permet l'acces expres (introduït al formulari).]
 */
  public function __construct7($nomAtraccio,$tipusAtraccio,$dataInauguracio,$alturaMin,$alturaMax,$accessibilitat,$accesExpress){
    $this->idAtraccio=NULL;
    $this->nomAtraccio=$nomAtraccio;
    $this->tipusAtraccio=$tipusAtraccio;
    $this->dataInauguracio=$dataInauguracio;
    $this->alturaMin=$alturaMin;
    $this->alturaMax=$alturaMax;
    $this->accessibilitat=$accessibilitat;
    $this->accesExpress=$accesExpress;

  }

  /*Getters*/
  /**
   * [getIdAtraccio Aquest metode ens permet agafar des de qualsevol classe el valor de la ID de la atracció.]
   * @return [Int] [ID de la atracció]
   */
  public function getIdAtraccio(){
  return $this->idAtraccio;
  }
  /**
   * [getNomAtraccio Aquest metode ens permet agafar des de qualsevol classe el valor del nom de la atracció.]
   * @return [String] [Nom de l'atracció]
   */
  public function getNomAtraccio(){
	return $this->nomAtraccio;
  }
  /**
   * [getTipusAtraccio Aquest metode ens permet agafar des de qualsevol classe el valor del tipus d'atracció.]
   * @return [String] [Tipus de l'atracció]
   */
  public function getTipusAtraccio(){
	return $this->tipusAtraccio;
  }
  /**
   * [getDataInauguracio Aquest metode ens permet agafar des de qualsevol classe el valor de la data inaugural de l'atracció.]
   * @return [Date] [Data de l'atracció]
   */
  public function getDataInauguracio(){
	return $this->dataInauguracio;
  }
  /**
   * [getAlturaMin Aquest metode ens permet agafar des de qualsevol classe el valor de l'altura minima que permet l'atracció.]
   * @return [Int] [Altura minima que permet l'atracció]
   */
  public function getAlturaMin(){
	return $this->alturaMin;
  }
  /**
   * [getAlturaMax Aquest metode ens permet agafar des de qualsevol classe el valor de l'altura màxima que permet l'atracció.]
   * @return [Int] [Altura màxima que permet l'atracció]
   */
  public function getAlturaMax(){
	return $this->alturaMax;
  }
  /**
   * [getAccessibilitat Aquest metode ens permet agafar des de qualsevol classe el valor de si l'atracció es accessible.]
   * @return [Boolean] [Accesibilitat de l'atracció]
   */
  public function getAccessibilitat(){
	return $this->accessibilitat;
  }
  /**
   * [getAccesExpress Aquest metode ens permet agafar des de qualsevol classe el valor de si l'atracció admet acces Express.]
   * @return [Boolean] [Acces Express de l'atracció]
   */
  public function getAccesExpress(){
	return $this->accesExpress;
  }

  /*Setters*/
  /**
   * [setIdAtraccio description]
   * @param [Int] $idAtraccio
   */
  public function setIdAtraccio($idAtraccio){
    $this->idAtraccio=$idAtraccio;
  }
  /**
   * [setNomAtraccio Aquest metode ens permet canviar les dades del nom des de qualsevol classe.]
   * @param [String] $nomAtraccio
   */
  public function setNomAtraccio($nomAtraccio){
   $this->nomAtraccio=$nomAtraccio;
  }
  /**
   * [setTipusAtraccio Aquest metode ens permet canviar les dades del tipus d'atraccio des de qualsevol classe.]
   * @param [String] $tipusAtraccio
   */
  public function setTipusAtraccio($tipusAtraccio){
    $this->tipusAtraccio=$tipusAtraccio;
  }
  /**
   * [setDataInauguracio Aquest metode ens permet canviar les dades de la data inaugural de l'atracció des de qualsevol classe.]
   * @param [Date] $dataInauguracio
   */
  public function setDataInauguracio($dataInauguracio){
    $this->dataInauguracio=$dataInauguracio;
  }
  /**
   * [setAlturaMin Aquest metode ens permet canviar les dades de l'altura minima que permet l'atracció des de qualsevol classe.]
   * @param [Int] $alturaMin
   */
  public function setAlturaMin($alturaMin){
    $this->alturaMin=$alturaMin;
  }
  /**
   * [setAlturaMax Aquest metode ens permet canviar les dades de l'altura màxima des de qualsevol classe.]
   * @param [Int] $alturaMax
   */
  public function setAlturaMax($alturaMax){
    $this->alturaMax=$alturaMax;
  }
  /**
   * [setAccessibilitat Aquest metode ens permet canviar si l'atracció es accessible de des de qualsevol classe.]
   * @param [Boolean] $accessibilitat
   */
  public function setAccessibilitat($accessibilitat){
    $this->accessibilitat=$accessibilitat;
  }
  /**
   * [setAccesExpress Aquest metode ens permet canviar si l'atracció admet acces Express des de qualsevol classe.]
   * @param [Boolean] $accesExpress
   */
  public function setAccesExpress($accesExpress){
    $this->accesExpress=$accesExpress;
  }
  /**
   * [Registrar: Aquesta funcio inserta atraccions amb totes les seues dades dins de la base de dades.
   * Passem tots els atributs de l'objecte mitjançant un INSERT per la sentecia preparada de manerea que coincidisquen amb els de la base de dades per
   * tal de que s'insereixen de manera correcta.]
   */
  public function Registrar(){

      $conexio = createConnection();
      $sql = "INSERT INTO ATRACCIO (nom_atraccio,tipus_atraccio,data_inauguracio,altura_min,altura_max,accessibilitat,acces_express) VALUES (?,?,?,?,?,?,?);";
        $sentencia = $conexio->prepare($sql);
        $sentencia->bind_param("sssiiii",$this->nomAtraccio,$this->tipusAtraccio,$this->dataInauguracio,$this->alturaMin,$this->alturaMax,$this->accessibilitat,$this->accesExpress);
        if($sentencia->execute()){
          $sentencia->close();
          $conexio->close();
          return true;
        }
        else{
          $sentencia->close();
          $conexio->close();
          return "Error en el registre.";
          return false;
        }

  }
  /**
   * [llistarEmpleats description]
   * @return [type] [description]
   */
  public static function llistarEmpleats(){


  $conexio = createConnection();
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

        if ($accessibilitat == 1) {
          $mostrarAccessibilitat = "Si";
        }
        if ($accessibilitat == 0) {
          $mostrarAccessibilitat = "No";
        }

        if ($acces_express == 1) {
          $mostrarAcces_express = "Si";
        }
        if ($acces_express == 0) {
          $mostrarAcces_express = "No";
        }

        echo '  <tbody>';
        echo '    <tr>';
        echo '      <th scope="row">'.$row["id_atraccio"].'</th>';
        echo '      <td>'.$row["nom_atraccio"].'</td>';
        echo '      <td>'.$row["tipus_atraccio"].'</td>';
        echo '      <td>'.$row["data_inauguracio"].'</td>';
        echo '      <td>'.$row["altura_min"].'</td>';
        echo '      <td>'.$row["altura_max"].'</td>';
        echo '      <td>'.$mostrarAccessibilitat.'</td>';
        echo '      <td>'.$mostrarAcces_express.'</td>';
        echo '      <td>'.$row["data_creacio_registre"].'</td>';
        echo '      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter'.$id_atraccio.'"> Modificar
                    </button></td>';
        echo '      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalEliminar'.$id_atraccio.'"> Eliminar
                    </button></td>';
        echo '    </tr>';
        echo '  </tbody>';
        echo '<!-- Modal -->
        <div class="modal fade" id="ModalEliminar'.$id_atraccio.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Atenció!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container">
                <form method="post">
                <input class="form-control" type="text" value="'.$id_atraccio.'" id="example-text-input" name="id_atraccioelim" style="display: none;">
                Segur que vols eliminar la atracció: '.$nom_atraccio.'?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-primary" name="Acceptar" value="Acceptar"">
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>';
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
                      <select class="custom-select" name="tipus_atracciomod">';
                      if ($tipus_atraccio == "Extrema") {
                        echo '<option selected value="'.$tipus_atraccio.'">'.$tipus_atraccio.'</option>
                        <option value="Mitjana">Mitjana</option>
                        <option value="Familiar">Familiar</option>
                        <option value="Aquatica">Aquatica</option>';
                      }
                      if ($tipus_atraccio == "Mitjana") {
                        echo '<option selected value="'.$tipus_atraccio.'">'.$tipus_atraccio.'</option>
                        <option value="Mitjana">Extrema</option>
                        <option value="Familiar">Familiar</option>
                        <option value="Aquatica">Aquatica</option>';
                      }
                      if ($tipus_atraccio == "Familiar") {
                        echo '<option selected value="'.$tipus_atraccio.'">'.$tipus_atraccio.'</option>
                        <option value="Mitjana">Mitjana</option>
                        <option value="Familiar">Extrema</option>
                        <option value="Aquatica">Aquatica</option>';
                      }
                      if ($tipus_atraccio == "Aquatica") {
                        echo '<option selected value="'.$tipus_atraccio.'">'.$tipus_atraccio.'</option>
                        <option value="Mitjana">Mitjana</option>
                        <option value="Familiar">Familiar</option>
                        <option value="Aquatica">Extrema</option>';
                      }
                      echo '
                      </select>
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
                      <select class="custom-select" name="accessibilitatmod">';
                      if ($accessibilitat == 1) {
                        echo '<option selected value="1">Si</option>
                        <option value="0">No</option>';
                      }
                      if ($accessibilitat == 0) {
                        echo '<option selected value="0">No</option>
                        <option value="1">Si</option>';
                      }
                      echo'
                      </select>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="example-password-input" class="col-2 col-form-label">Acces expres</label>
                    <div class="col-10">
                    <select class="custom-select" name="acces_expressmod">';
                    if ($acces_express == 1) {
                      echo '<option selected value="1">Si</option>
                      <option value="0">No</option>';
                    }
                    if ($acces_express == 0) {
                      echo '<option selected value="0">No</option>
                      <option value="1">Si</option>';
                    }
                    echo'
                    </select>
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
  /**
   * [modificarAtraccio description]
   * @return [type] [description]
   */
  public static function modificarAtraccio(){
    $conexio = createConnection();
    $id_atraccio = $_POST['id_atraciomod'];
    $nom_atraccio = $_POST['nom_atracciomod'];
    $tipus_atraccio = $_POST['tipus_atracciomod'];  //Extrema, mitjana, familiar, aquatica
    $altura_min = $_POST['altura_minimamod'];
    $altura_max = $_POST['altura_maximamod'];
    $accessibilitat = $_POST['accessibilitatmod'];
    $acces_express = $_POST['acces_expressmod'];

    $sql_update = "UPDATE ATRACCIO SET nom_atraccio='$nom_atraccio', tipus_atraccio='$tipus_atraccio', altura_min='$altura_min', altura_max='$altura_max', accessibilitat='$accessibilitat', acces_express='$acces_express' WHERE id_atraccio=$id_atraccio";
      if (mysqli_query($conexio, $sql_update)) {
          echo '<script>window.location.href = window.location.href + "?positivet";</script>';
          echo "<p> oket </p>";
      } else {
          echo "Error updating record: " . mysqli_error($conexio);
      }
      $conexio->close();
  }
  /**
   * [eliminarAtraccio Fem una sentecia DELETE FROM i mitjançant la ID de la atraccio la identifica i la elimina.]
   *
   */
  public static function eliminarAtraccio(){
      $conexio = createConnection();
      $id_atraccioE = $_POST['id_atraccioelim'];
      $sql_eliminar ="DELETE FROM ATRACCIO WHERE id_atraccio ='$id_atraccioE'";
        if (mysqli_query($conexio, $sql_eliminar)) {
          echo '<script>window.location.href = window.location.href + "?negativet";</script>';
          echo "Record updated successfully";
        }else {
          echo "Error updating record: " . mysqli_error($conexio);
      }
        //echo "0 results";
    }




  /**
   * [llistarEmpleatsBusqueda description]
   * @return [type] [description]
   */
  public static function llistarEmpleatsBusqueda(){


  $conexio = createConnection();
  //if ($conexio->connect_error)
  //{
  //    die('Error de conexión: ' . $conexion->connect_error);
  //}
  $busqueda = $_POST['busqueda_atraccio'];
  //$_POST['busqueda_atraccio']

  $sql = "SELECT * FROM ATRACCIO where nom_atraccio like '%$busqueda%' or tipus_atraccio like '%$busqueda%' or data_inauguracio like '%$busqueda%' or altura_min like '%$busqueda%' or altura_max like '%$busqueda%'";
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

        if ($accessibilitat == 1) {
          $mostrarAccessibilitat = "Si";
        }
        if ($accessibilitat == 0) {
          $mostrarAccessibilitat = "No";
        }

        if ($acces_express == 1) {
          $mostrarAcces_express = "Si";
        }
        if ($acces_express == 0) {
          $mostrarAcces_express = "No";
        }

        echo '  <tbody>';
        echo '    <tr>';
        echo '      <th scope="row">'.$row["id_atraccio"].'</th>';
        echo '      <td>'.$row["nom_atraccio"].'</td>';
        echo '      <td>'.$row["tipus_atraccio"].'</td>';
        echo '      <td>'.$row["data_inauguracio"].'</td>';
        echo '      <td>'.$row["altura_min"].'</td>';
        echo '      <td>'.$row["altura_max"].'</td>';
        echo '      <td>'.$mostrarAccessibilitat.'</td>';
        echo '      <td>'.$mostrarAcces_express.'</td>';
        echo '      <td>'.$row["data_creacio_registre"].'</td>';
        echo '      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter'.$id_atraccio.'"> Modificar
                    </button></td>';
        echo '      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalEliminar'.$id_atraccio.'"> Eliminar
                    </button></td>';
        echo '    </tr>';
        echo '  </tbody>';

		echo '<!-- Modal -->
        <div class="modal fade" id="ModalEliminar'.$id_atraccio.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Atenció!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container">
                <form method="post">
                <input class="form-control" type="text" value="'.$id_atraccio.'" id="example-text-input" name="id_atraccioelim" style="display: none;">
                Segur que vols eliminar la atracció: '.$nom_atraccio.'?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-primary" name="Acceptar" value="Acceptar"">
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>';

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
                      <select class="custom-select" name="tipus_atracciomod">';
                      if ($tipus_atraccio == "Extrema") {
                        echo '<option selected value="'.$tipus_atraccio.'">'.$tipus_atraccio.'</option>
                        <option value="Mitjana">Mitjana</option>
                        <option value="Familiar">Familiar</option>
                        <option value="Aquatica">Aquatica</option>';
                      }
                      if ($tipus_atraccio == "Mitjana") {
                        echo '<option selected value="'.$tipus_atraccio.'">'.$tipus_atraccio.'</option>
                        <option value="Mitjana">Extrema</option>
                        <option value="Familiar">Familiar</option>
                        <option value="Aquatica">Aquatica</option>';
                      }
                      if ($tipus_atraccio == "Familiar") {
                        echo '<option selected value="'.$tipus_atraccio.'">'.$tipus_atraccio.'</option>
                        <option value="Mitjana">Mitjana</option>
                        <option value="Familiar">Extrema</option>
                        <option value="Aquatica">Aquatica</option>';
                      }
                      if ($tipus_atraccio == "Aquatica") {
                        echo '<option selected value="'.$tipus_atraccio.'">'.$tipus_atraccio.'</option>
                        <option value="Mitjana">Mitjana</option>
                        <option value="Familiar">Familiar</option>
                        <option value="Aquatica">Extrema</option>';
                      }
                      echo '
                      </select>
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
                      <select class="custom-select" name="accessibilitatmod">';
                      if ($accessibilitat == 1) {
                        echo '<option selected value="1">Si</option>
                        <option value="0">No</option>';
                      }
                      if ($accessibilitat == 0) {
                        echo '<option selected value="0">No</option>
                        <option value="1">Si</option>';
                      }
                      echo'
                      </select>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="example-password-input" class="col-2 col-form-label">Acces expres</label>
                    <div class="col-10">
                    <select class="custom-select" name="acces_expressmod">';
                    if ($acces_express == 1) {
                      echo '<option selected value="1">Si</option>
                      <option value="0">No</option>';
                    }
                    if ($acces_express == 0) {
                      echo '<option selected value="0">No</option>
                      <option value="1">Si</option>';
                    }
                    echo'
                    </select>
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
}


?>
