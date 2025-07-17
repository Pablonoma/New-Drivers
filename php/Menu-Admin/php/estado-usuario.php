<?php
include('../../../Logica/DAO/Super-Admin/DAO-Gestion-Estudiantes.php');
$dao = new DAO();

$id = $_POST['id'];
$estado = $_POST['estado'];

if($estado == 'habilitar'){
    $dao->habilitarUsuario($id);
}
else if($estado == 'deshabilitar'){
    $dao->deshabilitarUsuario($id);
}
?>