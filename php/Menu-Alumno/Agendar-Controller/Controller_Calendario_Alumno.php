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


if ($flag == "agendarClaseTeorica") {
    // Si la solicitud es un GET, se obtienen los eventos del calendario
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $id = intval($_GET['id']);

        // Consulta para obtener eventos de la base de datos
        $query = "SELECT * FROM clase_teorica WHERE fk_profesor_id = $id AND estado = 'Disponible'";
        $result = mysqli_query($conn, $query);

        $eventos = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $start = $row['comienzo'];
            $duracion = $row['termino'];

            // Calcula la fecha de finalización agregando la duración al inicio
            $end = date('Y-m-d H:i:s', strtotime("$start + $duracion"));

            $eventos[] = array(
                'id' => $row['id_clase_teorica'],
                'title' => $row['titulo_teorica'],
                'description' => $row['descripcion_clase'],
                'start' => $start,
                'duracion' => $duracion,
                'color' => $row['color'],
            );
            // Después de construir el array de eventos
        }

        echo json_encode($eventos);
    }

    // Si la solicitud es un POST, se manejan las operaciones de creación, modificación y eliminación
    else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Operación para eliminar una clase del calendario
        require('../../../Logica/DAO/Alumno/DAO-Alumno.php');
        $daoTeorica = new DAO();
        if ($_POST['action'] == 'agendar') {
            $id_solicitud = intval($_POST['id_solicitud']);
            $eventId = $_POST['eventId'];

            $id_alumno = $_SESSION['id_alum'];
            // Actualiza la clase en la base de datos

            $cantidadClases = $daoTeorica->contadorClasesTeoricas($id_alumno, $id_solicitud);

            if ($cantidadClases >= 12) {
                echo "maximo_12";
            } else {
                $query = "UPDATE clase_teorica SET 
                estado = 'Ocupado', 
                color = '#d9a50b', 
                fk_alumno_id = '$id_alumno',
                fk_solicitud_id = '$id_solicitud'
                WHERE id_clase_teorica = '$eventId'";

                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo "success"; // Devuelve el ID del evento actualizado
                } else {
                    echo "error";
                }
            }
        }
    }
}

if ($flag == "agendarClasePractica") {
    // Si la solicitud es un GET, se obtienen los eventos del calendario
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $id = intval($_GET['id']);
        // Consulta para obtener eventos de la base de datos
        $query = "SELECT * FROM clase_practica WHERE fk_profesor_id = $id AND estado = 'Disponible'";
        $result = mysqli_query($conn, $query);

        $eventos = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $start = $row['comienzo'];
            $duracion = $row['termino'];

            // Calcula la fecha de finalización agregando la duración al inicio
            $end = date('Y-m-d H:i:s', strtotime("$start + $duracion"));

            $eventos[] = array(
                'id' => $row['id_clase_practica'],
                'title' => $row['titulo_practica'],
                'description' => $row['descripcion_clase'],
                'start' => $start,
                'duracion' => $duracion,
                'color' => $row['color'],
            );
            // Después de construir el array de eventos
        }

        echo json_encode($eventos);
    }

    // Si la solicitud es un POST, se manejan las operaciones de creación, modificación y eliminación
    else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Operación para eliminar una clase del calendario
        if ($_POST['action'] == 'agendar') {
            require('../../../Logica/DAO/Alumno/DAO-Alumno.php');
            $daoPractico = new DAO();
            $id_solicitud = intval($_POST['id_solicitud']);

            $eventId = $_POST['eventId'];

            $id_alumno = $_SESSION['id_alum'];
            $cantidadClases = $daoPractico->contadorClasesPracticas($id_alumno, $id_solicitud);

            if ($cantidadClases >= 12) {
                echo "maximo_12";
            } else {
                $query = "UPDATE clase_practica SET 
                estado = 'Ocupado', 
                color = '#d9a50b', 
                fk_alumno_id = '$id_alumno',
                fk_solicitud_id = '$id_solicitud'
                WHERE id_clase_practica = '$eventId'";

                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo "success"; // Devuelve el ID del evento actualizado
                } else {
                    echo "error";
                }
            }
        }
    }
}

