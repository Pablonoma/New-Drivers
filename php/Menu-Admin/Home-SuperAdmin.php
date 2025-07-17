<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header('location:../../Logica/cerrar.php');
} else {
    if ($_SESSION['permisos'] == 3) {
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

    <link rel="stylesheet" href="../../Css/Menu-Admin.css">
    <link rel="shortcut icon" href="../../Img/logo New Drivers.jpg" />

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- DataTables  -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">



    <title>Menu - Administrador</title>
</head>

<body>


    <section id="menu">
        <div class="logo">
            <img src="../../Img/Logo_velocimetro.png">
            <h2>New Drivers</h2>
        </div>

        <div class="items">
            <a href="Home-SuperAdmin.php" style="color: #FDD45B;">
                <li><i class="fa-solid fa-book" style="color: #FDD45B;"></i>Ver Alumnos</li>
            </a>
            <a href="Ver-instructores.php" >
                <li><i class="fa-solid fa-users" ></i>Ver Instructores</li>
            </a>
            <a href="Solicitudes.php">
                <li><i class="fa-solid fa-list"></i>Solicitudes</li>
            </a>
            <a href="Vehiculos-SuperAdmin.php">
                <li><i class="fa-solid fa-car" ></i>Vehículos</li>
            </a>
            <a href="Cambiar-Contrasena-Admin.php" >
                <li><i class="fa-solid fa-key" ></i>Cambiar contraseña</li>
            </a>

        </div>
        <div class="bottom-items">
            <a href="perfil-super-admin.php">
                <li id="mi-perfil"><i class="fa-solid fa-user"></i> Mi Perfil</li>
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
            Estudiantes de New Drivers
        </h3>



        <div class="values">

            <div class="d-flex justify-content-end">
                <button class="btn btn-success mb-3 " name="agregar" data-bs-toggle="modal" data-bs-target="#addUser"><i class="fa-solid fa-user-plus"></i> Agregar estudiantes</button>
            </div>
            <?php include('modal/agregarAlumno.php'); ?>


            <!-- Agregar Usuario -->
            <script>
                $(document).ready(function() {
                    $('#formulario').submit(function(e) {
                        e.preventDefault(); // Evita que el formulario se envíe de forma tradicional

                        // Recopila los datos del formulario
                        var formData = $(this).serialize();

                        // Realiza la solicitud AJAX
                        $.ajax({
                            type: 'POST',
                            url: '../Modulo-Login-Registro/php-registro/ajax_registrar_usuario.php',
                            data: formData,
                            success: function(response) {
                                // Maneja la respuesta aquí
                                if (response == "success") {
                                    Swal.fire({
                                        title: 'Se registró correctamente.',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        iconColor: '#FDD45B',
                                    });
                                    setTimeout(function() {
                                        window.location.href = 'Home-SuperAdmin.php'; // Redirige después de 3 segundos
                                    }, 2000);
                                } else if (response == "error_password") {
                                    Swal.fire({
                                        title: 'Las contraseñas no son iguales',
                                        text: ' Intente nuevamente',
                                        icon: 'error',
                                        confirmButtonText: 'Volver',
                                        confirmButtonColor: '#FDD45B'
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'No se pudo registrar correctamente',
                                        text: ' Intente nuevamente',
                                        icon: 'error',
                                        confirmButtonText: 'Volver',
                                        confirmButtonColor: '#FDD45B'
                                    });
                                }
                            },
                            error: function() {

                            }
                        });
                    });
                });
            </script>


            <table id="example" class="display table-hover bg-dark " style="width:100%; color: #ffff">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Fecha de nacimiento</th>
                        <th>Correo electrónico</th>
                        <th>Ubicación</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT id_user, nombre, telefono, date_format(fecha_nacimiento, '%d/%m/%Y') as fecha_nacimiento, ubicacion, correo, password_user, permisos, estado FROM usuario WHERE permisos = 1";

                    $result = mysqli_query($conn, $sql);

                    while ($usuario = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td id="centrado"><?php echo $usuario['id_user']; ?></td>
                            <td id="centrado"><?php echo $usuario['nombre'] ?></td>
                            <td id="centrado"><?php echo $usuario['telefono'] ?></td>
                            <td id="centrado"><?php echo $usuario['fecha_nacimiento'] ?></td>
                            <td id="centrado"><?php echo $usuario['correo'] ?></td>
                            <td id="centrado"><?php echo $usuario['ubicacion'] ?></td>
                            <td>
                                <?php if ($usuario['estado'] == 1) { ?>
                                    <i class="fa-solid fa-circle-check text-success"></i> Habilitado
                                <?php } elseif ($usuario['estado'] == 0) { ?>
                                    <i class="fa-solid fa-circle-xmark text-danger"></i> Deshabilitado
                                <?php } else { ?>
                                    Valor desconocido
                                <?php } ?>
                            <td>
                                <?php if ($usuario['estado'] == 1) { ?>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editUser<?php echo $usuario['id_user']; ?>"><i class="fa-solid fa-pencil"></i></button>
                                    <button class="btn btn-sm btn-danger" onclick="deshabilitar (<?php echo $usuario['id_user']; ?>)"><i class="fas fa-trash-alt"></i></button>
                                <?php } elseif ($usuario['estado'] == 0) { ?>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editUser<?php echo $usuario['id_user']; ?>"><i class="fa-solid fa-pencil"></i></button>
                                    <button class="btn btn-sm btn-success" onclick="habilitar(<?php echo $usuario['id_user']; ?>)"><i class="fas fa-check"></i></button>
                                <?php } else { ?> Valor desconocido
                                <?php } ?>
                            </td>


                            <?php include('modal/editarAlumno.php'); ?>

                        </tr>
                    <?php } ?>


                </tbody>


            </table>
        </div>


    </section>
    <?php
    require('../../Logica/DAO/Super-Admin/DAO-Gestion-Estudiantes.php');
    $dao = new DAO();
    if (isset($_POST['editar'])) {
        if (!empty($_POST['id_user'])) {
            $id_user = $_POST['id_user'];
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $fecha_nacimiento = $_POST['fecha_nacimiento'];
            $ubicacion = $_POST['ubicacion'];
            $correo = $_POST['correo'];

            $resultado = $dao->editarAlumno($id_user, $nombre, $telefono, $fecha_nacimiento, $correo,$ubicacion);
            if ($resultado == true) {
                echo "<script>
                    Swal.fire({
                    title: 'Usuario Modificado',
                    text: 'Se modificó el usuario correctamente',
                    icon: 'success',
                    allowOutsideClick: false,
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#25b32c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Home-SuperAdmin.php';
                    }
                    });
                </script>";
            } else {
                echo "<script>
                    Swal.fire({
                    title: 'Hubo un Problema',
                    text: 'No se pudo modificar el usuario',
                    icon: 'error',
                    allowOutsideClick: false,
                    confirmButtonText: 'Volver',
                    confirmButtonColor: '#e74c3c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Home-SuperAdmin.php';
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
        function deshabilitar(id_user) {
            Swal.fire({
                title: '¿Estás seguro en que quieres deshabilitar el usuario?',
                text: 'El usuario quedara sin la posibilidad de acceder al sistema',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, deshabilitar',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#198754',
                cancelButtonColor: '#adb5bd',
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = id_user;
                    var estado = 'deshabilitar';
                    $.ajax({
                        url: 'php/estado-usuario.php',
                        type: 'POST',
                        data: {
                            id,
                            estado
                        },
                        success: function(response) {
                            if (response === 'success') {
                                Swal.fire({
                                    title: 'Usuario Deshabilitado',
                                    text: 'Los permisos se han retirado por completo',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    confirmButtonColor: '#25b32c',
                                });
                                setTimeout(function() {
                                    window.location.href = 'Home-SuperAdmin.php';
                                }, 2000);
                            } else {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Hubo un error al retirar los permisos.',
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

        function habilitar(id_user) {
            Swal.fire({
                title: '¿Estás seguro en que quieres habilitar al usuario?',
                text: 'El usuario quedara con la posibilidad de volver acceder al sistema',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, habilitar',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#198754',
                cancelButtonColor: '#adb5bd',
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = id_user;
                    var estado = 'habilitar';
                    $.ajax({
                        url: 'php/estado-usuario.php',
                        type: 'POST',
                        data: {
                            id,
                            estado
                        },
                        success: function(response) {
                            if (response === 'success') {
                                Swal.fire({
                                    title: 'Usuario Habilitado',
                                    text: 'El alumno fue habilitado correctamente',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    confirmButtonColor: '#25b32c',
                                });
                                setTimeout(function() {
                                    window.location.href = 'Home-SuperAdmin.php';
                                }, 2000);
                            } else {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Hubo un error al retirar los permisos.',
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

    <script src="../../Js/DataTable.js"></script>

    <!-- Validar Password en Agregar Usuario -->
    <script src="../../Js/formulario.js"></script>
</body>

</html>