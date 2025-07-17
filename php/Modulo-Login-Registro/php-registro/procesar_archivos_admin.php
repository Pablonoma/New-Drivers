<?php
include '../../../Logica/DAO/DAO-Inicio-Sesion.php';

// Directorio de destino para los archivos
$carpeta_destino = "../../../Logica/uploads/";
// Inicializa un array para almacenar los nombres de archivo
$archivos = array();

// Procesa los archivos y almacena los nombres en el array
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    for ($i = 1; $i <= 5; $i++) {
        if (isset($_FILES["archivo$i"])) {
            $archivo_nombre = $_FILES["archivo$i"]["name"];
            $archivo_subida_nombre = time() . $archivo_nombre;
            $archivo_temp = $_FILES["archivo$i"]["tmp_name"];
            $archivos["archivo$i"] = $archivo_subida_nombre;

            // Mueve el archivo a la carpeta de destino
            move_uploaded_file($archivo_temp, $carpeta_destino . $archivo_subida_nombre);
        }
    }

    // Obtiene la descripción y otros datos del formulario
    $nombre = $_POST['nombre'];
    $numero = $_POST['numero'];
    $fechaN = $_POST['fechaN'];
    $correo = $_POST['correo'];
    $ubicacion = $_POST['ubicacion'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $experiencia = $_POST['experiencia'];
    $descripcion = $_POST['descripcion'];

    // Incluye el archivo que contiene la función

    // Llama a la función para registrar al profesor
    $funciones = new dao(); // Instancia la clase o crea un objeto
    $result = $funciones->registrarProfesorSuperAdmin($nombre, $numero, $fechaN, $correo, $password, $password2,
    $archivos["archivo1"], $archivos["archivo2"], $archivos["archivo3"], $archivos["archivo4"], $archivos["archivo5"], $descripcion, $ubicacion, $experiencia);

     if ($result === true) {
        echo "success"; // Envía una respuesta de éxito
    } elseif ($result === 0) {
        echo "error_password"; // Envía una respuesta de error de contraseñas no coincidentes
    } elseif ($result === 1) {
        echo "error_mail"; // Envía una respuesta de error de contraseñas no coincidentes
    } else {
        echo "error"; // Envía una respuesta de error general
    }
}

?>
