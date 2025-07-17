<?php
include('../../../Logica/DAO/Profesor/DAO-Profesor.php');
$dao = new DAO();

$id = $_POST['id_solicitud'];
$total = $dao->contadorClaseExtra($id);
if ($total > 0) {
    $resultadoExtra = $dao->aceptarAlumnoExtra($id);

    if ($resultadoExtra === true) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    $resultado = $dao->aceptarAlumno($id);

    if ($resultado === true) {
        echo 'success';
    } else {
        echo 'error';
    }
}
