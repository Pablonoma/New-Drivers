<?php 
include('../../../Logica/DAO/Alumno/DAO-Alumno.php');
$dao = new DAO();

session_start();
$solicitud_id = $_SESSION['solicitud'];
$respuesta = $_GET['estado_pago'];

if($respuesta == 'pagado'){

    $pago = $dao->pagar($solicitud_id);

    if($pago === true){
        header('Location:../Clases-Extras.php?response=success');
    }else{
        header('Location:../Clases-Extras.php?response=error_support');
    }
}else{
    header('Location:../Clases-Extras.php?response=error');
}

?>