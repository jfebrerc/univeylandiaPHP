<?php
include_once $_SERVER['DOCUMENT_ROOT']."/php/connection.php";
class Servei{
  /*Atributs*/
  private $idServei;
  private $idAtraccio;
  private $idUsuari;
  private $data_inici_servei;
  private $data_fi_servei;


  /*Constructor*/
  function __construct(){
   $args = func_get_args();
   $num = func_num_args();
   $f='__construct'.$num;
   if (method_exists($this,$f)){
     call_user_func_array(array($this,$f),$args);
   }
  }

    public function __construct5($idServei,$idAtraccio,$idUsuari,$data_inici_servei,  $data_fi_servei){
    $this->idServei=$idServei;
    $this->idUsuari=$idUsuari;
    $this->idAtraccio=$idAtraccio;
    $this->data_inici_servei=$data_inici_servei;
    $this->data_fi_servei=$data_fi_servei;

    }

    public function RegistrarAssignacio(){

        $connection = crearConnexio();

        if ($conn->connect_error) {
            die("Connexió fallida: " . $conn->connect_error);
        }

        $sql = "INSERT INTO SERVEI_ATRACCIO (id_servei,id_atraccio,id_usuari,data_inici_servei,data_fi_servei) VALUES (?,?,?,?,?);";

          $sentencia = $connection->prepare($sql);

          if ($sentencia==false) {
              //var_dump($stmt);
              die("Secured1: Error al introduir el registre.");
          }

          $result = $sentencia->bind_param("iiiss",$this->idServei=$idServei,$this->idAtraccio,$this->idUsuari,$this->data_inici_servei,$this->data_fi_servei);

          if ($result==false) {
              //var_dump($stmt);
              die("Secured2: Error al introduir el registre.");
          }

          if($sentencia->execute()){
            $sentencia->close();
            $connection->close();
            return true;
          }
          else{
            $sentencia->close();
            $connection->close();
            return false;
          }

    }



    public static function SeleccioNomServei()
    {
    $conexio = crearConnexio();
    //if ($conexio->connect_error)
    //{
    //    die('Error de conexión: ' . $conexion->connect_error);
    //}
    //$busqueda = $_POST['busqueda_atraccio'];
    //$_POST['busqueda_atraccio']

    $sql = "SELECT * FROM SERVEI";
    $result = $conexio->query($sql);
    echo '<table class="table">';
    echo '  <thead>';
    echo '    <tr>';
    echo '      <th scope="col">Nom Servei</th>';
    echo '      <th scope="col"></th>';
    echo '      <th scope="col"></th>';
    echo '    </tr>';
    echo '  </thead>';
    if ($result) {
        while($row = $result->fetch_assoc()) {
          $id_servei = $row["id_servei"];
          $nom_servei = $row["nom_servei"];
          echo '  <tbody>';
          echo '    <tr>';
          echo '      <th scope="row">'.$row["nom_servei"].'</th>';
          echo '    <td><input type="radio" class="form-check-input" name="nom_servei" value="'.$id_servei.'"></td>';
          echo '    </tr>';
          echo '  </tbody>';

        }

                    //    echo '</form>';
      }

          echo '</table>';
          $conexio->close();
    }


