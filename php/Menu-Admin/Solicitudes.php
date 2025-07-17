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

    <link rel="stylesheet" href="../../Css/Solicitudes.css">
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
            <a href="Home-SuperAdmin.php" >
                <li><i class="fa-solid fa-book" ></i>Ver Alumnos</li>
            </a>
            <a href="Ver-instructores.php" >
                <li><i class="fa-solid fa-users" ></i>Ver Instructores</li>
            </a>
            <a href="Solicitudes.php" style="color: #FDD45B;">
                <li><i class="fa-solid fa-list" style="color: #FDD45B;"></i>Solicitudes</li>
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
            Solicitudes de instructores
        </h3>



        <div class="values">


            <table id="example" class="display table-hover bg-dark" style="width:100%; color: #ffff">
                <thead>
                    <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Descripción</th>
                    <th class="text-center">Correo electrónico</th>
                    <th class="text-center">Licencia de conducir</th>
                    <th class="text-center">Cédula de identidad</th>
                    <th class="text-center">Hoja de vida</th>
                    <th class="text-center">Capacitación</th>
                    <th class="text-center">Semep</th>
                    <th class="text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>



                    <?php
                    $sql = "SELECT id_user, nombre, correo, licencia, cedula, hojaDeVida, capacitacion, semep, descripcion_prof 
                    FROM usuario INNER JOIN profesor ON profesor.fk_usuario_id = usuario.id_user WHERE aprobado = 1";

                    $result = mysqli_query($conn, $sql);

                    while ($usuario = mysqli_fetch_array($result)) {

                        $nombreLicencia = $usuario["licencia"];
                        $nombreCedula = $usuario["cedula"];
                        $nombreHojaDeVida = $usuario["hojaDeVida"];
                        $nombreCapacitacion = $usuario["capacitacion"];
                        $nombreSemep = $usuario["semep"];

                        $rutaArchivoLicencia = "../../Logica/uploads/" . $nombreLicencia;
                        $rutaArchivoCedula = "../../Logica/uploads/" . $nombreCedula;
                        $rutaArchivoHojaDeVida = "../../Logica/uploads/" . $nombreHojaDeVida;
                        $rutaArchivoCapacitacion = "../../Logica/uploads/" . $nombreCapacitacion;
                        $rutaArchivoSemep = "../../Logica/uploads/" . $nombreSemep;

                    ?>

                        <tr>

                            <td><?php echo $usuario['id_user']; ?></td>
                            <td class="text-center"><?php echo $usuario['nombre'] ?></td>
                            <td class="text-center"><?php echo $usuario['descripcion_prof'] ?></td>
                            <td class="text-center"><?php echo $usuario['correo'] ?></td>

                            <td class="text-center">
                                <a href="<?php echo $rutaArchivoLicencia; ?>" target="_blank">
                                    <button type="button" class="btn btn-sm btn-warning p-1">
                                        <img src="../../Img/licencia-de-conducir.png" width="29px" alt="">
                                    </button>
                                </a>
                            </td>



                            <td class="text-center">
                                <a href="<?php echo $rutaArchivoCedula; ?>" target="_blank">
                                    <button type="button" class="btn btn-sm btn-warning p-2">
                                        <i class="fa-solid fa-address-card fs-5"></i>
                                    </button>
                                </a>
                            </td>


                            <td class="text-center">
                                <a href="<?php echo $rutaArchivoHojaDeVida; ?>" target="_blank">
                                    <button type="button" class="btn btn-sm btn-warning p-2">
                                        <i class="fa-solid fa-file-waveform fs-5"></i>
                                    </button>
                                </a>
                            </td>


                            <td class="text-center">
                                <a href="<?php echo $rutaArchivoCapacitacion; ?>" target="_blank">
                                    <button type="button" class="btn btn-sm btn-warning p-2">
                                        <i class="fa-solid fa-file-contract fs-5"></i>
                                    </button>
                                </a>
                            </td>


                            <td class="text-center">
                                <a href="<?php echo $rutaArchivoSemep; ?>" target="_blank">
                                    <button type="button" class="btn btn-sm btn-warning p-2">
                                        <i class="fa-solid fa-file-contract fs-5"></i>
                                    </button>
                                </a>
                            </td>


                            <td class="text-center">

                                <button type="button" style="margin-right: 5px !important;" class="btn btn-sm btn-danger " onclick="rechazar(<?php echo $usuario['id_user']; ?>)">
                                    <i class="fa-solid fa-xmark "></i></button>

                                <button type="button" style="margin-left: 5px !important;" class="btn btn-sm btn-success " onclick="aceptar(<?php echo $usuario['id_user']; ?>)">
                                    <i class="fa-solid fa-check "></i></button>
                            </td>

                        </tr>

                    <?php } ?>
                    <!--<tr>
                        <td>1</td>
                        <td>Juan Pablo Cayul</td>
                        <td style="text-align: justify;"> Estudiante universitario de ingeniería da clases de matemáticas y física para alumnos de enseñanza media en Arica</td>

                        <td>juanpablo.jpc9@gmail.com</td>
                        <td class="text-center"><button type="button" class="btn btn-sm btn-warning p-2"><i class="fa-solid fa-file-arrow-down fs-5"></i></i></button></td>
                        <td class="text-center"><button type="button" class="btn btn-sm btn-warning p-2"><i class="fa-solid fa-file-arrow-down fs-5"></i></i></button></td>
                        <td class="text-center"><button type="button" class="btn btn-sm btn-warning p-2"><i class="fa-solid fa-file-arrow-down fs-5"></i></i></button></td>
                        <td class="text-center"><button type="button" class="btn btn-sm btn-warning p-2"><i class="fa-solid fa-file-arrow-down fs-5"></i></i></button></td>
                        <td class="text-center"><button type="button" class="btn btn-sm btn-warning p-2"><i class="fa-solid fa-file-arrow-down fs-5"></i></i></button></td>
                        <td class="text-center">
                        <button type="button" class="btn btn-sm btn-success p-2"><i class="fa-solid fa-check fs-5"></i></i></button>
                        <button type="button" class="btn btn-sm btn-danger p-2"><i class="fa-solid fa-xmark fs-5"></i></i></button>
                        </td>
                    </tr> -->

                </tbody>


            </table>
        </div>


    </section>


    <script>
        function rechazar(id_user) {
            Swal.fire({
                title: '¿Estás seguro en que quieres rechazar al instructor?',
                text: 'El instructor se quedara sin la posibilidad de ejercer clases en NewDrivers',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, rechazar',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#fe3939',
                cancelButtonColor: '#adb5bd',
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = id_user;
                    var respuesta = 'rechazar';
                    $.ajax({
                        url: 'php/CorreoInstructor.php',
                        type: 'POST',
                        data: {
                            id_user: id, // Cambia id por id_user
                            respuesta: respuesta
                        },

                        success: function(response) {
                            console.log(response);
                            if (response === 'success') {
                                Swal.fire({
                                    title: 'Profesor rechazado',
                                    text: 'El profesor fue rechazado con exito',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    confirmButtonColor: '#25b32c',
                                });
                                setTimeout(function() {
                                    window.location.href = 'Solicitudes.php';
                                }, 2000);
                            } else {

                                Swal.fire({
                                    title: 'Error',
                                    text: 'Ocurrio un problema al rechazar al profesor',
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

        function aceptar(id_user) {
            Swal.fire({
                title: '¿Estás seguro en que quieres aceptar al instructor?',
                text: 'El instructor quedara con los permisos de entrar al sistema y comenzar a ejercer clases',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, aceptar',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#198754',
                cancelButtonColor: '#adb5bd',
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log(id_user);
                    var id = id_user;
                    var respuesta = 'aceptar';
                    $.ajax({
                        url: 'php/CorreoInstructor.php',
                        type: 'POST',
                        data: {
                            id_user: id, // Cambia id por id_user
                            respuesta: respuesta
                        },
                        success: function(response) {
                            if (response === 'success') {
                                Swal.fire({
                                    title: 'Profesor agregado al sistema',
                                    text: 'El profesor fue aceptado con exito',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    confirmButtonColor: '#25b32c',
                                });
                                setTimeout(function() {
                                    window.location.href = 'Solicitudes.php';
                                }, 2000);
                            } else {
                                console.log(response);
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Ocurrio un problema al aceptar al profesor',
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

    <script src="../../Js/SolicitudesDatatable.js"></script>

    <!-- Validar Password en Agregar Usuario -->
</body>

</html>