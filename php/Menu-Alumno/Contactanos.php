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

    <link rel="stylesheet" href="../../Css/Contactanos.css">
    <link rel="shortcut icon" href="../../Img/logo New Drivers.jpg" />

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

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
            <a href="Contactanos.php" style="color: #FDD45B;">
                <li><i class="fa-solid fa-circle-exclamation" style="color: #FDD45B;"></i>Contáctanos</li>
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
            Contáctanos
        </h3>



        <div class="values">

            <div class="" id="vehiculo-container">
                <div class="container">
                    <div class="row bg-dark animate-in-down">
                        <div class="p-4 col-md-6 align-self-center text-color">
                        <h1>Envía tu problema</h1>
                        <p class="my-4 fs-4">
                            En esta sección, puedes ponerte en contacto con nosotros. Valoramos tus opiniones, preguntas o cualquier comentario que desees compartir. Completa el formulario a continuación y te responderemos lo antes posible.
                        </p>
                        </div>
                        <div class="p-0 col-md-6">
                            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="../../Img/Imagenes-landing/RayoContactanos2.png" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="../../Img/Imagenes-landing/CorazonContactanos.png" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="../../Img/Imagenes-landing/CalendarioContactanos.png" class="d-block w-100" alt="...">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container bg-dark mt-5 w-75 p-5 ">

                <div class="contact-image">
                    <img src="../../Img/Imagenes-landing/correo.png" alt="rocket_contact" />
                </div>
                <form method="POST" action="php/Proceso-Contactanos.php">
                    <h1 style="text-align:center">Describe tu problema</h1>
                    <input type="hidden" name="nombre" value="<?php echo $_SESSION['nombre'] ?>">
                    <input type="hidden" name="telefono" value="<?php echo $_SESSION['telefono'] ?>">
                    <input type="hidden" name="correo" value="<?php echo $_SESSION['correo'] ?>">


                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label font-weight-bold fs-5">Asunto</label>
                        <input type="text" class="form-control bg-dark-x border-0" name="asunto" id="exampleFormControlInput1" placeholder="Ingresa el asunto">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label font-weight-bold fs-5">Descripción</label>
                        <textarea class="form-control bg-dark-x border-0" name="descripcion" id="exampleFormControlTextarea2" rows="3" placeholder="Entrega todos los detalles posibles"></textarea>
                    </div>

                    <button type="submit" name="enviar" class="btn btn-warning w-100">Enviar</button>
                </form>



            </div>

        </div>


    </section>

    <script>
                <?php
                if (isset($_GET['alert'])) {
                    if ($_GET['alert'] === 'success') {
                        echo "Swal.fire({
                    icon: 'success',
                    title: 'Mensaje enviado correctamente',
                    text: 'Pronto un administrador se pondra manos a la obra para solucionar tu problema',
                    showConfirmButton: false
                });";
                    } elseif ($_GET['alert'] === 'error') {
                        echo "Swal.fire({
                    icon: 'error',
                    title: 'Ocurrió un problema',
                    text: 'Intenta Nuevamente',
                    showConfirmButton: false
                });";
                    }
                }
                ?>
    </script>


    <script>
        $(document).ready(function() {
            $("#file-upload").change(function() {
                filePreview(this);
            });
        });
    </script>

    <script>
        $('#menu-btn').click(function() {
            $('#menu').toggleClass("active");
        })
    </script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>