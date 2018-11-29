<?php
include_once $_SERVER['DOCUMENT_ROOT']."/php/connection.php";

class Habitacio
{
    private $idHab;
    private $numHab;
    private $tipusHab;


    /* CONSTRUCTORS */
    public function __construct()
    {
        $args = func_get_args();
        $num = func_num_args();
        $f='__construct'.$num;
        if (method_exists($this, $f)) {
            call_user_func_array(array($this,$f), $args);
        }
    }

    /* Constructor BUIT */
    public function __construct0()
    {
    }

    public function __construct2($numHab, $tipusHab)
    {
        $this->numHab = $numHab;
        $this->tipusHab = $tipusHab;
    }

    /* GETTERS */
    public function getIdHab()
    {
        return $this->idHab;
    }

    public function getNumHab()
    {
        return $this->numHab;
    }

    public function getTipusHab()
    {
        return $this->tipusHab;
    }

    /* SETTERS */
    public function setNumHab($numHab)
    {
        $this->numHab = $numHab;
    }

    public function setTipusHab($tipusHab)
    {
        $this->tipusHab = $tipusHab;
    }

    /* MÈTODES */
    public function crearHabitacio()
    {
        try {
            $conn = createConnection();

            if ($conn->connect_error) {
                die("Connexió fallida: " . $conn->connect_error);
            }

            $sql = "INSERT INTO HABITACIO (num_habitacio, id_tipus_habitacio) VALUES (?,?);";

            $stmt = $conn->prepare($sql);

            $stmt->bind_param("si", $this->numHab, $this->tipusHab);

            if ($stmt->execute()) {
                //Cerramos la conexión y la sentencia
                $stmt->close();
                $conn->close();
                //Retornamos true, consulta satisfactoria
                return true;
            }
            //Sino surgió algún error y retornamos una cadena de error.
            else {
                $stmt->close();
                $conn->close();
                return 'Error en el INSERT';
            }
            //Si surge alguna excepción la capturamos e imprimimos,
      //retornamos false
        } catch (Exception $e) {
            echo $e;
            $stmt->close();
            $conn->close();
            return false;
        }
    }

    /* Mètode que depen de la classe, no d'un objecte */
    public static function llistarHabitacio()
    {
        $conn = createConnection();

        if ($conn->connect_error) {
            die("Connexió fallida: " . $conn->connect_error);
        }

        $sql = "SELECT HABITACIO.id_habitacio, HABITACIO.num_habitacio, TIPUS_HABITACIO.nom_tipus_habitacio FROM HABITACIO, TIPUS_HABITACIO WHERE HABITACIO.id_tipus_habitacio = TIPUS_HABITACIO.id_tipus_habitacio";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<thead class="thead-light">';
            echo '<tr>';
            //echo '<th>ID</th>';
            echo '<th>Número habitació</th>';
            echo '<th>Tipus habitació</th>';
            echo '</tr>';
            echo '</thead>';

            while ($row = $result->fetch_assoc()) {
                echo '<tbody>';
                echo '<tr>';
                echo '<td style="display:none;">'.$row['id_habitacio'].'</td>';
                echo '<td>'.$row['num_habitacio'].'</td>';
                echo '<td>'.$row['nom_tipus_habitacio'].'</td>';
                echo '<td><button class="btn btn-primary btn-sm">Modificar</button></td>';
                echo '<td><button class="btn btn-secondary btn-sm">Eliminar</button></td>';
                echo '</tr>';
                echo '</tbody>';
            }
        } else {
            echo "0 resultats";
        }
        $conn->close();
    }

    public static function llistarTipusHabitacio()
    {
        $conn = createConnection();

        if ($conn->connect_error) {
            die("Connexió fallida: " . $conn->connect_error);
        }

        $sql = "SELECT id_tipus_habitacio, nom_tipus_habitacio FROM TIPUS_HABITACIO ORDER BY id_tipus_habitacio";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<option value="'.$row['id_tipus_habitacio'].'">'.$row['nom_tipus_habitacio'].'';
            }
        } else {
            echo "0 resultats";
        }

        $conn->close();
    }
}
