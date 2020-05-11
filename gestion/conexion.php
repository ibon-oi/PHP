<?php

function conectar(){
    $user = "root";
    $pass = "root";
    $server = "localhost";
    $db = "bd";
    $con = mysqli_connect($server,$user,$pass,$db) or die("Error al conectar".mysqli_error($con));
    return $con;
}
?>