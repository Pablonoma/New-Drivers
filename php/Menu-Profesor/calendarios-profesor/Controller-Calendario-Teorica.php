<?php
include('../../../Logica/conexion.php'); // Asegúrate de incluir tu archivo de conexión a la base de datos

session_start();
$id = intval($_SESSION['id_profe']);

// Si la solicitud es un GET, se obtienen los eventos del calendario
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Consulta para obtener eventos de la base de datos
    $query = "SELECT * FROM clase_teorica WHERE fk_profesor_id = $id";
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

    // Operación para crear una nueva clase en el calendario
    if ($_POST['action'] == 'create') {
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $comienzo = $_POST['comienzo'];
        $termino = $_POST['termino'];
        $color = "#53beec";
        $profesor = $id;
        

        // Inserta la nueva clase en la base de datos
        $query = "INSERT INTO clase_teorica (titulo_teorica, comienzo, termino, descripcion_clase, color, fk_profesor_id) VALUES ('$titulo', '$comienzo', '$termino', '$descripcion', '$color', $profesor)";
        $result = mysqli_query($conn, $query);
        //$lastInsertId = mysqli_insert_id($conn);
        //echo $lastInsertId;  // Devuelve el ID del evento creado
        if ($result) {
            echo "success";
        } else {
            echo "error";
        }
    }
    // Operación para modificar una clase en el calendario
    else if ($_POST['action'] == 'update') {
        $eventId = $_POST['eventId'];
    
        $titulo = $_POST['nuevoTitulo'];
        $descripcion = $_POST['nuevaDescripcion'];
        $comienzo = $_POST['nuevaFechaHora'];
        $termino = $_POST['nuevaDuracion'];

        // Actualiza la clase en la base de datos
        $query = "UPDATE clase_teorica SET 
                titulo_teorica = '$titulo', 
                descripcion_clase = '$descripcion', 
                comienzo = '$comienzo', 
                termino = '$termino'
                WHERE id_clase_teorica = '$eventId'";

        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "success"; // Devuelve el ID del evento actualizado
        } else {
            echo "error";
        }
    }
    else if ($_POST['action'] == 'move') {
        $eventId = $_POST['eventId'];
        $newStart = $_POST['newStart'];

        // Actualiza la clase en la base de datos
        $query = "UPDATE clase_teorica SET 
            comienzo = CONCAT(DATE('$newStart'), ' ', TIME(comienzo)),
            termino = CONCAT(DATE('$newStart'), ' ', TIME(termino))
          WHERE id_clase_teorica = '$eventId'";


        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "success"; // Devuelve el ID del evento actualizado
        } else {
            echo "error";
        }
    }
    // Operación para eliminar una clase del calendario
    if ($_POST['action'] == 'delete') {
        $eventId = $_POST['eventId'];

        // Elimina la clase de la base de datos
        $query = "DELETE FROM clase_teorica WHERE id_clase_teorica = '$eventId'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "success";
        } else {
            echo "error";
        }
    }
}



// Otras operaciones CRUD como actualizar y eliminar pueden ser añadidas aquí
