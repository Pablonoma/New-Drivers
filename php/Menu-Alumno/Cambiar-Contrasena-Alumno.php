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

    <link rel="stylesheet" href="../../Css/Cambiar-Contrasena-Profesor.css">
    <link rel="shortcut icon" href="../../Img/logo New Drivers.jpg" />

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- DataTables  -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">



    <title>Menu - Alumno</title>
</head>

<body>

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
            <a href="Solicitudes-Profesores.php">
                <li><i class="fa-solid fa-list"></i>Solicitudes</li>
            </a>

            <?php
            $finalizado = $dao->contadorFinalizado($_SESSION["id_alum"]);

            if ($finalizado == 0 || $finalizado == null) {
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

            <a href="Cambiar-Contrasena-Alumno.php" style="color: #FDD45B;">
                <li><i class="fa-solid fa-key" style="color: #FDD45B;"></i>Cambiar contraseña</li>
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
            Cambiar Contraseña
        </h3>



        <div class="values">

            <div class="container p-4 mt-2 w-75">
                <h1 class="font-weight-bold mb-3 text-center">Cambia tu contraseña</h1>
                <hr>
                <form class="formulario mb-5" id="formulario" enctype="multipart/form-data" method="POST">
                    <!-- Contraseña Dinamica -->

                    <input type="hidden" name="id" value="<?php echo $_SESSION['id_user']; ?>">

                    <div class="passwordAntigua mb-3" id="grupo__password_old">
                        <label for="password" class="form-label font-weight-bold">Antigua Contraseña</label>
                        <div class="formulario__grupo-input">
                            <input type="password" name="passwordAntigua" class="formulario__input form-control bg-dark-x border-1 mb-2" placeholder="Ingresa tu contraseña" id="passwordAntigua" required>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                    </div>

                    <div class="formulario__grupo mb-3" id="grupo__password">
                        <label for="password" class="form-label font-weight-bold">Nueva Contraseña</label>
                        <div class="formulario__grupo-input">
                            <input type="password" name="password" class="formulario__input form-control bg-dark-x border-1 mb-2" placeholder="Ingresa tu contraseña" id="password" required>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">La contraseña debe contener al menos 8 caracteres, 1 mayúscula, 1 dígito y 1 carácter especial.</p>
                    </div>

                    <div class="formulario__grupo mb-3" id="grupo__password2">
                        <label for="password2" class="form-label font-weight-bold">Confirmar Contraseña</label>
                        <div class="formulario__grupo-input">
                            <input type="password" name="password2" class="formulario__input form-control bg-dark-x border-1 mb-2" placeholder="Ingresa tu contraseña" id="password2" required>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">Por favor, asegúrate de que las contraseñas sean idénticas.</p>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-4 p-2">Guardar Cambios</button>
                </form>
            </div>

        </div>


    </section>

    <script>
        $(document).ready(function() {
            $('#formulario').submit(function(e) {
                e.preventDefault(); // Evita que el formulario se envíe de forma tradicional

                // Recopila los datos del formulario
                var formData = new FormData(this);


                // Realiza la solicitud AJAX
                $.ajax({
                    type: 'POST',
                    url: 'php/Cambiar-Contrasena.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Maneja la respuesta aquí
                        if (response == "success") {
                            Swal.fire({
                                title: 'Cambiaste tu contraseña con éxito!.',
                                text: 'La contraseña fue modificada correctamente',
                                icon: 'success',
                                showConfirmButton: false,
                            });
                            setTimeout(function() {
                                window.location.href = 'Cambiar-Contrasena-Alumno.php';
                            }, 2000);
                        } else if (response == "bad_password") {
                            Swal.fire({
                                title: 'La contraseña Actual es incorrecta',
                                text: 'Intente nuevamente',
                                icon: 'error',
                                confirmButtonText: 'Volver',
                                confirmButtonColor: '#356dce'
                            });
                        } else if (response == "short_password") {
                            Swal.fire({
                                title: 'La Nueva contraseña es Insegura',
                                text: 'La contraseña debe contener Minimo 8 caracteres y tambien debe contener 1 número, 1 mayúscula y 1 carácter especial.',
                                icon: 'error',
                                confirmButtonText: 'Volver',
                                confirmButtonColor: '#356dce'
                            });
                        } else if (response == "error_password") {
                            Swal.fire({
                                title: 'La confirmación no coincide con la nueva contraseña',
                                text: ' Intente nuevamente',
                                icon: 'error',
                                confirmButtonText: 'Volver',
                                confirmButtonColor: '#356dce'
                            });
                        } else if (response == "same") {
                            Swal.fire({
                                title: 'Error de contraseña nueva',
                                text: 'La nueva contraseña no puede la misma contraseña que la que posees Actualmente, Intente nuevamente',
                                icon: 'error',
                                confirmButtonText: 'Volver',
                                confirmButtonColor: '#356dce'
                            });
                        } else {
                            Swal.fire({
                                title: 'Ocurrió un error',
                                text: ' Intente nuevamente',
                                icon: 'error',
                                confirmButtonText: 'Volver',
                                confirmButtonColor: '#356dce'
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("Error en la solicitud AJAX:", textStatus, errorThrown);
                    }
                });
            });
        });
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