<?php
include("conexion.php");
$con = conectar();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Insertar Ciudades</title>

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
  <form action="insertarCiudad.php" method="post" class="formulario">
    <div class="form-group">
      <label for="exampleInputText">Nombre de la ciudad</label>
      <input type="text" name="nombre" class="form-control" id="exampleInputText" aria-describedby="textlHelp" placeholder="Introduce nombre de la ciudad" required>
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
</section>
<section id="seccion2">
    <h3>Listado de ciudades</h3>
    <?php
    $sql = 'SELECT nombre FROM ciudades order by nombre';
    if (!$resultado = $con->query($sql)) {
      echo "Lo sentimos, este sitio web está experimentando problemas.";
      exit;
    }

    // Imprimir listado de nombres de usuarios
    echo "<ul>";
    while ($fila_usuarios = $resultado->fetch_assoc()) {
      echo "<li>";
      echo $fila_usuarios['nombre'];
      echo "</li>";
    }
    echo "</ul>";

    ?>
  </section>
    <?php include("footer.php"); ?>
  </body>
</html>