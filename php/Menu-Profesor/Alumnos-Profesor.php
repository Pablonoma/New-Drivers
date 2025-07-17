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

    <link rel="stylesheet" href="../../Css/Alumnos-Profesor.css">
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
            <a href="Solicitudes-Alumnos.php">
                <li><i class="fa-solid fa-list"></i>Solicitudes de alumnos</li>
            </a>
            <a href="Clases-Agendadas.php">
                <li><i class="fa-solid fa-list"></i>Clases Agendadas</li>
            </a>
            <a href="Reagendar-Clases.php">
                <li><i class="fa-solid fa-repeat"></i>Reagendar Clases</li>
            </a>
            <a href="Alumnos-Profesor.php" style="color: #FDD45B;">
                <li><i class="fa-solid fa-users" style="color: #FDD45B;"></i>Mis Alumnos</li>
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
        <h3 class="i-name text-center">
            Alumnos cursando
        </h3>
        <div class="values mb-4">


            <table id="exampleAlumnos" class="display table-hover bg-dark" style="width:100%; color: #ffff">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Alumno</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Acerca del alumno</th>
                        <th class="text-center">Teléfono</th>
                        <th class="text-center">Correo</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>


                    <?php
                    $id_profesor = intval($_SESSION['id_profe']);
                    $sql = "SELECT 
                                alumno.id_alum AS id_alumno,
                                usuario.imagen AS imagen_alumno,
                                usuario.nombre AS nombre_alumno,
                                alumno.descripcion_alum AS descripcion_alumno,
                                usuario.telefono AS telefono_alumno,
                                usuario.correo AS correo_alumno,
                                solicitud_alumno.estado_clase AS estado_clase,
                                solicitud_alumno.id_solicitud AS id_solicitud
                            FROM solicitud_alumno
                            JOIN alumno ON solicitud_alumno.fk_alumno_id = alumno.id_alum
                            JOIN usuario ON alumno.fk_usuario_id = usuario.id_user
                            WHERE solicitud_alumno.estado_solicitud = 'Aceptado' AND solicitud_alumno.estado_clase != 'Finalizado' AND solicitud_alumno.fk_profesor_id = $id_profesor
                            GROUP BY solicitud_alumno.fk_alumno_id;
                            ";

                    $result = mysqli_query($conn, $sql);


                    while ($usuario = mysqli_fetch_array($result)) {

                        $id_alumno = $usuario['id_alumno'];
                        $id_solicitud = $usuario['id_solicitud'];

                    ?>


                        <tr>
                            <td class="text-center"><?php echo $usuario['id_alumno'] ?></td>
                            <td class="text-center">
                                <img style="width: 50px;height: 50px;border-radius: 50%;" src="../../Logica/uploads/<?php echo $usuario['imagen_alumno'] ?>" alt="">
                            </td>
                            <td class="text-center"><?php echo $usuario['nombre_alumno'] ?></td>
                            <td class="text-center"><?php echo $usuario['descripcion_alumno'] ?></td>
                            <td class="text-center">+56 <?php echo $usuario['telefono_alumno'] ?></td>
                            <td class="text-center"><?php echo $usuario['correo_alumno'] ?></td>
                            <td class="text-center"><?php echo $usuario['estado_clase'] ?></td>
                            <td class="text-center">
                                <?php if ($usuario['estado_clase'] == 'Teórico') { ?>

                                    <button type="button" style="margin-left: 5px !important;" class="btn btn-sm btn-warning" onclick="practica(<?php echo $id_alumno; ?>, 'Teórico',<?php echo $id_solicitud; ?>)">
                                        <i class="fa-solid fa-car"></i>
                                    </button>

                                <?php } else if ($usuario['estado_clase'] == 'Práctico') { ?>

                                    <button type="button" style="margin-left: 5px !important;" class="btn btn-sm btn-success" onclick="practica(<?php echo $id_alumno; ?>, 'Práctico',<?php echo $id_solicitud; ?>)">
                                        <i class="fa-solid fa-check"></i>
                                    </button>

                                <?php } else if ($usuario['estado_clase'] == 'Finalizado') { ?>
                                    <button type="button" style="margin-left: 5px !important;" class="btn btn-sm btn-success" disabled>
                                        <i class="fa-solid fa-graduation-cap"></i>
                                    </button>
                                <?php

                                } ?>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>

        <h3 class="i-name text-center">
            Alumnos graduados
        </h3>
        <div class="values mb-4">


            <table id="exampleAlumnos2" class="display table-hover bg-dark" style="width:100%; color: #ffff">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Alumno</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Acerca del alumno</th>
                        <th class="text-center">Teléfono</th>
                        <th class="text-center">Correo</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>


                    <?php
                    $id_profesor = intval($_SESSION['id_profe']);
                    $sql = "SELECT 
                                alumno.id_alum AS id_alumno,
                                usuario.imagen AS imagen_alumno,
                                usuario.nombre AS nombre_alumno,
                                alumno.descripcion_alum AS descripcion_alumno,
                                usuario.telefono AS telefono_alumno,
                                usuario.correo AS correo_alumno,
                                solicitud_alumno.estado_clase AS estado_clase,
                                solicitud_alumno.id_solicitud AS id_solicitud
                            FROM solicitud_alumno
                            JOIN alumno ON solicitud_alumno.fk_alumno_id = alumno.id_alum
                            JOIN usuario ON alumno.fk_usuario_id = usuario.id_user
                            WHERE solicitud_alumno.estado_solicitud = 'Aceptado' AND solicitud_alumno.estado_clase = 'Finalizado' AND solicitud_alumno.fk_profesor_id = $id_profesor
                            GROUP BY solicitud_alumno.fk_alumno_id;
                            ";

                    $result = mysqli_query($conn, $sql);


                    while ($usuario = mysqli_fetch_array($result)) {

                        $id_alumno = $usuario['id_alumno'];
                        $id_solicitud = $usuario['id_solicitud'];

                    ?>


                        <tr>
                            <td class="text-center"><?php echo $usuario['id_alumno'] ?></td>
                            <td class="text-center">
                                <img style="width: 50px;height: 50px;border-radius: 50%;" src="../../Logica/uploads/<?php echo $usuario['imagen_alumno'] ?>" alt="">
                            </td>
                            <td class="text-center"><?php echo $usuario['nombre_alumno'] ?></td>
                            <td class="text-center"><?php echo $usuario['descripcion_alumno'] ?></td>
                            <td class="text-center">+56 <?php echo $usuario['telefono_alumno'] ?></td>
                            <td class="text-center"><?php echo $usuario['correo_alumno'] ?></td>
                            <td class="text-center"><?php echo $usuario['estado_clase'] ?></td>
                            <td class="text-center">
                                <?php if ($usuario['estado_clase'] == 'Teórico') { ?>

                                    <button type="button" style="margin-left: 5px !important;" class="btn btn-sm btn-warning" onclick="practica(<?php echo $id_alumno; ?>, 'Teórico',<?php echo $id_solicitud; ?>)">
                                        <i class="fa-solid fa-car"></i>
                                    </button>

                                <?php } else if ($usuario['estado_clase'] == 'Práctico') { ?>

                                    <button type="button" style="margin-left: 5px !important;" class="btn btn-sm btn-success" onclick="practica(<?php echo $id_alumno; ?>, 'Práctico',<?php echo $id_solicitud; ?>)">
                                        <i class="fa-solid fa-check"></i>
                                    </button>

                                <?php } else if ($usuario['estado_clase'] == 'Finalizado') { ?>
                                    <button type="button" style="margin-left: 5px !important;" class="btn btn-sm btn-success" disabled>
                                        <i class="fa-solid fa-graduation-cap"></i>
                                    </button>
                                <?php

                                } ?>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>


    </section>
    <script>
        $('#menu-btn').click(function() {
            $('#menu').toggleClass("active");
        })
    </script>

    <script>
        function practica(id_alumn, estado, id_solicitud) {
            var is_alum = id_alumn;
            var status = estado;
            var id_sol = id_solicitud;
            console.log(is_alum);
            console.log(status);
            $.ajax({
                url: 'php-profesor/revisarClases.php',
                type: 'POST',
                data: {
                    id_alumno: is_alum,
                    estado: status,
                    id_solicitud: id_sol
                },
                success: function(response) {
                    if (response === 'success_teorico') {
                        Swal.fire({ 
                            title: '¿Estás seguro de que quieres habilitar las clases prácticas?',
                            text: 'El alumno podrá agendar sus 12 clases prácticas correspondientes.',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#198754',
                            cancelButtonColor: '#6c757d',
                            confirmButtonText: 'Sí, habilitar',
                            cancelButtonText: 'Cerrar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: 'php-profesor/habilitarClases.php',
                                    type: 'POST',
                                    data: {
                                        id_alumno: is_alum,
                                        estado: status
                                    },
                                    success: function(response) {
                                        if (response === 'success_habilitar') {
                                            Swal.fire({
                                                title: 'Clases prácticas habilitadas',
                                                text: 'Se han habilitado las clases prácticas para el alumno.',
                                                icon: 'success',
                                                showConfirmButton: false,
                                                confirmButtonColor: '#25b32c',
                                            });
                                            setTimeout(function() {
                                                window.location.href = 'Alumnos-Profesor.php';
                                            }, 2000);
                                        } else {
                                            console.log(response);
                                            Swal.fire({
                                                title: 'Error',
                                                text: 'Ocurrio un problema al habilitar las clases del alumno',
                                                icon: 'error',
                                                confirmButtonText: 'Volver',
                                                confirmButtonColor: '#e74c3c',
                                            });
                                        }
                                    }
                                });
                            }
                        });

                    } else if (response === 'error_teorico') {
                        Swal.fire({
                            title: 'Clases Teóricas Completadas Insuficientes',
                            text: 'Para habilitar las clases prácticas el alumno debe de tener las 12 clases teóricas finalizadas',
                            icon: 'warning',
                            showConfirmButton: false,
                            confirmButtonColor: '#25b32c',
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    } else if (response === 'success_practice') {
                        Swal.fire({
                            title: '¿Estás seguro de que quieres finalizar el curso del alumno?',
                            text: 'El alumno quedará como egresado de New Drivers y podrá calificarte como su instructor de manejo.',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#198754',
                            cancelButtonColor: '#6c757d',
                            confirmButtonText: 'Sí, habilitar',
                            cancelButtonText: 'Cerrar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: 'php-profesor/habilitarClases.php',
                                    type: 'POST',
                                    data: {
                                        id_alumno: is_alum,
                                        estado: status
                                    },
                                    success: function(response) {
                                        if (response === 'success_finalizar') {
                                            
                                            Swal.fire({
                                                title: '¡Felicidades! Has aprobado al alumno con éxito. ',
                                                text: 'Después de completar todas sus clases prácticas y teóricas, el alumno se ha egresado de New Drivers. Gracias por contribuir a formar nuevos conductores con tu dedicación y habilidades.',
                                                icon: 'success',
                                                showConfirmButton: false,
                                                confirmButtonColor: '#25b32c',
                                            });
                                            setTimeout(function() {
                                                window.location.href = 'Alumnos-Profesor.php';
                                            }, 5000);
                                        } else {
                                            console.log(response);
                                            Swal.fire({
                                                title: 'Error',
                                                text: 'Ocurrió un problema al habilitar las clases del alumno',
                                                icon: 'error',
                                                confirmButtonText: 'Volver',
                                                confirmButtonColor: '#e74c3c',
                                            });
                                        }
                                    }
                                });
                            }
                        });
                    } else if (response === 'error_practice') {
                        Swal.fire({
                            title: 'Clases Prácticas Completadas Insuficientes',
                            text: 'Para finalizar el curso, el alumno debe de tener las 12 clases práctica finalizadas',
                            icon: 'warning',
                            showConfirmButton: false,
                            confirmButtonColor: '#25b32c',
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    } else {
                        console.log(response);
                        Swal.fire({
                            title: 'Error',
                            text: 'Ocurrio un problema al aceptar al alumno',
                            icon: 'error',
                            confirmButtonText: 'Volver',
                            confirmButtonColor: '#e74c3c',
                        });
                    }
                }
            });

            /* Swal.fire({
                title: '¿Estás seguro de que quieres dar por finalizada la clase?',
                text: 'La clase quedará como completada en el calendario de clases',
                icon: 'warning',
                showCancelButton: true,
                showDenyButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#6c757d',
                denyButtonColor: '#0d6efdfa',
                confirmButtonText: 'Sí, Finalizar',
                denyButtonText: 'Finalizar con observación',
                cancelButtonText: 'Cerrar'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = id_solicitud;
                    console.log(id);
                    console.log('hola');

                } else if (result.isDenied) {
                    $('#finalizarClase' + id_solicitud).modal('show');
                } else if (result.dismiss === Swal.DismissReason.cancel) {}
            }); */
        }
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

    <script src="../../Js/Mis-Alumnos-Profesor.js"></script>
    <script src="../../Js/Mis-Alumnos-Profesor2.js"></script>

    <!-- Validar Password en Agregar Usuario -->
</body>

</html>