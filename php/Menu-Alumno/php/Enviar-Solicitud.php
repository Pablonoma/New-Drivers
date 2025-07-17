<?php
include('../../../Logica/DAO/Alumno/DAO-Alumno.php');
$dao = new DAO();

$id_alumno = $_POST['id_alumno'];
$id_profesor = $_POST['id_profesor'];

$validarClasesFinalizadas = $dao->validarClaseFinalizada($id_alumno, $id_profesor);

if($validarClasesFinalizadas == 0){
    $resultado = $dao->enviarSolicitud($id_alumno, $id_profesor);
    if($resultado === true){
        echo 'success';
    }else{
        echo 'error';
    }
}else{
    echo 'curso_no_completado';
}

?>