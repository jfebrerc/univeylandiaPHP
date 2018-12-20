<?php
include_once $_SERVER['DOCUMENT_ROOT']."/php/connection.php";
class Foto{

  public static function muntarFoto(){
    $target_dir = "../../fotos_atraccio/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $target_file2 = $target_dir . "marcaAigua.".basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "L'arxiu es una imatge - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "L'arxiu no es una imatge.";
            $uploadOk = 0;
        }
    }
    if (file_exists($target_file)) {
        echo "La imatge ja existeix.";
        $uploadOk = 0;
    }
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Imatge massa gran.";
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Error, domes es permeten els formats:JPG, JPEG, PNG & GIF.";
        $uploadOk = 1;
    }
    if ($uploadOk == 0) {
        echo "Error: la imatge no s'ha muntat.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file2)) {
            echo "La imatge ". basename( $_FILES["fileToUpload"]["name"]). " s'ha muntat correctament.";
        } else {
            echo "Error: la imatge no s'ha muntat.";
        }
    }
  }
}


?>
