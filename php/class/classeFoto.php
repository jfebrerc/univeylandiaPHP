<?php
include_once $_SERVER['DOCUMENT_ROOT']."/php/connection.php";
class Foto{

  public static function muntarFoto(){
    $target_dir = "../../fotos_atraccio/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $arxiu2 = $target_dir . "marcaAigua_".basename($_FILES["fileToUpload"]["name"]);
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
        $uploadOk = 1;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Error, domes es permeten els formats:JPG, JPEG, PNG & GIF.";
        $uploadOk = 1;
    }
    if ($uploadOk == 0) {
        echo "Error: la imatge no s'ha muntat.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "La imatge ". basename( $_FILES["fileToUpload"]["name"]). " s'ha muntat correctament.";
        } else {
            echo "Error: la imatge no s'ha muntat. Error al muntar-la";
        }
        if ($uploadOk == 1) {
          $aigua = "../../fotos_atraccio/marcaAigua.png";
          list($srcWidth, $srcHeight) = getimagesize($target_file);

          $src = imagecreatefrompng($aigua);
          $dest = imagecreatefrompng($target_file);
          $src_xPosition = 10; //10 pixels from the left
          $src_yPosition = 10; //10 pixels from the top

          //set the x and y positions of the source image to be copied to the destination image
          $src_cropXposition = 0; //do not crop on the side
          $src_cropYposition = 0; //do not crop at the top

          /*imagealphablending($dest, false);
          imagesavealpha($dest, true);*/
          imagecopy($dest,$src,$src_xPosition,$src_yPosition,$src_cropXposition,$src_cropYposition,$srcWidth,$srcHeight);
          //imagecopymerge($dest, $src, 10, 9, 0, 0, 181, 180, 100); //have to play with these numbers for it to work for you, etc.
          imagepng($dest,$arxiu2);

        /*  header('Content-Type: image/png');
          imagepng($dest);*/

          imagedestroy($dest);
          imagedestroy($src);
          echo "Marca aigua generada";
      }


    }
  }

}


?>