  public static function llistarAssignBusqueda($busqueda, $buscar_atraccio){


  $conexio = crearConnexio();
  //if ($conexio->connect_error)
  //{
  //    die('Error de conexión: ' . $conexion->connect_error);
  //}
  //$busqueda = $_POST['buscar_assign'];
  //$busqueda = "admin";

  //$_POST['busqueda_atraccio']
  if ($buscar_atraccio != -1) {
    //$busqueda = $_POST['buscar_assign'];
    $sql = "SELECT aua.id_servei_atraccio,aua.id_servei,s.nom_servei, u.id_usuari, u.nom, u.cognom1, u.cognom2, u.numero_document, a.nom_atraccio, a.id_atraccio, aua.data_inici_servei, aua.data_fi_servei, aua.data_creacio_registre FROM SERVEI_ATRACCIO aua LEFT JOIN ATRACCIO a ON aua.id_atraccio=a.id_atraccio LEFT JOIN SERVEI s ON aua.id_servei=s.id_servei LEFT JOIN USUARI u ON u.id_usuari=aua.id_usuari where aua.id_atraccio=$buscar_atraccio and (u.nom like '%$busqueda%' or u.cognom1 like '%$busqueda%' or u.cognom2 like '%$busqueda%' or u.numero_document like '%$busqueda%' or a.nom_atraccio like '%$busqueda%') order by data_creacio_registre desc";
  }elseif ($buscar_atraccio == -1) {
    $sql = "SELECT aua.id_servei_atraccio,aua.id_servei,s.nom_servei, u.id_usuari, u.nom, u.cognom1, u.cognom2, u.numero_document, a.nom_atraccio, a.id_atraccio, aua.data_inici_servei, aua.data_fi_servei, aua.data_creacio_registre FROM SERVEI_ATRACCIO aua LEFT JOIN ATRACCIO a ON aua.id_atraccio=a.id_atraccio LEFT JOIN SERVEI s ON aua.id_servei=s.id_servei LEFT JOIN USUARI u ON u.id_usuari=aua.id_usuari where u.nom like '%$busqueda%' or u.cognom1 like '%$busqueda%' or u.cognom2 like '%$busqueda%' or u.numero_document like '%$busqueda%' or a.nom_atraccio like '%$busqueda%' order by data_creacio_registre desc";
  }
  /*else {
    $sql = "SELECT aua.id_neteja_atraccio, u.nom, u.cognom1, u.cognom2, u.numero_document, a.nom_atraccio, aua.data_inici_neteja, aua.data_fi_neteja, aua.data_creacio_registre FROM NETEJA_ATRACCIO aua LEFT JOIN ATRACCIO a ON aua.id_atraccio=a.id_atraccio LEFT JOIN USUARI u ON u.id_usuari=aua.id_usuari";

  }*/

  //$sql = "SELECT aua.id_neteja_atraccio, u.nom, u.cognom1, u.cognom2, u.numero_document, a.nom_atraccio, aua.data_inici_neteja, aua.data_fi_neteja, aua.data_creacio_registre FROM NETEJA_ATRACCIO aua LEFT JOIN ATRACCIO a ON aua.id_atraccio=a.id_atraccio LEFT JOIN USUARI u ON u.id_usuari=aua.id_usuari where u.nom like '%$busqueda%' or u.cognom1 like '%$busqueda%' or u.cognom2 like '%$busqueda%' or u.numero_document like '%$busqueda%' or a.nom_atraccio like '%$busqueda%' order by data_creacio_registre desc";
  $result = $conexio->query($sql);
  echo '<table class="table">';
  echo '  <thead>';
  echo '    <tr>';
  echo '      <th scope="col">Nom empleat</th>';
  echo '      <th scope="col">Cognom 1</th>';
  echo '      <th scope="col">Cognom 2</th>';
  echo '      <th scope="col">Document</th>';
  echo '      <th scope="col">Nom atraccio</th>';
  echo '      <th scope="col">Nom servei</th>';
  echo '      <th scope="col">Data inici</th>';
  echo '      <th scope="col">Data fi</th>';
  echo '      <th scope="col"></th>';
  echo '      <th scope="col"></th>';
  echo '    </tr>';
  echo '  </thead>';
  //asdsdfdsf
  if ($result) {
      while($row = $result->fetch_assoc()) {
        $id_servei_atraccio = $row["id_servei_atraccio"];
        $nom_empleat = $row["nom"];
        $cognom1_empleat = $row["cognom1"];
        $cognom2_empleat = $row["cognom2"];
        $dniEmpleat = $row["numero_document"];
        $nom_atraccio = $row["nom_atraccio"];
        $data_inici_servei = $row["data_inici_servei"];
        $data_fi_servei = $row["data_fi_servei"];
        $data_creacio_registre = $row["data_creacio_registre"];
        $id_atraccio = $row["id_atraccio"];
        $id_usuari = $row["id_usuari"];
        $nom_servei = $row["nom_servei"];


        echo '  <tbody>';
        echo '    <tr>';
        echo '      <th scope="row">'.$nom_empleat.'</th>';
        echo '      <td>'.$cognom1_empleat.'</td>';
        echo '      <td>'.$cognom2_empleat.'</td>';
        echo '      <td>'.$dniEmpleat.'</td>';
        echo '      <td>'.$nom_atraccio.'</td>';
        echo '      <td>'.$nom_servei.'</td>';
        echo '      <td>'.$data_inici_servei.'</td>';
        echo '      <td>'.$data_fi_servei.'</td>';
        echo '      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter'.$id_servei_atraccio.'"> Modificar
                    </button></td>';
        echo '      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalEliminar'.$id_servei_atraccio.'"> Eliminar
                    </button></td>';
        echo '    </tr>';
        echo '  </tbody>';



        echo '<!-- ELIMINAR -->
        <div class="modal fade" id="ModalEliminar'.$id_servei_atraccio.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                <input class="form-control" type="text" value="'.$id_servei_atraccio.'" id="example-text-input" name="id_servei_atraccioelim" style="display: none;">
                <p> Segur que vols eliminar la assignacio: </p>'.$nom_empleat.'  || '.$dniEmpleat.'  --> '.$nom_atraccio.'?
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



        echo '<!-- MODIFICAR -->
        <div class="modal fade" id="exampleModalCenter'.$id_servei_atraccio.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modificar assignació</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container">
                  <form method="post">
                  <div class="form-group row">
                  <div class="col-10">
                    <input class="form-control" type="text" value="'.$id_servei_atraccio.'" id="example-text-input" name="id_servei_atracciomod" style="display: none;">
                  </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Atracció: </label>
                    <div class="col-10">
                    <select class="custom-select" name="atraccio_seleccionada">
                      <option selected value="'.$id_atraccio.'">'.$nom_atraccio.'</option>';
                      Servei::llistarAtraccionsMod($id_atraccio);
                    echo '</select>
                    </div>
                    </div>
                    <div class="form-group row">
                      <label for="example-text-input" class="col-2 col-form-label">Empleat: </label>
                      <div class="col-10">
                      <select class="custom-select" name="empleat_seleccionat">
                        <option selected value="'.$id_usuari.'">'.$nom_empleat.'   ||   '.$dniEmpleat.'</option>';
                        Servei::llistarEmpleatMod($id_usuari);
                      echo '</select>
                      </div>
                      </div>
                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Data inici: </label>
                        <div class="col-10">
                        <input type="date" value="'.$data_inici_servei.'" class="form-control form-control-sm" name="data_inici_servei">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Data fi: </label>
                        <div class="col-10">
                        <input type="date" value="'.$data_fi_servei.'" class="form-control form-control-sm" name="data_fi_servei">
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
function llistarNomAtraccions(){
        $conexio = crearConnexio();
        $sql = "SELECT nom_atraccio, id_atraccio FROM ATRACCIO";
        $result = $conexio->query($sql);
        if ($result) {
          echo '<option selected value="-1">Selecciona una atracció</option>';
            while($row = $result->fetch_assoc()) {
              $nom_atraccio = $row["nom_atraccio"];
              $id_atraccio = $row["id_atraccio"];
              echo '<option value="'.$id_atraccio.'">'.$nom_atraccio.'</option>';
        }
}

}

public static function llistarAtraccionsMod($id_atraccioSelect){
        $conexio = crearConnexio();
        $sql = "SELECT nom_atraccio, id_atraccio FROM ATRACCIO where id_atraccio!=$id_atraccioSelect";
        $result = $conexio->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()) {
              $nom_atraccio = $row["nom_atraccio"];
              $id_atraccio = $row["id_atraccio"];
              echo '<option value="'.$id_atraccio.'">'.$nom_atraccio.'</option>';
        }
}

}

public static function llistarEmpleatMod($id_usuariSelect){
        $conexio = crearConnexio();
        $sql = "SELECT nom, id_usuari, numero_document,  FROM USUARI WHERE id_usuari != 1 and id_usuari!=$id_usuariSelect";
        $result = $conexio->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()) {
              $nom = $row["nom"];
              $id_empleat = $row["id_usuari"];
              $numero_document = $row["numero_document"];
              echo '<option value="'.$id_empleat.'">'.$nom.'   ||   '.$numero_document.'</option>';
        }
}

}

