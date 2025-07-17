<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header('location:../../Logica/cerrar.php');
} else {
    if ($_SESSION['permisos'] == 2) {
    } else {
        header('location:../../Logica/cerrar.php');
    }
}
require '../../Logica/conexion.php';

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts Used = "spartan" -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;600&family=PT+Serif:wght@400;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/9002e57fba.js" crossorigin="anonymous"></script>

    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="../../Css/Solicitudes-Alumnos.css">
    <link rel="shortcut icon" href="../../Img/Logo_velocimetro.png" />

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- DataTables  -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">



    <title>Menu - Profesor</title>
</head>

<body>

    <section id="menu">
        <div class="logo">
            <img src="../../Img/Logo_velocimetro.png">
            <h2>New Drivers</h2>
        </div>

        <div class="items">
            <a href="Vehiculo-Profesor.php">
                <li><i class="fa-solid fa-car"></i>Mi vehículo</li>
            </a>
            <a href="Clases-Teoricas-Profesor.php">
                <li><i class="fa-solid fa-book-open"></i>Clases Teóricas</li>
            </a>
            <a href="Clases-Practicas-Profesor.php">
                <li><i class="fa-solid fa-car"></i>Clases Prácticas</li>
            </a>
            <a href="Solicitudes-Alumnos.php" style="color: #FDD45B;">
                <li><i class="fa-solid fa-list" style="color: #FDD45B;"></i>Solicitudes de alumnos</li>
            </a>
            <a href="Clases-Agendadas.php">
                <li><i class="fa-solid fa-list"></i>Clases Agendadas</li>
            </a>
            <a href="Reagendar-Clases.php">
                <li><i class="fa-solid fa-repeat"></i>Reagendar Clases</li>
            </a>
            <a href="Alumnos-Profesor.php">
                <li><i class="fa-solid fa-users"></i>Mis Alumnos</li>
            </a>
            <a href="Cambiar-Contrasena-Profesor.php">
                <li><i class="fa-solid fa-key"></i>Cambiar contraseña</li>
            </a>

        </div>
        <div class="bottom-items">
            <a href="Perfil-Profesor.php">
                <li><i class="fa-solid fa-user"></i>Mi perfil</li>
            </a>
            <a href="Documentos-Profesor.php">
                <li><i class="fa-solid fa-file-lines"></i>Mis documentos</li>
            </a>
            <a href="../../Logica/cerrar.php">
                <li id="cerrar-sesion"><i class="fa-solid fa-right-to-bracket fa-flip-horizontal"></i>Cerrar sesión</li>
            </a>
        </div>
    </section>

    <section id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fa-solid fa-bars"></i>
                </div>
                
            </div>

            <div class="profile">
                <i class="fa-solid fa-address-card"></i>
                <h3><?php echo $_SESSION['nombre']; ?></h3>
                <img src="../../Logica/uploads/<?php echo $_SESSION['imagen']; ?>" alt="">
            </div>
        </div>

        <h3 class="i-name">
            Solicitudes de alumnos
        </h3>



        <div class="values">


            <table id="example" class="display table-hover bg-dark" style="width:100%; color: #ffff">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Alumno</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Acerca del alumno</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Respuesta</th>
                        <th class="text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>



                    <?php
                    $id_profesor = intval($_SESSION['id_profe']);
                    $sql = "SELECT DISTINCT
                    usuario_profesor.id_user AS id_alumno,
                    usuario_profesor.nombre AS nombre_alumno,
                    usuario_profesor.telefono AS telefono_alumno,
                    usuario_profesor.imagen AS imagen_alumno,
                    alumno.descripcion_alum AS descripcion,
                    solicitud_alumno.id_solicitud AS id_solicitud,
                    solicitud_alumno.estado_solicitud,
                    solicitud_alumno.respuesta AS respuesta_solicitud
                    FROM solicitud_alumno
                    JOIN profesor ON solicitud_alumno.fk_profesor_id = profesor.id_prof
                    JOIN alumno ON  solicitud_alumno.fk_alumno_id = alumno.id_alum
                    JOIN usuario AS usuario_profesor ON alumno.fk_usuario_id = usuario_profesor.id_user
                    WHERE solicitud_alumno.fk_profesor_id = $id_profesor AND solicitud_alumno.tipo_clase = 'Clase Normal'";

                    $result = mysqli_query($conn, $sql);

                    $contador = 1;

                    while ($usuario = mysqli_fetch_array($result)) {

                        $id_solicitud = $usuario['id_solicitud']
                    ?>

                        <tr>

                            <td class="text-center"><?php echo $contador ?></td>
                            <td>
                                <img style="width: 50px;height: 50px;border-radius: 50%;" src="../../Logica/uploads/<?php echo $usuario['imagen_alumno'] ?>" alt="">
                            </td>
                            <td class="text-center"><?php echo $usuario['nombre_alumno'] ?></td>
                            <td class="text-center"><?php echo $usuario['descripcion'] ?></td>
                            <td class="text-center">
                                <?php
                                $estado = $usuario['estado_solicitud'];

                                switch ($estado) {
                                    case 'Pendiente':
                                        echo '<i class="fa-solid fa-circle-exclamation text-warning"></i> Pendiente'; // Icono de pendiente (por ejemplo, un reloj de arena)
                                        break;
                                    case 'Rechazado':
                                        echo '<i class="fa-solid fa-xmark text-danger"></i> Rechazado'; // Icono de rechazado (por ejemplo, una marca de equis)
                                        break;
                                    case 'Aceptado':
                                        echo '<i class="fas fa-check-circle text-success"></i> Aceptado'; // Icono de aceptado (por ejemplo, una marca de cheque)
                                        break;
                                    default:
                                        echo $estado; // Muestra el estado tal cual si no coincide con ninguno de los casos anteriores
                                }
                                ?>
                            </td>
                            <td class="text-center"><?php echo $usuario['respuesta_solicitud'] ?></td>
                            <td class="text-center">
                                <?php if ($usuario['estado_solicitud'] == 'Pendiente') { ?>
                                    <button type="button" style="margin-right: 5px !important;" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#rechazarAlumno<?php echo $id_solicitud; ?>">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                    <button type="button" style="margin-left: 5px !important;" class="btn btn-sm btn-success" onclick="aceptar(<?php echo $id_solicitud; ?>)">
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                <?php } else { ?>
                                    <button type="button" style="margin-right: 5px !important;" class="btn btn-sm btn-danger" disabled>
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                    <button type="button" style="margin-left: 5px !important;" class="btn btn-sm btn-success" disabled>
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                <?php } ?>
                            </td>
                            <?php include('modal/Rechazar-Alumno.php'); ?>

                        </tr>

                    <?php
                        $contador++;
                    } ?>
                </tbody>
            </table>
        </div>

        <div class="values mb-5">

        <h3 class="i-name">
            Solicitudes de clases extras
        </h3>


            <table id="example2" class="display table-hover bg-dark" style="width:100%; color: #ffff">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Alumno</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Acerca del alumno</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Comentario</th>
                        <th class="text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>



                    <?php
                    $id_profesor = intval($_SESSION['id_profe']);
                    $sql = "SELECT DISTINCT
                    usuario_profesor.id_user AS id_alumno,
                    usuario_profesor.nombre AS nombre_alumno,
                    usuario_profesor.telefono AS telefono_alumno,
                    usuario_profesor.imagen AS imagen_alumno,
                    alumno.descripcion_alum AS descripcion,
                    solicitud_alumno.id_solicitud AS id_solicitud,
                    solicitud_alumno.estado_solicitud,
                    solicitud_alumno.respuesta AS respuesta_solicitud
                    FROM solicitud_alumno
                    JOIN profesor ON solicitud_alumno.fk_profesor_id = profesor.id_prof
                    JOIN alumno ON  solicitud_alumno.fk_alumno_id = alumno.id_alum
                    JOIN usuario AS usuario_profesor ON alumno.fk_usuario_id = usuario_profesor.id_user
                    WHERE solicitud_alumno.fk_profesor_id = $id_profesor AND solicitud_alumno.tipo_clase = 'Clase Extra'";

                    $result = mysqli_query($conn, $sql);

                    $contador = 1;

                    while ($usuario = mysqli_fetch_array($result)) {

                        $id_solicitud = $usuario['id_solicitud']
                    ?>

                        <tr>

                            <td class="text-center"><?php echo $contador ?></td>
                            <td>
                                <img style="width: 50px;height: 50px;border-radius: 50%;" src="../../Logica/uploads/<?php echo $usuario['imagen_alumno'] ?>" alt="">
                            </td>
                            <td class="text-center"><?php echo $usuario['nombre_alumno'] ?></td>
                            <td class="text-center"><?php echo $usuario['descripcion'] ?></td>
                            <td class="text-center">
                                <?php
                                $estado = $usuario['estado_solicitud'];

                                switch ($estado) {
                                    case 'Pendiente':
                                        echo '<i class="fa-solid fa-circle-exclamation text-warning"></i> Pendiente'; // Icono de pendiente (por ejemplo, un reloj de arena)
                                        break;
                                    case 'Rechazado':
                                        echo '<i class="fa-solid fa-xmark text-danger"></i> Rechazado'; // Icono de rechazado (por ejemplo, una marca de equis)
                                        break;
                                    case 'Aceptado':
                                        echo '<i class="fas fa-check-circle text-success"></i> Aceptado'; // Icono de aceptado (por ejemplo, una marca de cheque)
                                        break;
                                    default:
                                        echo $estado; // Muestra el estado tal cual si no coincide con ninguno de los casos anteriores
                                }
                                ?>
                            </td>
                            <td class="text-center"><?php echo $usuario['respuesta_solicitud'] ?></td>
                            <td class="text-center">
                                <?php if ($usuario['estado_solicitud'] == 'Pendiente') { ?>
                                    <button type="button" style="margin-right: 5px !important;" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#rechazarAlumnoExtra<?php echo $id_solicitud; ?>">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                    <button type="button" style="margin-left: 5px !important;" class="btn btn-sm btn-success" onclick="aceptar(<?php echo $id_solicitud; ?>)">
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                <?php } else { ?>
                                    <button type="button" style="margin-right: 5px !important;" class="btn btn-sm btn-danger" disabled>
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                    <button type="button" style="margin-left: 5px !important;" class="btn btn-sm btn-success" disabled>
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                <?php } ?>
                            </td>
                            <?php include('modal/Rechazar-Alumno.php'); ?>

                        </tr>

                    <?php
                        $contador++;
                    } ?>
                </tbody>
            </table>
        </div>


    </section>


    <?php
    require('../../Logica/DAO/Profesor/DAO-Profesor.php');
    $dao = new DAO();
    if (isset($_POST['rechazar'])) {
        if (!empty($_POST['id_solicitud'])) {
            $id_solicitud = $_POST['id_solicitud'];
            $respuesta = $_POST['respuesta'];

            $resultado = $dao->rechazarAlumno($id_solicitud, $respuesta);
            if ($resultado == true) {
                echo "<script>
                    Swal.fire({
                    title: 'Alumno Rechazado',
                    text: 'Se rechazó al alumno según la respuesta seleccionada',
                    icon: 'success',
                    allowOutsideClick: false,
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#25b32c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Solicitudes-Alumnos.php';
                    }
                    });
                </script>";
            } else {
                echo "<script>
                    Swal.fire({
                    title: 'Hubo un Problema',
                    text: 'No se pudo realizar la operación',
                    icon: 'error',
                    allowOutsideClick: false,
                    confirmButtonText: 'Volver',
                    confirmButtonColor: '#e74c3c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Solicitudes-Alumnos.php';
                    }
                    });
                </script>";
            }
        } else {

            echo "<script>
                Swal.fire({
                title: 'Campos Vacios',
                text: 'Ingrese Todos los Datos Por Favor',
                icon: 'warning',
                allowOutsideClick: false,
                confirmButtonText: 'Volver',
                confirmButtonColor: '#f39c12',
                });
            </script>";
        }
    }
    ?>

    <script>
        function aceptar(id_solicitud) {
            var id = id_solicitud;
            console.log(id);
            Swal.fire({
                title: '¿Estás seguro de que quieres aceptar al alumno?',
                text: 'Una vez aceptado al alumno no podras cancelar el curso con el',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, aceptar',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#198754',
                cancelButtonColor: '#adb5bd',
            }).then((result) => {
                if (result.isConfirmed) {

                    var id = id_solicitud;
                    console.log(id);
                    console.log('hola');
                    $.ajax({
                        url: 'php-profesor/aceptarAlumno.php',
                        type: 'POST',
                        data: {
                            id_solicitud: id
                        },
                        success: function(response) {
                            if (response === 'success') {
                                Swal.fire({
                                    title: 'Alumno aceptado',
                                    text: 'El alumno fue aceptado con éxito',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    confirmButtonColor: '#25b32c',
                                });
                                setTimeout(function() {
                                    window.location.href = 'Solicitudes-Alumnos.php';
                                }, 2000);
                            } else {
                                console.log(response);
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Ocurrió un problema al aceptar al alumno',
                                    icon: 'error',
                                    confirmButtonText: 'Volver',
                                    confirmButtonColor: '#e74c3c',
                                });
                            }
                        }
                    });
                }
            });
        }
    </script>

    <script>
        $('#menu-btn').click(function() {
            $('#menu').toggleClass("active");
        })
    </script>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- DataTables -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="../../Js/SolicitudesAlumnosDatatable.js"></script>
    <script src="../../Js/SolicitudesAlumnosDatatable2.js"></script>

    <!-- Validar Password en Agregar Usuario -->
</body>

</html>