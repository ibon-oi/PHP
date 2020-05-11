<?php
include("conexion.php");
$con = conectar();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Insertar Usuarios</title>

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
  <form action="insertarDatos.php" method="post" class="formulario">
    <div class="form-group">
      <label for="exampleInputText">Nombre</label>
      <input type="text" name="nombre" class="form-control" id="exampleInputText" aria-describedby="textlHelp" placeholder="Introduce nombre" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Contraseña</label>
      <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Introduce contraseña" required>
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Ciudad</label>
      <select name="idCiudad" class="form-control" id="exampleFormControlSelect1" required>
        <option value=''>Selecciona una ciudad</option>
        <?php
        $sql_ciudades = 'SELECT id, nombre FROM ciudades ORDER BY nombre';
        $resultado_ciudades = $con->query($sql_ciudades);
        while ($fila_ciudades = $resultado_ciudades->fetch_assoc()) {
          echo "<option value=" . $fila_ciudades['id'] . ">" . $fila_ciudades['nombre'] . "</option>";
        }
        ?>

      </select>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
</section>
<section id="seccion2">
    <h3>Listado de usuarios</h3>
    <?php
    $sql = 'SELECT users.nombre as u_nombre, ciudades.nombre as c_nombre FROM users inner join ciudades where users.idCiudad =  ciudades.id';
    if (!$resultado = $con->query($sql)) {
      echo "Lo sentimos, este sitio web está experimentando problemas.";
      exit;
    }

    // Imprimir listado de nombres de usuarios
    echo "<ul>";
    while ($fila_usuarios = $resultado->fetch_assoc()) {
      echo "<li>";
      echo $fila_usuarios['u_nombre'] . ". Cludad: " . $fila_usuarios['c_nombre'];
      echo "</li>";
    }
    echo "</ul>";

    ?>
  </section>
    <?php include("footer.php"); ?>
  </body>
</html>