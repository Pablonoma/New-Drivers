<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header('location:../../Logica/cerrar.php');
} else {
    if ($_SESSION['permisos'] == 1) {
    } else {
        header('location:../../Logica/cerrar.php');
    }
}
require '../../Logica/conexion.php';

require('../../Logica/DAO/Profesor/DAO-Profesor.php');
$dao = new DAO();

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../../Css/Solicitudes-Profesores.css">
    <link rel="shortcut icon" href="../../Img/Logo_velocimetro.png" />

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- DataTables  -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">



    <title>Menu - Alumno</title>
</head>



<body>
    <script>
        console.log(<?php echo $_SESSION['id_user'] ?>)
    </script>
    <section id="menu">
        <div class="logo">
            <img src="../../Img/Logo_velocimetro.png">
            <h2>New Drivers</h2>
        </div>


        <div class="items">
            <a href="Home-Alumno.php">
                <li><i class="fa-solid fa-book"></i>Intructores</li>
            </a>
            <a href="Clases-Alumno.php">
                <li><i class="fa-solid fa-book-open"></i>Clases Teóricas</li>
            </a>
            <a href="Clases-Practicas-Alumno.php">
                <li><i class="fa-solid fa-car"></i>Clases Prácticas</li>
            </a>
            
            <a href="Solicitudes-Profesores.php" style="color: #FDD45B;">
                <li><i class="fa-solid fa-list" style="color: #FDD45B;"></i>Solicitudes</li>
            </a>

            <?php
            $finalizado = $dao->contadorFinalizado($_SESSION["id_alum"]);

            if ($finalizado < 1 || $finalizado == null) {
            } else {
            ?>
                <a href="Clases-Extras.php" >
                    <li><i class="fa-solid fa-calendar-plus"></i>Clases extras</li>
                </a>
            <?php
            }

            ?>

            <a href="Contactanos.php">
                <li><i class="fa-solid fa-circle-exclamation"></i>Contáctanos</li>
            </a>

            <a href="Cambiar-Contrasena-Alumno.php">
                <li><i class="fa-solid fa-key"></i>Cambiar contraseña</li>
            </a>

        </div>
        <div class="bottom-items">
            <a href="Perfil-Alumno.php">
                <li><i class="fa-solid fa-user"></i>Mi perfil</li>
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
                        <th class="text-center">Profesor/a</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Acerca del profesor</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Respuesta</th>
                        <th class="text-center">Horarios</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $id_alumno = $_SESSION['id_alum'];
                    $sql = "SELECT 
                    solicitud_alumno.id_solicitud,
                    solicitud_alumno.estado_solicitud AS estado_solicitud,
                    solicitud_alumno.estado_clase AS estado_clase,
                    solicitud_alumno.respuesta,
                    profesor.id_prof AS id_profesor,
                    usuario_profesor.nombre AS nombre_profesor,
                    usuario_profesor.imagen AS imagen_profesor,
                    profesor.descripcion_prof AS descripcion_profesor,
                    pagos.estado_pago AS estado_pago
                    FROM solicitud_alumno
                    JOIN pagos ON pagos.solicitud_alumno_fk_id = solicitud_alumno.id_solicitud
                    JOIN profesor ON solicitud_alumno.fk_profesor_id = profesor.id_prof
                    JOIN alumno ON solicitud_alumno.fk_alumno_id = alumno.id_alum
                    JOIN usuario AS usuario_profesor ON profesor.fk_usuario_id = usuario_profesor.id_user
                    WHERE solicitud_alumno.fk_alumno_id = $id_alumno AND solicitud_alumno.tipo_clase = 'Clase Normal'
                    GROUP BY id_solicitud;";

                    $result = mysqli_query($conn, $sql);
                    $contador = 1;

                    while ($usuario = mysqli_fetch_array($result)) {

                        $id_solicitud = $usuario['id_solicitud'];
                        $id_prof = $usuario['id_profesor'];
                    ?>

                        <tr>

                            <td class="text-center"><?php echo $contador ?></td>
                            <td>
                                <img style="width: 50px;height: 50px;border-radius: 50%;" src="../../Logica/uploads/<?php echo $usuario['imagen_profesor'] ?>" alt="">
                            </td>
                            <td class="text-center"><?php echo $usuario['nombre_profesor'] ?></td>
                            <td style="text-align: justify;"><?php echo $usuario['descripcion_profesor'] ?></td>
                            <td class="text-center">
                                <?php
                                $estado = $usuario['estado_solicitud'];
                                $estado_clase = $usuario['estado_clase'];
                                $estado_pago = $usuario['estado_pago'];

                                if ($estado_clase == 'Finalizado' || $estado_clase == 'Calificado') {
                                    echo '<i class="fa-solid fa-graduation-cap text-success" ></i> Graduado';
                                } else {
                                    if ($estado_pago == 'Pendiente' && $estado == 'Aceptado') {
                                        echo '<i class="fa-solid fa-circle-exclamation text-warning"></i> Pago Pendiente'; // Icono de pendiente (por ejemplo, un reloj de arena)
                                    } else {
                                        if ($estado == 'Pendiente') {
                                            echo '<i class="fa-solid fa-circle-exclamation text-warning"></i> Pendiente'; // Icono de pendiente (por ejemplo, un reloj de arena)
                                        } elseif ($estado == 'Rechazado') {
                                            echo '<i class="fa-solid fa-xmark text-danger"></i> Rechazado'; // Icono de rechazado (por ejemplo, una marca de equis)
                                        } elseif ($estado == 'Aceptado') {
                                            echo '<i class="fas fa-check-circle text-success"></i> Aceptado'; // Icono de aceptado (por ejemplo, una marca de cheque)
                                        } else {
                                            echo $estado; // Muestra el estado tal cual si no coincide con ninguno de los casos anteriores
                                        }
                                    }
                                }

                                ?>
                            </td>
                            <td style="text-align: justify;"><?php echo $usuario['respuesta'] ?></td>
                            <td class="text-center">
                                <?php
                                $estadoClase = $usuario['estado_clase'];
                                $estado = $usuario['estado_solicitud'];
                                $estado_pago = $usuario['estado_pago'];
                                $id_solicitud = $usuario['id_solicitud'];
                                $id_prof = $usuario['id_profesor'];
                                if ($estado == 'Aceptado') {
                                    if ($estado_pago == 'Pendiente') {
                                        echo '
                                        <a href="php/redireccionar_pago.php?solicitud=' . $id_solicitud . '" class="btn btn-warning btn-agendar" >
                                        Pagar
                                        </a>';
                                    } else {
                                        if ($estadoClase == 'Finalizado') {
                                            echo '<button class="btn btn-warning" style="background-color: #efc015; border: none;" name="calificar" data-bs-toggle="modal" data-bs-target="#addcalificate' . $id_solicitud . '">Calificar</button>';
                                        } else if ($estadoClase == 'Calificado') {
                                            echo '<button class="btn btn-success" border: none;"><i class="fa-solid fa-graduation-cap" ></i> </button>';
                                        } else {
                                            echo '<button class="btn btn-success btn-agendar" data-id="' . $id_prof . '" data-id-solicitud="' . $id_solicitud . '" data-estado-clase="' . $estadoClase . '">Agendar</button>';
                                        }
                                    }
                                } else {
                                    echo '<button class="btn btn-success btn-agendar" disabled>Agendar</button>';
                                }

                                ?>
                            </td>
                            <?php include('modal/Modal-calificar.php'); ?>

                        </tr>

                    <?php
                        $contador++;
                    } ?>
                </tbody>
            </table>
        </div>

    </section>






    <script>
        $(document).ready(function() {
            $('.btn-agendar').click(function() {
                var idUsuario = $(this).data('id'); // Captura el ID del usuario
                var idSolicitud = $(this).data('id-solicitud'); // Captura el ID del usuario
                var estadoClase = $(this).data('estado-clase'); // Captura el estado de la clase
                console.log('ID del usuario:', idUsuario);
                console.log('Estado de la clase:', estadoClase);

                // Redirige a la página correspondiente dependiendo del estado de la clase
                var url = '';
                switch (estadoClase) {
                    case 'Teórico':
                        url = 'Agendar-clases.php';
                        break;
                    case 'Práctico':
                        url = 'Agendar-Clases-Practicas.php';
                        break;
                }

                window.location.href = url + '?id_profesor=' + idUsuario +'&id_solicitud='+ idSolicitud;
            });
        });
    </script>


    <?php
    if (isset($_GET['response'])) {
        $response = $_GET['response'];

        if ($response == 'success') { ?>
            <script>
                let timerInterval;
                Swal.fire({
                    title: 'Pago Realizado!',
                    text: 'Se ha realizado el pago de forma correcta.',
                    icon: 'success',
                    timer: 3000,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,

                    didOpen: () => {
                        Swal.showLoading();
                        const b = Swal.getHtmlContainer().querySelector('b');
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft();
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    }
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        window.location.href = 'Solicitudes-Profesores.php';
                    }
                });
            </script>
        <?php
        } else if ($response == 'error') { ?>
            <script>
                let timerIntervale;
                Swal.fire({
                    title: 'Pago Cancelado',
                    text: 'Se ha cancelado el pago del curso.',
                    icon: 'error',
                    timer: 3000,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,

                    didOpen: () => {
                        Swal.showLoading();
                        const b = Swal.getHtmlContainer().querySelector('b');
                        timerIntervale = setInterval(() => {
                            b.textContent = Swal.getTimerLeft();
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerIntervale);
                    }
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        window.location.href = 'Solicitudes-Profesores.php';
                    }
                });
            </script>
        <?php
        } elseif ($response == 'error_support') { ?>
            <script>
                let timerIntervales;
                Swal.fire({
                    title: 'Pago realizado, error de sistema',
                    text: 'Se ha completado el pago, pero no se ha modificado en el sistema. Sugerimos contactar al soporte de New Drivers',
                    icon: 'warning',
                    timer: 4000,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,

                    didOpen: () => {
                        Swal.showLoading();
                        const b = Swal.getHtmlContainer().querySelector('b');
                        timerIntervales = setInterval(() => {
                            b.textContent = Swal.getTimerLeft();
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerIntervales);
                    }
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        window.location.href = 'Solicitudes-Profesores.php';
                    }
                });
            </script>
    <?php

        }
    }
    ?>



    <?php
    if (isset($_POST['rechazar'])) {
        if (!empty($_POST['id_solicitud'])) {
            $id_solicitud = $_POST['id_solicitud'];
            $respuesta = $_POST['respuesta'];

            $resultado = $dao->rechazarAlumno($id_solicitud, $respuesta);
            if ($resultado == true) {
                echo "<script>
                    Swal.fire({
                    title: 'Alumno Rechazado',
                    text: 'Se rechazó al alumno indicando la respuesta seleccionada',
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
                    text: 'No se Puedo Realizar la operación',
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
                title: '¿Estás seguro en que quieres aceptar al alumno?',
                text: 'Una vez aceptado al alumno no podras cancelar las clases con el',
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
                                    title: 'Profesor agregado al sistema',
                                    text: 'El profesor fue aceptado con éxito',
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


    <?php

    if (isset($_POST['calificar'])) {
        if (!empty($_POST['id_solicitud'])) {
            $id_solicitud = $_POST['id_solicitud'];
            $id_profe = $_POST['id_profe'];
            $puntaje = $_POST['selected-rating'];
            $observacion = $_POST['observacion'];
            $id_alumno = $_SESSION['id_alum'];

            $resultadoCalificar = $dao->calificar($id_profe, $puntaje, $id_alumno, $observacion);
            $resultadoSolicitud = $dao->estado_solicitud_calificar($id_solicitud);
            if ($resultadoCalificar == true && $resultadoSolicitud == true) {
                echo "<script>
                    Swal.fire({
                    title: 'Profesor Calificado',
                    text: 'La calificación del profesor se ha publicado correctamente en su perfil. Esta calificación ayuda a los nuevos alumnos a elegir su instructor de conducción con mayor facilidad.',
                    icon: 'success',
                    allowOutsideClick: false,
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#25b32c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Solicitudes-Profesores.php';
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
                        window.location.href = 'Solicitudes-Profesores.php';
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

    <script src="../../Js/SolicitudesProfesores.js"></script>

    <!-- Validar Password en Agregar Usuario -->
</body>

</html>