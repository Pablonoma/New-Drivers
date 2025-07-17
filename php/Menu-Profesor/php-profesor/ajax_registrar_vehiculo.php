<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../../../Logica/DAO/Profesor/DAO-Profesor.php'; // Reemplaza 'tu_archivo_dao.php' con la ruta correcta a tu archivo DAO

    $dao = new DAO();

    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $personas = $_POST['personas'];
    $combustible = $_POST['combustible'];
    $doble_comando = $_POST['doble_comando'];
    $transmision = $_POST['transmision'];
    $patente = $_POST['patente'];
    $id_profe = $_POST['id_profe'];

    $rutaArchivos = "../../../Logica/uploads";

    $file = $_FILES['file'];
    $fileNombre = $file['name'];
    move_uploaded_file($file["tmp_name"], "../../../Logica/uploads/$fileNombre");

    $resultado = $dao->registrarVehiculo($modelo, $ano, $personas, $combustible, $doble_comando, $transmision, $patente,
                                         $fileNombre, $id_profe);

    if ($resultado === true) {
        echo "success"; // Envía una respuesta de éxito
    } else {
        echo "error"; // Envía una respuesta de error general
    }
    
}
?>