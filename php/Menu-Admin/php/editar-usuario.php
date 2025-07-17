<?php
$id_user = $_REQUEST['id_user'];
$nombre = $_REQUEST['nombre'];
$telefono = $_REQUEST['telefono'];
$fecha_nacimiento = $_REQUEST['fecha_nacimiento'];
$correo = $_REQUEST['correo'];

include '../../../Logica/conexion.php';

$sqlEditar = "UPDATE usuario SET nombre = '$nombre', telefono = '$telefono', fecha_nacimiento = '$fecha_nacimiento', correo = '$correo' WHERE id_user = '$id_user'";
mysqli_query($conn, $sqlEditar);
echo '<script>window.location.href = "../Home-Super-Admin.php";</script>';
?>