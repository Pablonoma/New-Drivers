<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../../../Logica/DAO/DAO-Inicio-Sesion.php'; // Reemplaza 'tu_archivo_dao.php' con la ruta correcta a tu archivo DAO

    $dao = new DAO();

    $nombre = $_POST['nombre'];
    $numero = $_POST['numero'];
    $fechaN = $_POST['fechaN'];
    $correo = $_POST['correo'];
    $ubicacion = $_POST['ubicacion'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $resultado = $dao->registrarUsuario($nombre, $numero, $fechaN, $correo, $password, $password2, $ubicacion);

    if ($resultado === true) {
        echo "success"; // Envía una respuesta de éxito
    } elseif ($resultado === 0) {
        echo "error_password"; // Envía una respuesta de error de contraseñas no coincidentes
    } else {
        echo "error"; // Envía una respuesta de error general
    }
}
?>