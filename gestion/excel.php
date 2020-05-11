<?php 
include("conexion.php");
$con = conectar();

header("Pragma: public");
header("Expires: 0");
$filename = "Listado_de_usuario.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

?>
<table>
<tbody>
<tr>
<th>
<h2>Listado de usuarios</h2>
</th>
</tr>
<tr>
    <td>Nombre</td><td>Ciudad</td>
</tr>
<?php
$sql = 'SELECT users.nombre as u_nombre, ciudades.nombre as c_nombre FROM users inner join ciudades where users.idCiudad =  ciudades.id';
if (!$resultado = $con->query($sql)) {
    echo "Lo sentimos, este sitio web está experimentando problemas.";
    exit;
}

// Imprimir listado de nombres de usuarios
echo "<ul>";
while ($fila_usuarios = $resultado->fetch_assoc()) {
    echo "<tr>";
        echo "<td>".$fila_usuarios['u_nombre']."</td><td>".$fila_usuarios['c_nombre']."</td>";
    echo "</tr>";
}
echo "</ul>";
?>


</tbody>
</table>