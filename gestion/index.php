<?php
session_start();
$_SESSION['fallo'] = 0;

include("conexion.php");
$con = conectar();
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Inicio</title>

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
            <div id="l_usuarios">
                <h4>Listado de usuarios</h4>
                <?php
                $sql = 'SELECT nombre FROM users order by nombre';
                if (!$resultado = $con->query($sql)) {
                    echo "Lo sentimos, este sitio web está experimentando problemas.";
                    exit;
                }

                // Imprimir listado de nombres de usuarios
                echo "<ul>";
                while ($usuarios = $resultado->fetch_assoc()) {
                    echo "<li>";
                    echo $usuarios['nombre'];
                    echo "</li>";
                }
                echo "</ul>";
                ?>
            </div>
            <div id="l_ciudades">
                <h4>Listado de ciudades</h4>
                <?php

                $sql_c = 'SELECT nombre FROM ciudades order by nombre';
                if (!$resultado_c = $con->query($sql_c)) {
                    echo "Lo sentimos, este sitio web está experimentando problemas.";
                    exit;
                }

                // Imprimir listado de nombres de ciudades
                echo "<ul>";
                while ($ciudades = $resultado_c->fetch_assoc()) {
                    echo "<li>";
                    echo $ciudades['nombre'];
                    echo "</li>";
                }
                echo "</ul>";
                ?>
            </div>
        </section>
        <section id="seccion2">
            <p id="parrafo">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fringilla congue purus varius tempor. Nulla sit amet massa felis. Donec iaculis nulla nec leo suscipit vestibulum. Curabitur dignissim augue et eros bibendum, dignissim pulvinar est sodales. Vivamus quis justo sit amet sapien vehicula placerat. Pellentesque placerat blandit enim, ultrices consequat sapien gravida vel. Mauris sed consectetur urna. Sed rhoncus neque id felis vulputate, rutrum volutpat justo facilisis. Curabitur imperdiet sagittis leo at volutpat. Nunc cursus lobortis ipsum, vel vehicula ipsum faucibus quis. Nullam quis tincidunt metus.
            </p>
        </section>

        <?php include("footer.php"); ?>

</body>

</html>