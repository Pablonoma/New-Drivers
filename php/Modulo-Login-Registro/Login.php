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

    <link rel="stylesheet" href="../../Css/Login.css">
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
                        <a href="../../Index.php">
                            <img src="../../Img/back.png" alt="" width="60px">
                        </a>
                    </div>
                    <h1 class="font-weight-bold mb-4">Bienvenido de vuelta</h1>
                    <form class="mb-5" method="POST">
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label font-weight-bold">Correo electrónico</label>
                            <input type="email" name="correo" class="form-control bg-dark-x border-0" placeholder="Ingresa tu email" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label font-weight-bold">Contraseña</label>
                            <input type="password" name="password" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingresa tu contraseña" id="exampleInputPassword1">
                            <a href="Recuperar-Contrasena.php" id="emailHelp" class="form-text text-muted text-decoration-none">¿Has olvidado tu contraseña?</a>
                        </div>
                        <button type="submit" name="ingresar" class="btn btn-primary w-100">Iniciar Sesión</button>
                    </form>

                    <p class="font-weight-bold text-center text-muted">Envía tu solicitud para convertirte en</p>
                    <div class="d-flex justify-content-around">
                        <a class="btn btn-outline-warning w-50" href="RegistroProfesor.php">
                            <i id="icono" class="fa-regular fa-id-card lead mr-3 mt-2"> </i> Instructor
                        </a>
                    </div>
                </div>

                <div class="text-center px-lg-5 pt-lg-3 pb-lg-4 p-4 w-100 mt-auto">
                    <p class="d-inline-block mb-0">¿Todavía no tienes cuenta?</p> <a href="Registro.php" class="text-light font-weight-bold
                ">Haz tu cuenta ahora</a>
                </div>
            </div>
        </div>
    </section>
    <?php
    if (isset($_POST['ingresar'])) {
        $correo = $_POST['correo'];
        $password = $_POST['password'];

        $resultado = $dao->inicioSesion($correo, $password);
        $nombreUsuario = $dao->buscarNombre($correo);

        if ($resultado == 3) {

            session_start();
            $_SESSION['nombre'] = $nombreUsuario[0];
            $_SESSION['id_user'] = $nombreUsuario[1];
            $_SESSION['telefono'] = $nombreUsuario[2];
            $_SESSION['fecha_nacimiento'] = $nombreUsuario[3];
            $_SESSION['correo'] = $nombreUsuario[4];
            $_SESSION['permisos'] = $nombreUsuario[5];
            $_SESSION['imagen'] = $nombreUsuario[8];
            $_SESSION['descripcion_alum'] = $nombreUsuario[9];
            $_SESSION['ubicacion'] = $nombreUsuario[10];

            $Alumno = $dao->buscarAlumno($_SESSION['id_user']);
            $_SESSION["id_alum"] = $Alumno[0];

            echo "<script>Swal.fire({
                icon: 'success',
                title: 'Credenciales correctas!',
                text: 'Bienvenido de vuelta',
                showConfirmButton: false,
                iconColor: '#FDD45B',
            });
            setTimeout(function() {
                window.location.href = '../Menu-Alumno/Home-Alumno.php'; // Redirige al índice después de 2 segundos
            }, 2000); // 2 segundos</script>";
        } else if ($resultado == 2) {

            session_start();
            $_SESSION['nombre'] = $nombreUsuario[0];
            $_SESSION['id_user'] = $nombreUsuario[1];
            $_SESSION['telefono'] = $nombreUsuario[2];
            $_SESSION['fecha_nacimiento'] = $nombreUsuario[3];
            $_SESSION['correo'] = $nombreUsuario[4];
            $_SESSION['permisos'] = $nombreUsuario[5];
            $_SESSION['descripcion'] = $nombreUsuario[7];
            $_SESSION['imagen'] = $nombreUsuario[8];
            $_SESSION['ubicacion'] = $nombreUsuario[10];

            $Profesor = $dao->buscarProfe($_SESSION['id_user']);
            $_SESSION["id_profe"] = $Profesor[0];

            echo "<script>Swal.fire({
                icon: 'success',
                title: 'Credenciales correctas!',
                text: 'Bienvenido de vuelta',
                showConfirmButton: false,
                iconColor: '#FDD45B',
            });
            setTimeout(function() {
                window.location.href = '../Menu-Profesor/Vehiculo-Profesor.php'; // Redirige al índice después de 2 segundos // ingreso como Profesor
            }, 2000); // 2 segundos</script>";
        } else if ($resultado == 1) {

            session_start();
            $_SESSION['nombre'] = $nombreUsuario[0];
            $_SESSION['id_user'] = $nombreUsuario[1];
            $_SESSION['telefono'] = $nombreUsuario[2];
            $_SESSION['fecha_nacimiento'] = $nombreUsuario[3];
            $_SESSION['correo'] = $nombreUsuario[4];
            $_SESSION['permisos'] = $nombreUsuario[5];
            $_SESSION['imagen'] = $nombreUsuario[8];
            $_SESSION['ubicacion'] = $nombreUsuario[10];

            echo "<script>Swal.fire({
                icon: 'success',
                title: 'Credenciales correctas!',
                text: 'Bienvenido de vuelta',
                showConfirmButton: false,
                iconColor: '#FDD45B',
            });
            setTimeout(function() {
                window.location.href = '../Menu-Admin/Home-SuperAdmin.php'; // Redirige al índice después de 2 segundos // ingreso como Super Admin
            }, 2000); // 2 segundos</script>";
        } else if ($resultado == 0) {
            echo "<script>Swal.fire({
        icon: 'error',
        title: 'Credenciales incorrectas',
        text: 'Por favor, verifica tu correo y contraseña e intenta nuevamente. Recuerda que tambien puedes cambiar tu contraseña',
        showConfirmButton: false,
        });
        setTimeout(function() {
            Swal.close(); // Cierra la alerta después de 3 segundos
        }, 3000); // 3 segundos</script>";
        }
    }
    ?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>