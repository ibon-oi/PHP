<?php

session_start();

include("conexion.php");
$con = conectar();

$nombre = $_POST["nombre"];
$pass = MD5($_POST["pass"]);

$sql_busca = "select * from users where nombre = '".$nombre."' and pass = '".$pass."' and idRol = 1";
if (!$resultado_busca = $con->query($sql_busca)) {
    echo "Lo sentimos, este sitio web está experimentando problemas.";
    exit;
}

if ($resultado_busca->num_rows == 0){
    $_SESSION['fallo'] = 1;
    header('Location:acceso.php');
}else{
    header('Location:insertar_ciudades.php');
}


?>