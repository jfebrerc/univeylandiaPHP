<?php
include_once $_SERVER['DOCUMENT_ROOT']."/php/connection.php";
class Assignacio{
  /*Atributs*/
  private $idUsuari;
  private $idAtraccio;
  private $dataIniciAssignacio;
  private $dataFiAssignacio;
  /*Constructor*/
  function __construct(){
   $args = func_get_args();
   $num = func_num_args();
   $f='__construct'.$num;
   if (method_exists($this,$f)){
     call_user_func_array(array($this,$f),$args);
   }
  }
    /**
     * [__construct4 description]
     * @param  [int] $idUsuari            [id de l'usuari]
     * @param  [int] $idAtraccio          [id de l'atracció]
     * @param  [date] $dataIniciAssignacio [data de inici de l'assignació]
     * @param  [date] $dataFiAssignacio    [data de fi de l'assignació  ]
     *
     */
    public function __construct4($idUsuari, $idAtraccio,  $dataIniciAssignacio,  $dataFiAssignacio){
    $this->idUsuari=$idUsuari;
    $this->idAtraccio=$idAtraccio;
    $this->dataIniciAssignacio=$dataIniciAssignacio;
    $this->dataFiAssignacio=$dataFiAssignacio;
    }
    /**
     * [RegistrarAssignacio Aquest metode s'encarrega de registrar una assignacio. Agafa els valors del formulari de registre i fa un insert]
     */
    public function RegistrarAssignacio(){
        $connection = crearConnexio();
        $sql = "INSERT INTO ASSIGN_USUARI_ATRACCIO (id_usuari,id_atraccio,data_inici_assign,data_fi_assign) VALUES (?,?,?,?);";
          $sentencia = $connection->prepare($sql);
          $sentencia->bind_param("iiss",$this->idUsuari,$this->idAtraccio,$this->dataIniciAssignacio,$this->dataFiAssignacio);
          if($sentencia->execute()){
            $sentencia->close();
            $connection->close();
            return true;
          }
          else{
            $sentencia->close();
            $connection->close();
            return "Error en el registre.";
            return false;
          }
          $sentencia->close();
          $connection->close();
    }
    /**
     * [llistarAssignBusqueda Aquest metode s'encarrega de llistar totes les assignacions amb els atributs: "Nom empleat", "Cognom 1", "Cognom 2", "Document", "Nom atraccio", "Data inici", "Data fi". Depenent dels apartats utilitzats per a filtrar la llista, s'utilitza una querry o un altra. Aquest metode també s'encarrega de generar els modals de modificació i eliminació d'assignacions.]
     */
  public static function llistarAssignBusqueda($busqueda, $buscar_atraccio){
  $conexio = crearConnexio();
  if ($buscar_atraccio != -1) {
    $sql = "SELECT aua.id_assignacio, u.id_usuari, u.nom, u.cognom1, u.cognom2, u.numero_document, a.nom_atraccio, a.id_atraccio, aua.data_inici_assign, aua.data_fi_assign, aua.data_creacio_registre FROM ASSIGN_USUARI_ATRACCIO aua LEFT JOIN ATRACCIO a ON aua.id_atraccio=a.id_atraccio LEFT JOIN USUARI u ON u.id_usuari=aua.id_usuari where aua.id_atraccio=$buscar_atraccio and (u.nom like '%$busqueda%' or u.cognom1 like '%$busqueda%' or u.cognom2 like '%$busqueda%' or u.numero_document like '%$busqueda%' or a.nom_atraccio like '%$busqueda%') order by data_creacio_registre desc";
  }elseif ($buscar_atraccio == -1) {
    $sql = "SELECT aua.id_assignacio, u.id_usuari, u.nom, u.cognom1, u.cognom2, u.numero_document, a.nom_atraccio, a.id_atraccio, aua.data_inici_assign, aua.data_fi_assign, aua.data_creacio_registre FROM ASSIGN_USUARI_ATRACCIO aua LEFT JOIN ATRACCIO a ON aua.id_atraccio=a.id_atraccio LEFT JOIN USUARI u ON u.id_usuari=aua.id_usuari where u.nom like '%$busqueda%' or u.cognom1 like '%$busqueda%' or u.cognom2 like '%$busqueda%' or u.numero_document like '%$busqueda%' or a.nom_atraccio like '%$busqueda%' order by data_creacio_registre desc";
  }
  $result = $conexio->query($sql);
  echo '<table class="table">';
  echo '  <thead>';
  echo '    <tr>';
  echo '      <th scope="col">Nom empleat</th>';
  echo '      <th scope="col">Cognom 1</th>';
  echo '      <th scope="col">Cognom 2</th>';
  echo '      <th scope="col">Document</th>';
  echo '      <th scope="col">Nom atraccio</th>';
  echo '      <th scope="col">Data inici</th>';
  echo '      <th scope="col">Data fi</th>';
  echo '      <th scope="col"></th>';
  echo '      <th scope="col"></th>';
  echo '    </tr>';
  echo '  </thead>';
  if ($result) {
      while($row = $result->fetch_assoc()) {
        $id_assignacio = $row["id_assignacio"];
        $nom_empleat = $row["nom"];
        $cognom1_empleat = $row["cognom1"];
        $cognom2_empleat = $row["cognom2"];
        $dniEmpleat = $row["numero_document"];
        $nom_atraccio = $row["nom_atraccio"];
        $data_inici_assign = $row["data_inici_assign"];
        $data_fi_assign = $row["data_fi_assign"];
        $data_creacio_registre = $row["data_creacio_registre"];
        $id_atraccio = $row["id_atraccio"];
        $id_usuari = $row["id_usuari"];
        echo '  <tbody>';
        echo '    <tr>';
        echo '      <th scope="row">'.$nom_empleat.'</th>';
        echo '      <td>'.$cognom1_empleat.'</td>';
        echo '      <td>'.$cognom2_empleat.'</td>';
        echo '      <td>'.$dniEmpleat.'</td>';
        echo '      <td>'.$nom_atraccio.'</td>';
        echo '      <td>'.$data_inici_assign.'</td>';
        echo '      <td>'.$data_fi_assign.'</td>';
        echo '      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter'.$id_assignacio.'"> Modificar
                    </button></td>';
        echo '      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalEliminar'.$id_assignacio.'"> Eliminar
                    </button></td>';
        echo '    </tr>';
        echo '  </tbody>';
        echo '<!-- ELIMINAR -->
        <div class="modal fade" id="ModalEliminar'.$id_assignacio.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                <input class="form-control" type="text" value="'.$id_assignacio.'" id="example-text-input" name="id_assignacioelim" style="display: none;">
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
        <div class="modal fade" id="exampleModalCenter'.$id_assignacio.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    <input class="form-control" type="text" value="'.$id_assignacio.'" id="example-text-input" name="id_assignaciomod" style="display: none;">
                  </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Atracció: </label>
                    <div class="col-10">
                    <select class="custom-select" name="atraccio_seleccionada">
                      <option selected value="'.$id_atraccio.'">'.$nom_atraccio.'</option>';
                      Assignacio::llistarAtraccionsMod($id_atraccio);
                    echo '</select>
                    </div>
                    </div>
                    <div class="form-group row">
                      <label for="example-text-input" class="col-2 col-form-label">Empleat: </label>
                      <div class="col-10">
                      <select class="custom-select" name="empleat_seleccionat">
                        <option selected value="'.$id_usuari.'">'.$nom_empleat.'   ||   '.$dniEmpleat.'</option>';
                        Assignacio::llistarEmpleatMod($id_usuari);
                      echo '</select>
                      </div>
                      </div>
                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Data inici: </label>
                        <div class="col-10">
                        <input type="date" value="'.$data_inici_assign.'" class="form-control form-control-sm" name="data_inici_assign">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Data fi: </label>
                        <div class="col-10">
                        <input type="date" value="'.$data_fi_assign.'" class="form-control form-control-sm" name="data_fi_assign">
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
 * [llistarNomAtraccions Aquest metode s'encarrega de carregar les atraccions per a filtrar per elles.]
 */
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
/**
 * [llistarAtraccionsMod Aquest metode s'encarrega de carregar les atraccions per a la seleccio a modificar. Se li passa paràmetre la atracció seleccionada per a que no carregue aquesta.]
 */
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
/**
 * [llistarEmpleatMod Aquest metode s'encarrega de carregar els diferents empleats per a la seleccio a modificar. Se li passa paràmetre el empleat seleccionat per a que no el carregue.]
 */
public static function llistarEmpleatMod($id_usuariSelect){
        $conexio = crearConnexio();
        $sql = "SELECT nom, id_usuari, numero_document FROM USUARI WHERE id_usuari != 1 and id_usuari!=$id_usuariSelect";
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
/**
 * [modificarAssignacio Aquest metode es crida quan s'envía el formulari de modificació. S'encarrega de realitzar la modificació de una assignació.]
 */
public static function modificarAssignacio(){
  $conexio = crearConnexio();
  $id_assignacio = $_POST['id_assignaciomod'];
  $atraccio = $_POST['atraccio_seleccionada'];
  $empleat = $_POST['empleat_seleccionat'];
  $data_inici = $_POST['data_inici_assign'];
  $data_fi = $_POST['data_fi_assign'];
  $sql_update = "UPDATE ASSIGN_USUARI_ATRACCIO SET id_usuari='$empleat', id_atraccio='$atraccio', data_inici_assign='$data_inici', data_fi_assign='$data_fi' WHERE id_assignacio=$id_assignacio";
    if (mysqli_query($conexio, $sql_update)) {
        echo '<script>window.location.href = window.location.href + "?positivet";</script>';
        echo "<p> oket </p>";
    } else {
        echo "Error updating record: " . mysqli_error($conexio);
    }
    $conexio->close();
}
/**
 * [eliminarAssignacio Aquest metode s'encarrega de eliminar la assignació seleccionada des del menú de la llista.]
 */
public static function eliminarAssignacio(){
    $conexio = crearConnexio();
    $id_assignacioE = $_POST['id_assignacioelim'];
    $sql_eliminar ="DELETE FROM ASSIGN_USUARI_ATRACCIO WHERE id_assignacio=$id_assignacioE";
      if (mysqli_query($conexio, $sql_eliminar)) {
        echo '<script>window.location.href = window.location.href + "?negativet";</script>';
        echo "Record updated successfully";
      }else {
        echo "Error updating record: " . mysqli_error($conexio);
    }
      //echo "0 results";
  }
  /**
   * [llistatAssignacionsPDF Aquest metode s'encarrega de exportar en un document PDF que es descarrega al moment els últims 20 registres. Aquest metode necessita ser modificat per a que es descarregue tot el que es mostri per pantall (filtrat o no) i es generen de forma correcta les diferents pàgines necessaries.]
   * drunk, fix later
   */
  public static function llistatAssignacionsPDF() {
  require_once $_SERVER['DOCUMENT_ROOT']."/php/fpdf/fpdf.php";
  $conn = crearConnexio();
  if ($conn->connect_error) {
      die('Error en la connexió : '.$conn->connect_errno.'-'.$conn->connect_error);
  }
  $sql = "SELECT aua.id_assignacio, u.id_usuari, u.nom, u.cognom1, u.cognom2, u.numero_document, a.nom_atraccio, a.id_atraccio, aua.data_inici_assign, aua.data_fi_assign, aua.data_creacio_registre FROM ASSIGN_USUARI_ATRACCIO aua LEFT JOIN ATRACCIO a ON aua.id_atraccio=a.id_atraccio LEFT JOIN USUARI u ON u.id_usuari=aua.id_usuari order by data_creacio_registre desc LIMIT 20";
  $result = $conn->query($sql);
  $numero_de_assignacions = $result->num_rows;
  $columna_nom = "";
  $columna_cognom1 = "";
  $columna_cognom2 = "";
  $columna_numero_document = "";
  $columna_nom_atraccio = "";
  $columna_data_inici_assign = "";
  $columna_data_fi_assign = "";
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $nom = $row['nom'];
        $cognom1 = $row['cognom1'];
        $cognom2 = $row['cognom2'];
        $numero_document = $row['numero_document'];
        $nom_atraccio = $row['nom_atraccio'];
        $data_inici_assign = $row['data_inici_assign'];
        $data_fi_assign = $row['data_fi_assign'];
        $columna_nom = $columna_nom.$nom."\n";
        $columna_cognom1 = $columna_cognom1.$cognom1."\n";
        $columna_cognom2 = $columna_cognom2.$cognom2."\n";
        $columna_numero_document = $columna_numero_document.$numero_document."\n";
        $columna_nom_atraccio = $columna_nom_atraccio.$nom_atraccio."\n";
        $columna_data_inici_assign = $columna_data_inici_assign.$data_inici_assign."\n";
        $columna_data_fi_assign = $columna_data_fi_assign.$data_fi_assign."\n";
      }
  } else {
      echo "Error: 0 resultats";
  }
  $conn->close();
  /* GENERAR PDF */
  $pdf = new FPDF();
  $pdf->AddPage('L', 'A4', 0);
  $Y_Fields_Name_position = 20;
  $Y_Table_Position = 26;
  $pdf->SetFillColor(232,232,232);
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(10);
  $pdf->Cell(250,10,'ASSIGNACIONS EMPLEATS-ATRACCIONS',1,0,'C');
  $pdf->Ln(60);
  $pdf->SetY($Y_Fields_Name_position);
  $pdf->SetX(20);
  $pdf->Cell(20,6,'NOM',1,0,'L',1);
  $pdf->SetX(40);
  $pdf->Cell(30,6,'COGNOM1',1,0,'L',1);
  $pdf->SetX(70);
  $pdf->Cell(30,6,'COGNOM2',1,0,'L',1);
  $pdf->SetX(100);
  $pdf->Cell(30,6,'DOCUMENT',1,0,'L',1);
  $pdf->SetX(130);
  $pdf->Cell(40,6,'NOM ATRACCIO',1,0,'L',1);
  $pdf->SetX(170);
  $pdf->Cell(50,6,'DATA INICI',1,0,'L',1);
  $pdf->SetX(220);
  $pdf->Cell(50,6,'DATA FI',1,0,'L',1);
  $pdf->Ln();
  $pdf->SetFont('Arial','',12);
  $pdf->SetY($Y_Table_Position);
  $pdf->SetX(20);
  $pdf->MultiCell(20,6,$columna_nom,1);
  $pdf->SetY($Y_Table_Position);
  $pdf->SetX(40);
  $pdf->MultiCell(30,6,$columna_cognom1,1);
  $pdf->SetY($Y_Table_Position);
  $pdf->SetX(70);
  $pdf->MultiCell(30,6,$columna_cognom2,1,'L');
  $pdf->SetY($Y_Table_Position);
  $pdf->SetX(100);
  $pdf->MultiCell(30,6,$columna_numero_document,1,'L');
  $pdf->SetY($Y_Table_Position);
  $pdf->SetX(130);
  $pdf->MultiCell(40,6,$columna_nom_atraccio,1,'L');
  $pdf->SetY($Y_Table_Position);
  $pdf->SetX(170);
  $pdf->MultiCell(50,6,$columna_data_inici_assign,1,'L');
  $pdf->SetY($Y_Table_Position);
  $pdf->SetX(220);
  $pdf->MultiCell(50,6,$columna_data_fi_assign,1,'L');
  $i = 0;
  $pdf->SetY($Y_Table_Position);
  while ($i < $numero_de_assignacions)
  {
      $pdf->SetX(20);
      $pdf->MultiCell(250,6,'',1);
      $i = $i +1;
  }
  $pdf->Output('llistatAssignacions.pdf','D');
}
}
?>
