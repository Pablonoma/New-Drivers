<?php
include('../../../Logica/DAO/Profesor/DAO-Profesor.php');
$dao = new DAO();

$id_auto = $_POST['id_auto'];
$estado = $_POST['estado'];

if($estado == 'habilitar'){
    $dao->habilitarVehiculo($id_auto);
}
else if($estado == 'deshabilitar'){
    $dao->deshabilitarVehiculo($id_auto);
}
?>