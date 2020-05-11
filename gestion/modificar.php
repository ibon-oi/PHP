<?php
include("conexion.php");
$con = conectar();

$id_user = $_GET['id'];

$editar = 0;
if (isset($_POST['editar']))
  $editar = $_POST['editar'];

if ($editar == 0) {
  $sql = 'SELECT nombre, idCiudad FROM users where id=' . $id_user;
  if (!$resultado = $con->query($sql)) {
    echo "Lo sentimos, este sitio web está experimentando problemas.";
    exit;
  }
  if ($fila_usuarios = $resultado->fetch_assoc()) {
    $u_nombre = $fila_usuarios['nombre'];
    $u_idCiudad = $fila_usuarios['idCiudad'];
  }
} else {
  $editar = $_POST['editar'];
  //if ($editar != 0){
  $nombre = $_POST['nombre'];
  $idCiudad = $_POST['idCiudad'];

  $sql_update = "UPDATE users SET nombre = '" . $nombre . "', idCiudad = " . $idCiudad . " WHERE id=" . $id_user;
  if (!$resultado_update = $con->query($sql_update)) {
    echo "Lo sentimos, este sitio web está experimentando problemas.";
    exit;
  }

  header('Location:gestionar.php');

  //}
}


?>
<!DOCTYPE html>
<html>
<header id="header">
  <title>Modificar Usuarios</title>

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
    <img id="header-img" src="img/logo-example.jpg">
    <?php include("navigator.php"); ?>
</header>
<section id="seccion1">
  <h2>Editar usuario</h2>
  </section>
  <section id="seccion2">
  <form method="post" class="formulario">
    <div class="form-group">
      <label for="exampleInputText">Nombre</label>
      <input type="text" name="nombre" class="form-control" id="exampleInputText" aria-describedby="textlHelp" placeholder="Introduce nombre" value='<?php echo $u_nombre; ?>' required>
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Ciudad</label>
      <select name="idCiudad" class="form-control" id="exampleFormControlSelect1" required>
        <option value=''>Selecciona una ciudad</option>
        <?php
        $sql_ciudades = 'SELECT id, nombre FROM ciudades ORDER BY nombre';
        $resultado_ciudades = $con->query($sql_ciudades);
        while ($fila_ciudades = $resultado_ciudades->fetch_assoc()) {
          if ($fila_ciudades['id'] == $u_idCiudad) {
            echo "<option value=" . $fila_ciudades['id'] . " SELECTED>" . $fila_ciudades['nombre'] . "</option>";
          } else {
            echo "<option value=" . $fila_ciudades['id'] . ">" . $fila_ciudades['nombre'] . "</option>";
          }
        }
        ?>

      </select>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <input type='hidden' value=1 name='editar'>
  </form>
</section>
<?php include("footer.php"); ?>

</body>

</html>