<?php

include("conexion.php");
$con = conectar();

$id = $_GET["id"];

$sql_delete = "DELETE FROM users WHERE id=".$id;
if (!$resultado_delete = $con->query($sql_delete)) {
    echo "Lo sentimos, este sitio web está experimentando problemas.";
    exit;
}

header('Location:gestionar.php');

?>