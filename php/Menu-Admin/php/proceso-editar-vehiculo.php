<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../../../Logica/DAO/Super-Admin/DAO-Gestion-Estudiantes.php'; // Reemplaza 'tu_archivo_dao.php' con la ruta correcta a tu archivo DAO

    $dao = new DAO();

    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $personas = $_POST['personas'];
    $combustible = $_POST['combustible'];
    $doble_comando = $_POST['doble_comando'];
    $transmision = $_POST['transmision'];
    $patente = $_POST['patente'];
    $id_auto = $_POST['id_auto'];

    $resultado = $dao->editarVehiculo($modelo, $ano, $personas, $combustible, $doble_comando, $transmision, $patente,$id_auto);

    if ($resultado === true) {
        echo "success"; // Envía una respuesta de éxito
    } else {
        echo "error"; // Envía una respuesta de error general
    }
    
}
?>