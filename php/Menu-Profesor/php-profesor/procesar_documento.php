<?php

/**
 * Inicia la sesión del servidor
 */

use Random\IntervalBoundary;

session_start();
/**
 * Incluye el Model Data el cual genera la conexión a la base de datos
 * @var Data $data Una instancia del objeto Data.
 */

include('../../../Logica/conexion.php'); // Asegúrate de incluir tu archivo de conexión a la base de datos

/**
 * Se inicializa el objeto dao y se obtiene la conexión a la base de datos.
 * @var DAO $dao Una instancia del objeto DAO.
 */
/**
 * Obtiene el valor del parámetro 'flag' enviado por GET y ejecuta las acciones correspondientes según el valor.
 * @var string $flag El valor del parámetro 'flag'.
 */
$flag = $_GET['flag'];
$id_profe = $_SESSION['id_profe'];
$carpeta_destino = "../../../Logica/uploads/";


require('../../../Logica/DAO/Profesor/DAO-Profesor.php');
$dao = new DAO();

$datosProfesor = $dao->buscarProfesorPorId($_SESSION['id_profe']);
$experiencia = $datosProfesor[0];
$licencia = $datosProfesor[1];
$cedula = $datosProfesor[2];
$hojaDeVida = $datosProfesor[3];
$capacitacion = $datosProfesor[4];
$semep = $datosProfesor[5];
$descripcion_prof = $datosProfesor[6];
$descripcion_clase = $datosProfesor[7];


if ($flag == "licencia") {

    if (isset($_FILES["archivo1"])) {
        $archivo_nombre = $_FILES["archivo1"]["name"];
        $archivo_subida_nombre = time() . $archivo_nombre;
        $archivo_temp = $_FILES["archivo1"]["tmp_name"];
        $archivos = $archivo_subida_nombre;
        $file_path = $carpeta_destino . $archivo_nombre; // Ruta completa del archivo subido



        $resultado = $dao->actualizarlicencia($archivos, $id_profe);
        if ($resultado === true) {
            // Mover el nuevo archivo a la carpeta especificada
            if (move_uploaded_file($archivo_temp, $carpeta_destino . $archivo_subida_nombre)) {
                echo "success";
            } else {
                echo "error";
            }
        } else {
            echo "error";
        }


    }
}

if ($flag == "cedula") {

    if (isset($_FILES["archivo2"])) {
        $archivo_nombre = $_FILES["archivo2"]["name"];
        $archivo_subida_nombre = time() . $archivo_nombre;
        $archivo_temp = $_FILES["archivo2"]["tmp_name"];
        $archivos = $archivo_subida_nombre;
        $file_path = $carpeta_destino . $archivo_nombre; // Ruta completa del archivo subido



        $resultado = $dao->actualizarCedula($archivos, $id_profe);
        if ($resultado === true) {
            // Mover el nuevo archivo a la carpeta especificada
            if (move_uploaded_file($archivo_temp, $carpeta_destino . $archivo_subida_nombre)) {
                echo "success";
            } else {
                echo "error";
            }
        } else {
            echo "error";
        }


    }
}

if ($flag == "hojaVida") {

    if (isset($_FILES["archivo3"])) {
        $archivo_nombre = $_FILES["archivo3"]["name"];
        $archivo_subida_nombre = time() . $archivo_nombre;
        $archivo_temp = $_FILES["archivo3"]["tmp_name"];
        $archivos = $archivo_subida_nombre;
        $file_path = $carpeta_destino . $archivo_nombre; // Ruta completa del archivo subido



        $resultado = $dao->actualizarHojaVida($archivos, $id_profe);
        if ($resultado === true) {
            // Mover el nuevo archivo a la carpeta especificada
            if (move_uploaded_file($archivo_temp, $carpeta_destino . $archivo_subida_nombre)) {
                echo "success";
            } else {
                echo "error";
            }
        } else {
            echo "error";
        }


    }
}

if ($flag == "capacitacion") {

    if (isset($_FILES["archivo4"])) {
        $archivo_nombre = $_FILES["archivo4"]["name"];
        $archivo_subida_nombre = time() . $archivo_nombre;
        $archivo_temp = $_FILES["archivo4"]["tmp_name"];
        $archivos = $archivo_subida_nombre;
        $file_path = $carpeta_destino . $archivo_nombre; // Ruta completa del archivo subido



        $resultado = $dao->actualizarCapacitacion($archivos, $id_profe);
        if ($resultado === true) {
            // Mover el nuevo archivo a la carpeta especificada
            if (move_uploaded_file($archivo_temp, $carpeta_destino . $archivo_subida_nombre)) {
                echo "success";
            } else {
                echo "error";
            }
        } else {
            echo "error";
        }


    }
}

if ($flag == "semep") {

    if (isset($_FILES["archivo5"])) {
        $archivo_nombre = $_FILES["archivo5"]["name"];
        $archivo_subida_nombre = time() . $archivo_nombre;
        $archivo_temp = $_FILES["archivo5"]["tmp_name"];
        $archivos = $archivo_subida_nombre;
        $file_path = $carpeta_destino . $archivo_nombre; // Ruta completa del archivo subido



        $resultado = $dao->actualizarSemep($archivos, $id_profe);
        if ($resultado === true) {
            // Mover el nuevo archivo a la carpeta especificada
            if (move_uploaded_file($archivo_temp, $carpeta_destino . $archivo_subida_nombre)) {
                echo "success";
            } else {
                echo "error";
            }
        } else {
            echo "error";
        }


    }
}

?>
