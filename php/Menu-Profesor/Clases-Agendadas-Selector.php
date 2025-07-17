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
            <a href="Solicitudes-Alumnos.php">
                <li><i class="fa-solid fa-list"></i>Solicitudes de alumnos</li>
            </a>
            <a href="Solicitudes-Alumnos.php" style="color: #FDD45B;">
                <li><i class="fa-solid fa-list" style="color: #FDD45B;"></i>Clases Agendadas</li>
            </a>
            <a href="Alumnos-Profesor.php">
                <li><i class="fa-solid fa-users"></i>Mis Alumnos</li>
            </a>
            <a href="Reagendar-Clases.php">
                <li><i class="fa-solid fa-repeat"></i>Reagendar Clases</li>
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
        <div class="titulo">
            <h3 class="i-name">Clases Agendadas</h3>
            <h3 class="i-name" id="titulo-clase">Clases Teóricas</h3>
            <select class="form-select w-25 bg-dark" id="selector">
                <option value="teorica">Clases Teóricas</option>
                <option value="practica">Clases Prácticas</option>
            </select>
        </div>





        <div class="values">


            <table id="example" class="display table-hover bg-dark" style="width:100%; color: #ffff">
                <thead>
                    <tr>
                        <th class="text-center">Alumno</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Comienzo de la clase</th>
                        <th class="text-center">Termino de la clase</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Especificamientos del alumno</th>
                        <th class="text-center">Observaciones del profesor</th>
                        <th class="text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody id="table-body">

                </tbody>
            </table>
        </div>

    </section>


    <script>
        document.getElementById('selector').addEventListener('change', function() {
            var tabla = this.value;
            actualizarContenido(tabla);
            actualizarTitulo(tabla);

        });

        function actualizarContenido(tabla) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "obtenerDatos.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById('table-body').innerHTML = xhr.responseText;
                }
            };
            xhr.send("tabla=" + tabla);
        }

        function actualizarTitulo(tabla) {
            var titulo = document.getElementById('titulo-clase');
            if (tabla === 'teorica') {
                titulo.textContent = 'Clases Teóricas';
            } else if (tabla === 'practica') {
                titulo.textContent = 'Clases Prácticas';
            }
        }
        // Inicializar contenido al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            var selector = document.getElementById('selector');
            actualizarContenido(selector.value);
            actualizarTitulo(selector.value);

        });
    </script>


    <?php
    require('../../Logica/DAO/Profesor/DAO-Profesor.php');
    $dao = new DAO();
    if (isset($_POST['cancelar'])) {
        if (!empty($_POST['id_clase'])) {
            $id_clase = $_POST['id_clase'];
            $motivo = $_POST['motivo'];

            $resultado = $dao->cancelarClaseTeorica($id_clase, $motivo);
            if ($resultado == true) {
                echo "<script>
                    Swal.fire({
                    title: 'Clase cancelada',
                    text: 'La clase fue cancelada correctamente. Recuerde que deberá reprogramar esta clase.',
                    icon: 'success',
                    allowOutsideClick: false,
                    confirmButtonText: 'Cancelar Clase',
                    confirmButtonColor: '#25b32c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Clases-Agendadas.php';
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
                        window.location.href = 'Clases-Agendadas.php';
                    }
                    });
                </script>";
            }
        } else {

            echo "<script>
                Swal.fire({
                title: 'Campos Vacios',
                text: 'Ingrese Todos los datos Por Favor',
                icon: 'warning',
                allowOutsideClick: false,
                confirmButtonText: 'Volver',
                confirmButtonColor: '#f39c12',
                });
            </script>";
        }
    }

    if (isset($_POST['reagendar'])) {
        if (!empty($_POST['id_clase'])) {
            $id_clase = $_POST['id_clase'];
            $motivo = $_POST['motivo'];
            $comienzo = $_POST['comienzo'];
            $termino = $_POST['termino'];

            $resultado = $dao->reagendarClaseTeorica($id_clase, $motivo, $comienzo, $termino);
            if ($resultado == true) {
                echo "<script>
                    Swal.fire({
                    title: 'Clase cancelada',
                    text: 'La clase fue cancelada y reagendada correctamente',
                    icon: 'success',
                    allowOutsideClick: false,
                    confirmButtonText: 'Cancelar Clase',
                    confirmButtonColor: '#25b32c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Clases-Agendadas.php';
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
                        window.location.href = 'Clases-Agendadas.php';
                    }
                    });
                </script>";
            }
        } else {

            echo "<script>
                Swal.fire({
                title: 'Campos Vacios',
                text: 'Ingrese Todos los datos Por Favor',
                icon: 'warning',
                allowOutsideClick: false,
                confirmButtonText: 'Volver',
                confirmButtonColor: '#f39c12',
                });
            </script>";
        }
    }

    if (isset($_POST['finalizar'])) {
        if (!empty($_POST['id_clase'])) {
            $id_clase = $_POST['id_clase'];
            $observacion = $_POST['observacion'];

            $resultado = $dao->finalizarClaseTeorica($id_clase, $observacion);
            if ($resultado == true) {
                echo "<script>
                    Swal.fire({
                    title: 'Clase finalizada correctamente',
                    text: 'La clase quedará registrada como completada ',
                    icon: 'success',
                    allowOutsideClick: false,
                    confirmButtonText: 'Cancelar Clase',
                    confirmButtonColor: '#25b32c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Clases-Agendadas.php';
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
                        window.location.href = 'Clases-Agendadas.php';
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

    /* Funciones para las Clases Practicas */

    if (isset($_POST['cancelarPractica'])) {
        if (!empty($_POST['id_clase'])) {
            $id_clase = $_POST['id_clase'];
            $motivo = $_POST['motivo'];

            $resultado = $dao->cancelarClasePractica($id_clase, $motivo);
            if ($resultado == true) {
                echo "<script>
                    Swal.fire({
                    title: 'Clase cancelada',
                    text: 'La clase fue cancelada correctamente, recuerde que deberá reagendar esta clase',
                    icon: 'success',
                    allowOutsideClick: false,
                    confirmButtonText: 'Cancelar Clase',
                    confirmButtonColor: '#25b32c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Clases-Agendadas.php';
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
                        window.location.href = 'Clases-Agendadas.php';
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

    if (isset($_POST['reagendarPractica'])) {
        if (!empty($_POST['id_clase'])) {
            $id_clase = $_POST['id_clase'];
            $motivo = $_POST['motivo'];
            $comienzo = $_POST['comienzo'];
            $termino = $_POST['termino'];

            $resultado = $dao->reagendarClasePractica($id_clase, $motivo, $comienzo, $termino);
            if ($resultado == true) {
                echo "<script>
                    Swal.fire({
                    title: 'Clase cancelada',
                    text: 'La clase fue cancelada y reagendada correctamente',
                    icon: 'success',
                    allowOutsideClick: false,
                    confirmButtonText: 'Cancelar Clase',
                    confirmButtonColor: '#25b32c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Clases-Agendadas.php';
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
                        window.location.href = 'Clases-Agendadas.php';
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

    if (isset($_POST['finalizarPractica'])) {
        if (!empty($_POST['id_clase'])) {
            $id_clase = $_POST['id_clase'];
            $observacion = $_POST['observacion'];

            $resultado = $dao->finalizarClasePractica($id_clase, $observacion);
            if ($resultado == true) {
                echo "<script>
                    Swal.fire({
                    title: 'Clase Finalizada Correctamente',
                    text: 'La clase quedara registrada como completada ',
                    icon: 'success',
                    allowOutsideClick: false,
                    confirmButtonText: 'Cancelar Clase',
                    confirmButtonColor: '#25b32c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Clases-Agendadas.php';
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
                        window.location.href = 'Clases-Agendadas.php';
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
        function rechazar(id_solicitud, tipo) {
            console.log(id_solicitud);
            Swal.fire({
                title: '¿Estás seguro de que deseas cancelar la clase?',
                text: 'Al cancelar la clase, deberás reagendarla. ¿Deseas hacerlo de inmediato?',
                icon: 'warning',
                showCancelButton: true,
                showDenyButton: true,
                confirmButtonColor: '#0d6efdfa',
                cancelButtonColor: '#6c757d',
                denyButtonColor: '#d33',
                confirmButtonText: 'Sí, Reagendar',
                denyButtonText: 'Cancelar Clase',
                cancelButtonText: 'Cerrar'
            }).then((result) => {
                if (result.isConfirmed) {
                    if (tipo == 'teorica') {
                        $('#cancelarClasereagendar' + id_solicitud).modal('show');
                    } else {
                        $('#cancelarClasereagendarPractica' + id_solicitud).modal('show');
                    }

                } else if (result.isDenied) {
                    $('#cancelarClase' + id_solicitud).modal('show');
                } else if (result.dismiss === Swal.DismissReason.cancel) {}
            });
        }
    </script>

    <script>
        function finalizar(id_solicitud, tipo) {
            console.log(id_solicitud);
            Swal.fire({
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
                    $.ajax({
                        url: 'php-profesor/finalizarClaseTeorica.php',
                        type: 'POST',
                        data: {
                            id_clase: id
                        },
                        success: function(response) {
                            if (response === 'success') {
                                Swal.fire({
                                    title: 'Completado',
                                    text: 'La clase se registro como realizada correctamente',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    confirmButtonColor: '#25b32c',
                                });
                                setTimeout(function() {
                                    window.location.href = 'Clases-Agendadas.php';
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
                } else if (result.isDenied) {
                    $('#finalizarClase' + id_solicitud).modal('show');
                } else if (result.dismiss === Swal.DismissReason.cancel) {}
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

    <script src="../../Js/ClasesAgendadas.js"></script>


</body>

</html>