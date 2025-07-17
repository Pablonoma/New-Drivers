<?php
include('../../Logica/DAO/DAO-Inicio-Sesion.php');
$dao = new DAO();
ob_start();
?>



<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/9002e57fba.js" crossorigin="anonymous"></script>

    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Fonts Used = "spartan" -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;600&family=PT+Serif:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../Css/Recuperar-Contrasena.css">
    <link rel="shortcut icon" href="../../Img/logo New Drivers.jpg" />

    <title>New Drivers - Inicio de sesión</title>
</head>

<body class="bg-dark">
    <section>
        <div class="row g-0">
            <div class="col-lg-7 d-none d-lg-block">

                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item img-1 min-vh-100 active">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>En New Drivers, encontrarás la flexibilidad y comodidad que no hallarás en ningún otro lugar.</h5>
                                <p>Estamos comprometidos en brindarte una experiencia de aprendizaje de conducción excepcional, adaptada a tus necesidades.
                                    Nos esforzamos por ofrecerte la flexibilidad y comodidad que mereces en tu viaje para convertirte en un conductor seguro y confiado."</p>
                            </div>
                        </div>
                        <div class="carousel-item img-2 min-vh-100">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Para una conducción segura, siempre usa las dos manos en el volante.</h5>
                                <p>En tus clases de conducción, aprenderás cómo dominar el volante y mantener el control
                                    en diferentes situaciones de manejo. ¡Sigue practicando!</p>
                            </div>
                        </div>
                        <div class="carousel-item img-4 min-vh-100">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>


            </div>

            <div class="col-lg-5 d-flex flex-column align-items-end min-vh-100">
                <div class=" d-flex justify-content-around px-lg-5 pt-lg-4 pb-lg-3 p-4 w-100  mb-auto">
                    <img src="../../Img/Logo.png" width="300px">
                </div>
                <div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">
                    <div class="volver mb-2">
                        <a href="Login.php">
                            <img src="../../Img/back.png" alt="" width="60px">
                        </a>
                    </div>
                    <h1 class="font-weight-bold mb-4">Recupera tu contraseña</h1>
                    <form class="mb-5" method="POST" action="php-registro/Correo-Recuperacion.php">
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label font-weight-bold">Correo electrónico</label>
                            <input type="email" name="correo" class="form-control bg-dark-x border-0" placeholder="Ingresa tu correo para recuperar tu contraseña" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" name="ingresar" class="btn btn-primary w-100">Recuperar</button>
                    </form>

                    <p class="font-weight-bold text-center text-muted">Envía tu solicitud para convertirte en</p>
                    <div class="d-flex justify-content-around">
                        <a class="btn w-100" href="RegistroProfesor.php">
                            <button type="button" class="btn btn-outline-warning w-50"> <i id="icono" class="fa-regular fa-id-card lead mr-2"> </i> Instructor</button></a>
                    </div>
                </div>

                <div class="text-center px-lg-5 pt-lg-3 pb-lg-4 p-4 w-100 mt-auto">
                    <p class="d-inline-block mb-0">¿Todavía no tienes cuenta?</p> <a href="Registro.php" class="text-light font-weight-bold
                ">Haz tu cuenta ahora</a>
                </div>
            </div>
        </div>
    </section>

    <script>
        <?php
        if (isset($_GET['alert'])) {
            if ($_GET['alert'] === 'success') {
                echo "Swal.fire({
                    icon: 'success',
                    title: 'Contraseña Recuperada',
                    text: 'Hemos recuperado tu contraseña con éxito. Por favor, revisa tu bandeja de entrada o spam.',
                    showConfirmButton: false
                });";
            } elseif ($_GET['alert'] === 'error') {
                echo "Swal.fire({
                    icon: 'error',
                    title: 'Correo no encontrado',
                    text: 'Por favor, verifica que tu correo esté registrado correctamente.'
                    showConfirmButton: false
                });";
            }
        }
        ?>
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>