if ($flag == "agendarClaseExtra") {
    // Si la solicitud es un GET, se obtienen los eventos del calendario
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $id = intval($_GET['id']);
        // Consulta para obtener eventos de la base de datos
        $query = "SELECT * FROM clase_practica WHERE fk_profesor_id = $id AND estado = 'Disponible'";
        $result = mysqli_query($conn, $query);

        $eventos = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $start = $row['comienzo'];
            $duracion = $row['termino'];

            // Calcula la fecha de finalización agregando la duración al inicio
            $end = date('Y-m-d H:i:s', strtotime("$start + $duracion"));

            $eventos[] = array(
                'id' => $row['id_clase_practica'],
                'title' => $row['titulo_practica'],
                'description' => $row['descripcion_clase'],
                'start' => $start,
                'duracion' => $duracion,
                'color' => $row['color'],
            );
            // Después de construir el array de eventos
        }

        echo json_encode($eventos);
    }

    // Si la solicitud es un POST, se manejan las operaciones de creación, modificación y eliminación
    else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Operación para eliminar una clase del calendario
        if ($_POST['action'] == 'agendar') {
            $eventId = $_POST['eventId'];
            $observacion = $_POST['observacion'];
            $id_solicitud = intval($_POST['id_solicitud']);

            $id_alumno = $_SESSION['id_alum'];
            // Actualiza la clase en la base de datos
            $query = "UPDATE clase_practica SET 
                estado = 'Ocupado', 
                color = '#d9a50b', 
                fk_alumno_id = '$id_alumno',
                descripcion_clase = '$observacion',
                fk_solicitud_id = '$id_solicitud'
                WHERE id_clase_practica = '$eventId'";

            $result = mysqli_query($conn, $query);

            $query = "UPDATE solicitud_alumno SET 
                estado_clase = 'Ocupado'
                WHERE id_solicitud = '$id_solicitud'";

            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "success"; // Devuelve el ID del evento actualizado
            } else {
                echo "error";
            }
        }
    }
}

if ($flag == "añadirObservacionTeorica") {
    // Si la solicitud es un GET, se obtienen los eventos del calendario
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $id = intval($_SESSION['id_alum']);
        // Consulta para obtener eventos de la base de datos
        $query = "SELECT * FROM clase_teorica WHERE fk_alumno_id = $id";
        $result = mysqli_query($conn, $query);

        $eventos = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $start = $row['comienzo'];
            $duracion = $row['termino'];

            // Calcula la fecha de finalización agregando la duración al inicio
            $end = date('Y-m-d H:i:s', strtotime("$start + $duracion"));

            $eventos[] = array(
                'id' => $row['id_clase_teorica'],
                'title' => $row['titulo_teorica'],
                'description' => $row['descripcion_clase'],
                'start' => $start,
                'duracion' => $duracion,
                'observacion' => $row['observacion_alumno'],
                'color' => $row['color'],
            );
            // Después de construir el array de eventos
        }

        echo json_encode($eventos);
    }

    // Si la solicitud es un POST, se manejan las operaciones de creación, modificación y eliminación
    else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Operación para eliminar una clase del calendario
        if ($_POST['action'] == 'agregar') {
            $eventId = $_POST['eventId'];
            $observacion = $_POST['observacion'];

            $id_alumno = $_SESSION['id_alum'];
            // Actualiza la clase en la base de datos
            $query = "UPDATE clase_teorica SET 
                observacion_alumno = '$observacion'
                WHERE id_clase_teorica = '$eventId'";

            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "success"; // Devuelve el ID del evento actualizado
            } else {
                echo "error";
            }
        }
    }
}

if ($flag == "añadirObservacionPractica") {
    // Si la solicitud es un GET, se obtienen los eventos del calendario
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $id = intval($_SESSION['id_alum']);
        // Consulta para obtener eventos de la base de datos
        $query = "SELECT * FROM clase_practica WHERE fk_alumno_id = $id";
        $result = mysqli_query($conn, $query);

        $eventos = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $start = $row['comienzo'];
            $duracion = $row['termino'];

            // Calcula la fecha de finalización agregando la duración al inicio
            $end = date('Y-m-d H:i:s', strtotime("$start + $duracion"));

            $eventos[] = array(
                'id' => $row['id_clase_practica'],
                'title' => $row['titulo_practica'],
                'description' => $row['descripcion_clase'],
                'start' => $start,
                'duracion' => $duracion,
                'observacion' => $row['observacion_alumno'],
                'color' => $row['color'],
            );
            // Después de construir el array de eventos
        }

        echo json_encode($eventos);
    }

    // Si la solicitud es un POST, se manejan las operaciones de creación, modificación y eliminación
    else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Operación para eliminar una clase del calendario
        if ($_POST['action'] == 'agregar') {
            $eventId = $_POST['eventId'];
            $observacion = $_POST['observacion'];

            $id_alumno = $_SESSION['id_alum'];
            // Actualiza la clase en la base de datos
            $query = "UPDATE clase_practica SET 
                observacion_alumno = '$observacion'
                WHERE id_clase_practica = '$eventId'";

            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "success"; // Devuelve el ID del evento actualizado
            } else {
                echo "error";
            }
        }
    }
}