public static function modificarAssignacio(){
  $conexio = crearConnexio();
  $id_servei_atraccio = $_POST['id_servei_atracciomod'];
  $atraccio = $_POST['atraccio_seleccionada'];
  $empleat = $_POST['empleat_seleccionat'];  //Extrema, mitjana, familiar, aquatica
  $data_inici_servei = $_POST['data_inici_servei'];
  $data_fi_servei = $_POST['data_fi_servei'];

  $sql_update = "UPDATE SERVEI_ATRACCIO SET id_usuari='$empleat', id_atraccio='$atraccio', data_inici_servei='$data_inici_servei', data_fi_servei='$data_fi_servei' WHERE id_servei_atraccio=$id_servei_atraccio";
    if (mysqli_query($conexio, $sql_update)) {
        echo '<script>window.location.href = window.location.href + "?positivet";</script>';
        echo "<p> oket </p>";
    } else {
        echo "Error updating record: " . mysqli_error($conexio);
    }
    $conexio->close();
}

public static function eliminarAssignacio(){
    $conexio = crearConnexio();
    $id_servei_atraccioE = $_POST['id_servei_atraccioelim'];
    $sql_eliminar ="DELETE FROM SERVEI_ATRACCIO WHERE id_servei_atraccio=$id_servei_atraccioE";
      if (mysqli_query($conexio, $sql_eliminar)) {
        echo '<script>window.location.href = window.location.href + "?negativet";</script>';
        echo "Record updated successfully";
      }else {
        echo "Error updating record: " . mysqli_error($conexio);
    }
      //echo "0 results";
  }

