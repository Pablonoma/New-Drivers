<?php
include('../../../Logica/DAO/Profesor/DAO-Profesor.php');
$dao = new DAO();

$id_alumn = $_POST['id_alumno'];
$estado = $_POST['estado'];
$id_solicitud = $_POST['id_solicitud'];

if($estado == 'Teórico'){
    $cantidadClasesT = $dao->contadorClasesTeoricasFin($id_alumn,$id_solicitud);
    if ($cantidadClasesT >= 12) {
        echo "success_teorico";
    }else{
        echo "error_teorico";
    }

}else{
    $cantidadClasesP = $dao->contadorClasesPracticasFin($id_alumn,$id_solicitud);
    if ($cantidadClasesP >= 12) {
        echo "success_practice";
    }else{
        echo "error_practice";
    }
}




?>