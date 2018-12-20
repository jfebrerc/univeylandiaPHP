<?php
include_once $_SERVER['DOCUMENT_ROOT']."/php/connection.php";
class Foto{

  public static function muntarFoto($muntar){
    $target_dir = ['DOCUMENT_ROOT']."/fotos_atraccio";
    $target_file = $target_dir . basename($_FILES[$muntar]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES[$muntar]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
  }
}


?>
