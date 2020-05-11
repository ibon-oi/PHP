<?php

include("conexion.php");
$con = conectar();

$nombre = $_POST["nombre"];

$sql = "INSERT INTO ciudades (nombre) VALUES ('".$nombre."');";
if (!$resultado = $con->query($sql)) {
    echo "Lo sentimos, este sitio web está experimentando problemas.";
    exit;
}

header('Location:insertar_ciudades.php');

?>