/*  public static function exportarAssignacions(){
    //include_once $_SERVER['DOCUMENT_ROOT']."/php/fpdf/fpdf.php";
    require $_SERVER['DOCUMENT_ROOT']."/php/fpdf/fpdf.php";
    $pdf = new FPDF('P','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(20,10,'Title',1,1,'C');
    $pdf->Output();
  }*/


  public static function llistatAssignacionsPDF() {
  require_once $_SERVER['DOCUMENT_ROOT']."/php/fpdf/fpdf.php";
  $conn = crearConnexio();
  if ($conn->connect_error) {
      die('Error en la connexió : '.$conn->connect_errno.'-'.$conn->connect_error);
  }
  $sql = "SELECT aua.id_servei_atraccio, u.id_usuari, u.nom, u.cognom1, u.cognom2, u.numero_document, a.nom_atraccio, a.id_atraccio, aua.data_inici_servei, aua.data_fi_servei, aua.data_creacio_registre FROM SERVEI_ATRACCIO aua LEFT JOIN ATRACCIO a ON aua.id_atraccio=a.id_atraccio LEFT JOIN USUARI u ON u.id_usuari=aua.id_usuari order by data_creacio_registre desc";
  $result = $conn->query($sql);
  $numero_de_assignacions = $result->num_rows;
  $columna_nom = "";
  $columna_cognom1 = "";
  $columna_cognom2 = "";
  $columna_numero_document = "";
  $columna_nom_atraccio = "";
  $columna_data_inici_servei = "";
  $columna_data_fi_servei = "";
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $nom = $row['nom'];
        $cognom1 = $row['cognom1'];
        $cognom2 = $row['cognom2'];
        $numero_document = $row['numero_document'];
        $nom_atraccio = $row['nom_atraccio'];
        $data_inici_servei = $row['data_inici_servei'];
        $data_fi_servei = $row['data_fi_servei'];

        $columna_nom = $columna_nom.$nom."\n";
        $columna_cognom1 = $columna_cognom1.$cognom1."\n";
        $columna_cognom2 = $columna_cognom2.$cognom2."\n";
        $columna_numero_document = $columna_numero_document.$numero_document."\n";
        $columna_nom_atraccio = $columna_nom_atraccio.$nom_atraccio."\n";
        $columna_data_inici_servei = $columna_data_inici_servei.$data_inici_servei."\n";
        $columna_data_fi_servei = $columna_data_fi_servei.$data_fi_servei."\n";
      }
  } else {
      echo "Error: 0 resultats";
  }
  $conn->close();
  /* GENERAR PDF */
  $pdf = new FPDF();
  $pdf->AddPage('L', 'A4', 0);
  //Fields Name position
  $Y_Fields_Name_position = 20;
  //Table position, under Fields Name
  $Y_Table_Position = 26;
  //First create each Field Name
  //Gray color filling each Field Name box
  $pdf->SetFillColor(232,232,232);
  //Bold Font for Field Name
  $pdf->SetFont('Arial','B',12);
  $pdf->SetY($Y_Fields_Name_position);
  $pdf->SetX(10);
  $pdf->Cell(20,6,'NOM',1,0,'L',1);
  $pdf->SetX(30);
  $pdf->Cell(30,6,'COGNOM1',1,0,'L',1);
  $pdf->SetX(60);
  $pdf->Cell(30,6,'COGNOM2',1,0,'L',1);
  $pdf->SetX(90);
  $pdf->Cell(30,6,'DOCUMENT',1,0,'L',1);
  $pdf->SetX(120);
  $pdf->Cell(40,6,'NOM ATRACCIO',1,0,'L',1);
  $pdf->SetX(160);
  $pdf->Cell(50,6,'DATA INICI',1,0,'L',1);
  $pdf->SetX(210);
  $pdf->Cell(50,6,'DATA FI',1,0,'L',1);
  $pdf->Ln();

  $pdf->SetFont('Arial','',12);
  $pdf->SetY($Y_Table_Position);
  $pdf->SetX(10);
  $pdf->MultiCell(20,6,$columna_nom,1);
  $pdf->SetY($Y_Table_Position);
  $pdf->SetX(30);
  $pdf->MultiCell(30,6,$columna_cognom1,1);
  $pdf->SetY($Y_Table_Position);
  $pdf->SetX(60);
  $pdf->MultiCell(30,6,$columna_cognom2,1,'R');
  $pdf->SetY($Y_Table_Position);
  $pdf->SetX(90);
  $pdf->MultiCell(30,6,$columna_numero_document,1,'R');
  $pdf->SetY($Y_Table_Position);
  $pdf->SetX(120);
  $pdf->MultiCell(40,6,$columna_nom_atraccio,1,'R');
  $pdf->SetY($Y_Table_Position);
  $pdf->SetX(160);
  $pdf->MultiCell(50,6,$columna_data_inici_servei,1,'R');
  $pdf->SetY($Y_Table_Position);
  $pdf->SetX(210);
  $pdf->MultiCell(50,6,$columna_data_fi_servei,1,'R');

  //Create lines (boxes) for each ROW (Product)
  //If you don't use the following code, you don't create the lines separating each row
  $i = 0;
  $pdf->SetY($Y_Table_Position);
  while ($i < $numero_de_assignacions)
  {
      $pdf->SetX(10);
      $pdf->MultiCell(0,6,'',1);
      $i = $i +1;
  }
  //Donem nom al document PDF i l'enviem per descarregar
  $pdf->Output('llistatAssignacions.pdf','D');
}

}

/*public function __construct7($nomAtraccio,$tipusAtraccio,$dataInauguracio,$alturaMin,$alturaMax,$accessibilitat,$accesExpress){
  $this->idAtraccio=NULL;
  $this->nomAtraccio=$nomAtraccio;
  $this->tipusAtraccio=$tipusAtraccio;
  $this->dataInauguracio=$dataInauguracio;
  $this->alturaMin=$alturaMin;
  $this->alturaMax=$alturaMax;
  $this->accessibilitat=$accessibilitat;
  $this->accesExpress=$accesExpress;

}*/

/*public function Registrar(){

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

}*/
/*public static function llistarEmpleats(){


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

}*/

/*public static function modificarAtraccio(){
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
  }*/






?>
