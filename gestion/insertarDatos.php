<?php

include("conexion.php");
$con = conectar();

$nombre = $_POST["nombre"];
$pass = MD5($_POST["pass"]);
$rol = 2;
$idCiudad = $_POST["idCiudad"];

$sql = "INSERT INTO users (nombre, pass, idRol,idCiudad) VALUES ('".$nombre."', '".$pass."',".$rol.",".$idCiudad.");";
if (!$resultado = $con->query($sql)) {
    echo "Lo sentimos, este sitio web está experimentando problemas.";
    exit;
}

header('Location:insertar.php');

?>