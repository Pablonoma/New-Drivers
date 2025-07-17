<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../../../Logica/DAO/DAO-Inicio-Sesion.php'; // Reemplaza 'tu_archivo_dao.php' con la ruta correcta a tu archivo DAO

    $dao = new DAO();

    $nombre = $_POST['nombre'];
    $numero = $_POST['numero'];
    $fechaN = $_POST['fechaN'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $descripcion = $_POST['descripcion'];
    $ubicacion = $_POST['ubicacion'];
    $experiencia = $_POST['experiencia'];
    $rutaArchivos = "../../../Logica/uploads";

    $licencia = $_FILES['licencia'];
    $cedula = $_FILES['cedula'];
    $hojaDeVida = $_FILES['hojaDeVida'];
    $capacitacion = $_FILES['capacitacion'];
    $semep = $_FILES['semep'];

    $licenciaNombre = $licencia['name'];
    $cedulaNombre = $cedula['name'];
    $hojaDeVidaNombre = $hojaDeVida['name'];
    $capacitacionNombre = $capacitacion['name'];
    $semepNombre = $semep['name'];

    $descripcion = $_POST['descripcion'];
    move_uploaded_file($licencia["tmp_name"], "../../../Logica/uploads/$licenciaNombre");
    move_uploaded_file($cedula["tmp_name"], "../../../Logica/uploads/$cedulaNombre");
    move_uploaded_file($hojaDeVida["tmp_name"], "../../../Logica/uploads/$hojaDeVidaNombre");
    move_uploaded_file($capacitacion["tmp_name"], "../../../Logica/uploads/$capacitacionNombre");
    move_uploaded_file($semep["tmp_name"], "../../../Logica/uploads/$semepNombre");


    $resultado = $dao->registrarProfesor($nombre, $numero, $fechaN, $correo, $password, $password2,$experiencia, $licenciaNombre,
                                         $cedulaNombre, $hojaDeVidaNombre, $capacitacionNombre, $semepNombre, $descripcion, $ubicacion);

    if ($resultado === true) {
        echo "success"; // Envía una respuesta de éxito
    } elseif ($resultado === 0) {
        echo "error_password"; // Envía una respuesta de error de contraseñas no coincidentes
    } else {
        echo "error"; // Envía una respuesta de error general
    }
    
}
?>