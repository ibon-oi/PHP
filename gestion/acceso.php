<?php
include("conexion.php");
$con = conectar();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Acceso</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
  </head>

  <body>

  <header id="header">
    <img id="header-img" src="img/logo-example.jpg">
    <?php include("navigator.php"); ?>
</header>

<section id="seccion1">
  
  <form action="acceder.php" method="post" class="formulario">
    <div class="form-group">
      <label for="exampleInputText">Nombre</label>
      <input type="text" name="nombre" class="form-control" id="exampleInputText" aria-describedby="textlHelp" placeholder="Introduce nombre" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Contraseña</label>
      <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Introduce contraseña" required>
    </div>
    <button type="submit" class="btn btn-primary">Acceder</button>
  </form>
</section>
<section id="seccion2">
  <?php
      session_start();
      if (isset( $_SESSION['fallo'])){
        if ($_SESSION['fallo'] == 1){
        ?>
          <div class="alert alert-danger" role="alert">
            Solo podrá acceder el administrador
          </div>
        <?php
        }
      }   
    ?>
</section>

    <?php include("footer.php"); ?>
  </body>
</html>