<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location: index.php");
}
?>
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/php/classes/classeClient.php";

if (!empty($_POST)) {
  $client = new Client($_POST['email'],$_POST['password']);

  if($client->validarLogin() == false)
  {
    include_once $_SERVER['DOCUMENT_ROOT']."/php/classes/classeEmpleat.php";
    $empleat = new Empleat($_POST['email'],$_POST['password']);
    if($empleat->validarLogin() == false)
    {
      echo "NO ESTAS REGISTRAT";
    }
    else {
      header('Location: ../gestio/index.php');
    }
  }
  else {
    header('Location: ../index.php');
  }
}

?>

<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/icon.png">

    <title>Parc Atraccions Univeylandia</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="css/login.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <!--<form class="form-signin" method="post" action="php/validateLogin.php">-->
    <form class="form-signin" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
      <img class="mb-4" src="img/logo.png" alt="" width="220" height="75">
      <h1 class="h3 mb-3 font-weight-normal">Noi fica les teves dades</h1>
      <label for="inputEmail" class="sr-only">Usuari</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" value="<?php echo $_COOKIE['idu'];?>" required autofocus>
      <label for="inputPassword" class="sr-only">Contrasenya</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Contrasenya" name="password" required>
      <div class="checkbox mb-3">
        <input type="checkbox" name="remember" <?php if (isset($_COOKIE['idu'])) {
          echo 'checked=""';
        } else {
            echo '';
        }
        ?>>
        <label>Recordar usuari</label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sessio</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>
</html>
