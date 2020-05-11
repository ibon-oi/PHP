<?php
    include("conexion.php");
    $con = conectar();
?>
<!DOCTYPE html>
<html>
  <head>

    <title>Gestionar Usuarios</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- -->
    <!-- font awesome -->
    
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <!-- -->

    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<header id="header">
  <img id="header-img" src="img/logo-example.jpg">
  <?php include("navigator.php"); ?>
</header>
<section id="seccion1">
    <h3>Listado de usuarios <a href='excel.php'><button type="button" class="btn btn-success"><i class='icon-download'></i> Descargar a Excel</button></a></h3>  
</section>
<section id="seccion2">
    <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Ciudad</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
    
      <?php
          $sql = 'SELECT users.id as u_id, users.nombre as u_nombre, ciudades.nombre as c_nombre FROM users inner join ciudades where users.idCiudad =  ciudades.id and users.id != 7 order by users.nombre';
          if (!$resultado = $con->query($sql)) {
              echo "Lo sentimos, este sitio web está experimentando problemas.";
              exit;
          }

          // Imprimir listado de nombres de usuarios
          while ($fila_usuarios = $resultado->fetch_assoc()) {
              echo " <tr>";
                echo "<td>".$fila_usuarios['u_nombre']."</td>";
                echo "<td>".$fila_usuarios['c_nombre']."</td>";
                echo "<td><a href='modificar.php?id=".$fila_usuarios['u_id']."'> <i class='icon-edit icon-2x'></i> </a>";
                echo "<a href='eliminar.php?id=".$fila_usuarios['u_id']."'> <i class='icon-trash icon-2x'></i> </a></td>";
              echo "</tr>";
          }
      ?>
  </tbody>
  </table>

</section>

<?php include("footer.php"); ?>

</body>
</html>

