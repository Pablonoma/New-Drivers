<?php
session_start();
include('../../Logica/conexion.php'); // Asegúrate de incluir tu archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipo = $_POST['tabla'];
    $id_profesor = intval($_SESSION['id_profe']);
    $sql = "SELECT id_clase_$tipo AS id_teorica,
                ct.observacion_alumno AS observacion_alumno,
                ct.observacion_profe AS observacion_profe,
                imagen AS imagen_alumno,
                nombre AS nombre_alumno,
                comienzo AS horario_comienzo_clase,
                termino AS horario_termino_clase,
                COUNT(*) AS cantidad_clases_alumno,
                ct.estado AS estado_clase
            FROM clase_$tipo ct
            JOIN alumno ON ct.fk_alumno_id = id_alum
            JOIN usuario ON fk_usuario_id = id_user
            WHERE ct.fk_profesor_id = $id_profesor
            GROUP BY ct.fk_alumno_id, comienzo, ct.estado;";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($usuario = mysqli_fetch_array($result)) {
            $id_clase = $usuario['id_teorica'];
            echo "<tr>
                    <td class='text-center'>
                        <img style='width: 50px;height: 50px;border-radius: 50%;' src='../../Logica/uploads/{$usuario['imagen_alumno']}' alt=''>
                    </td>
                    <td class='text-center'>{$usuario['nombre_alumno']}</td>
                    <td class='text-center'>{$usuario['horario_comienzo_clase']}</td>
                    <td class='text-center'>{$usuario['horario_termino_clase']}</td>
                    <td class='text-center'>";

            $estado = $usuario['estado_clase'];
            switch ($estado) {
                case 'Ocupado':
                    echo '<i class="fa-solid fa-circle-exclamation text-warning"></i> Pendiente';
                    break;
                case 'Cancelada':
                    echo '<i class="fa-solid fa-xmark text-danger"></i> Cancelada';
                    break;
                case 'Completada':
                case 'Finalizada':
                    echo '<i class="fas fa-check-circle text-success"></i> Finalizada';
                    break;
                default:
                    echo $estado;
            }

            echo "</td>
                    <td class='text-center'>" . (empty($usuario['observacion_alumno']) ? 'Sin especificaciones' : $usuario['observacion_alumno']) . "</td>
                    <td class='text-center'>" . (empty($usuario['observacion_profe']) ? 'Sin especificaciones' : $usuario['observacion_profe']) . "</td>
                    <td class='text-center'>";

            if ($usuario['estado_clase'] == 'Ocupado') {
                echo "<button type='button' style='margin-right: 5px !important;' class='btn btn-sm btn-danger' onclick='rechazar($id_clase,\"$tipo\")'>
                        <i class='fa-solid fa-xmark'></i>
                    </button>
                    <button type='button' style='margin-left: 5px !important;' class='btn btn-sm btn-success' onclick='finalizar($id_clase,\"$tipo\")'>
                        <i class='fa-solid fa-check'></i>
                    </button>";
            } else {
                echo "<button type='button' style='margin-right: 5px !important;' class='btn btn-sm btn-danger' disabled>
                        <i class='fa-solid fa-xmark'></i>
                    </button>
                    <button type='button' style='margin-left: 5px !important;' class='btn btn-sm btn-success' disabled>
                        <i class='fa-solid fa-check'></i>
                    </button>";
            }

            echo "</td>
                </tr>";
            // Incluir el contenido del modal desde otro archivo
            include('modal/Cancelar-Clase.php');
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Método de solicitud no válido.";
}


