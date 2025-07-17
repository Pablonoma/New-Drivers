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
$id_user = $_GET['id_user'];
$id_alumno = $_SESSION['id_alum'];
require('../../Logica/DAO/Alumno/DAO-Alumno.php');
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

    <link rel="stylesheet" href="../../Css/Profesor-Info.css">
    <link rel="shortcut icon" href="../../Img/logo New Drivers.jpg" />

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- DataTables  -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">



    <title>Menu - Alumno</title>

</head>

<body>

    <script>
        console.log(<?php echo $_SESSION['id_alum'] ?>)
    </script>



    <section id="menu">
        <div class="logo">
            <img src="../../Img/Logo_velocimetro.png">
            <h2>New Drivers</h2>
        </div>

        <div class="items">

            <a href="#" style="color: #FDD45B;">
                <li><i class="fa-solid fa-book" style="color: #FDD45B;"></i>Intructores</li>
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
                <li><i class="fa-solid fa-list"></i>Contáctanos</li>
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
            <div class="volver">
                <a href="Home-Alumno.php">
                    <img src="../../Img/back-black.png" alt="" width="60px">
                </a>
                Información del profesor

            </div>
        </h3>


        <div class="values">

            <?php
            // Incluir el archivo donde está la función buscarNombreAlumno


            $sql = "SELECT 
        usuario.id_user, 
        usuario.nombre, 
        usuario.imagen, 
        usuario.ubicacion,
        profesor.experiencia, 
        profesor.descripcion_prof, 
        profesor.descripcion_clase, 
        profesor.aprobado, 
        vehiculo.imagen_auto, 
        profesor.id_prof,
        
        calificaciones_profesores.valoracion, 
        calificaciones_profesores.descripcion AS comentario,
        alumno.id_alum AS id_alum,
        alumno_imagen.imagen AS alumno_imagen
        FROM usuario 
        INNER JOIN profesor ON usuario.id_user = profesor.fk_usuario_id 
        INNER JOIN vehiculo ON profesor.id_prof = vehiculo.fk_profesor_id 
        LEFT JOIN calificaciones_profesores ON profesor.id_prof = calificaciones_profesores.fk_profesor_id
        LEFT JOIN alumno ON calificaciones_profesores.fk_alumno_id = alumno.id_alum
        LEFT JOIN usuario AS alumno_imagen ON alumno.fk_usuario_id = alumno_imagen.id_user
        WHERE usuario.id_user = '$id_user' 
        AND usuario.permisos = 2 
        AND profesor.aprobado = 2 
        GROUP BY profesor.id_prof, calificaciones_profesores.id_com";

            $result = mysqli_query($conn, $sql);
            $current_prof = null;
            $profesor_data = null;

            // Contador de comentarios
            $comentario_count = 0;
            $comentarios = []; // Para almacenar todos los comentarios

            while ($usuario = mysqli_fetch_array($result)) {
                if ($current_prof !== $usuario['id_prof']) {
                    $current_prof = $usuario['id_prof'];
                    $profesor_data = $usuario;

                    $count = $dao->contadorValoraciones($usuario['id_prof']);
                    $suma = $dao->sumadorValoraciones($usuario['id_prof']);

                    if ($count == 0 || $suma == 0) {
                        $promedio = 0;
                    } else {
                        $promedio = $suma / $count;
                        $promedio = number_format($promedio, 1);
                    }

                    $alumnosTotales = $dao->contadorAlumnosProfe($usuario['id_prof']);

                    $Teorico = $dao->contadorClasesTeoricasProfe($usuario['id_prof']);
                    $Practico = $dao->contadorClasesPracticasProfe($usuario['id_prof']);
                    $clasesTotales = $Teorico + $Practico;
            ?>

                    <!-- Información del profesor -->
                    <div class="info-profesor">
                        <hr>
                        <h1><?php echo $profesor_data['descripcion_prof']; ?></h1>

                        <!-- Sección "Acerca de la clase" -->
                        <div class="acerca-de-la-clase mt-4">
                            <h2>Acerca de la clase</h2>
                            <p><?php echo $profesor_data['descripcion_clase']; ?></p>
                        </div>

                        <!-- Nueva sección "Opiniones" -->
                        <div class="opiniones">
                            <div class="titulo-comentarios">
                                <h2><b>Comentarios</b></h2>
                                <div class="rating">
                                    <img src="../../Img/Imagenes-landing/etoile_on.svg" alt="">
                                    <?php echo $promedio ?>
                                    (<a href="#"><?php echo $count ?> comentarios</a>)
                                </div>
                            </div>
                        <?php
                    }

                    if ($usuario['comentario']) {
                        // Llamar a la función para obtener el nombre del alumno
                        $nombreAlumno = $dao->buscarNombreAlumno($usuario['id_alum']);
                        $comentario_count++;
                        $comentarios[] = [
                            'alumno_imagen' => $usuario['alumno_imagen'],
                            'nombre_alumno' => $nombreAlumno,
                            'valoracion' => $usuario['valoracion'],
                            'comentario' => $usuario['comentario']
                        ];
                    } else if ($usuario['comentario'] == 0) {
                        ?>
                            <div class="comentario">
                                <div class="usuario-info">
                                    <div class="usuario-info-left">
                                        <h5><b>No se han realizado comentarios en el perfil del profesor.</b></h5> <!-- Mostrar el nombre del alumno -->
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                }

                // Mostrar solo los primeros 3 comentarios
                foreach ($comentarios as $index => $comentario) {
                    if ($index < 3) { ?>
                            <div class="comentario">
                                <div class="usuario-info">
                                    <div class="usuario-info-left">
                                        <img src="../../Logica/uploads/<?php echo $comentario['alumno_imagen']; ?>" alt="Imagen de usuario">
                                        <h5><b><?php echo $comentario['nombre_alumno']; ?></b></h5>
                                    </div>
                                    <div class="usuario-info-right">
                                        <div class="nota-instructor">
                                            <div class="rating">
                                                <img src="../../Img/Imagenes-landing/etoile_on.svg" alt="">
                                                <b><?php echo $comentario['valoracion']; ?></b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="texto-comentario">
                                    <p><?php echo $comentario['comentario']; ?></p>
                                </div>
                            </div>
                        <?php } else { ?>
                            <!-- Comentarios ocultos inicialmente -->
                            <div class="comentario mas-comentarios" style="display:none;">
                                <div class="usuario-info">
                                    <div class="usuario-info-left">
                                        <img src="../../Logica/uploads/<?php echo $comentario['alumno_imagen']; ?>" alt="Imagen de usuario">
                                        <h5><b><?php echo $comentario['nombre_alumno']; ?></b></h5>
                                    </div>
                                    <div class="usuario-info-right">
                                        <div class="nota-instructor">
                                            <div class="rating">
                                                <img src="../../Img/Imagenes-landing/etoile_on.svg" alt="">
                                                <b><?php echo $comentario['valoracion']; ?></b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="texto-comentario">
                                    <p><?php echo $comentario['comentario']; ?></p>
                                </div>
                            </div>
                    <?php }
                }
                    ?>

                        </div> <!-- Fin de la sección "Opiniones" y "info-profesor" -->

                        <!-- Botón para ver más comentarios -->
                        <?php if ($comentario_count > 3): ?>

                            <div class="comentarios-footer">
                                <button id="boton-comentarios" class="btn-mostrar-mas" onclick="mostrar();"><b>Mostrar más comentarios</b></button>
                            </div>
                        <?php endif; ?>

                        <script>
                            function mostrar() {
                                var comentarios = document.getElementsByClassName('mas-comentarios');
                                for (var i = 0; i < comentarios.length; i++) {
                                    comentarios[i].style.display = 'block';
                                }
                                document.getElementById('boton-comentarios').style.display = 'none'; // Ocultar el botón una vez que se muestran todos
                            }
                        </script>

                    </div> <!-- Fin del while loop -->

                    <!-- Tarjeta del profesor -->
                    <div class="profile-card">
                        <?php if ($profesor_data): ?>
                            <img src="../../Logica/uploads/<?php echo $profesor_data['imagen_auto']; ?>" alt="" class="cover-pic">
                            <img src="../../Logica/uploads/<?php echo $profesor_data['imagen']; ?>" alt="" class="profile-pic">
                            <h1><?php echo $profesor_data['nombre']; ?></h1>
                            <span>
                                <h4><?php echo $profesor_data['ubicacion']; ?></h4>
                                <div class="rating">
                                    <img src="../../Img/Imagenes-landing/etoile_on.svg" alt="">
                                    <?php echo $promedio ?>
                                    (<a href="#"><?php echo $count ?> comentarios</a>)
                                </div>
                                <hr>
                                <div class="rowCard">
                                    <div>
                                        <p>Clases ejercidas</p>
                                        <h2><?php echo $clasesTotales; ?></h2>
                                    </div>
                                    <div>
                                        <p>Alumnos</p>
                                        <h2><?php echo $alumnosTotales ?></h2>
                                    </div>
                                    <div>
                                        <p>Años de experiencia</p>
                                        <h2><?php echo $profesor_data['experiencia']; ?></h2>
                                    </div>
                                </div>
                                <button class="solicitud-btn" onclick="enviarSolicitud(<?php echo $profesor_data['id_prof']; ?>, '<?php echo $profesor_data['nombre']; ?>', <?php echo $id_alumno; ?>)">
                                    <b>Enviar Solicitud</b>
                                </button>
                            </span>
                        <?php endif; ?>
                    </div>
                    <!-- Fin de la tarjeta del profesor -->






    </section>


    <script>
        function enviarSolicitud(id_user, nombre, id_alumno) {
            Swal.fire({
                title: '¿Estás seguro de que quieres que ' + nombre + ' sea tu instructor?',
                text: 'Se enviará una solicitud en donde el instructor decidira si acepta o rechaza tu petición.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, enviar',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#198754',
                cancelButtonColor: '#adb5bd',
            }).then((result) => {
                if (result.isConfirmed) {
                    var id_profesor = id_user;
                    $.ajax({
                        url: 'php/Enviar-Solicitud.php',
                        type: 'POST',
                        data: {
                            id_profesor: id_profesor,
                            id_alumno: id_alumno
                        },
                        success: function(response) {
                            if (response === 'success') {
                                console.log();
                                Swal.fire({
                                    title: '¡Solicitud enviada!',
                                    text: 'Se te mostrará el resultado de tu solicitud cuando el profesor responda',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    confirmButtonColor: '#25b32c',
                                });
                                setTimeout(function() {
                                    window.location.href = 'Home-Alumno.php';
                                }, 2000);
                            } else if (response === 'curso_no_completado') {
                                console.log();
                                Swal.fire({
                                    title: 'Curso incompleto',
                                    text: 'El curso con este profesor aún no se encuentra finalizado, por favor finalice todas sus clases antes de volver a agendar con este profesor.',
                                    icon: 'error',
                                    confirmButtonText: 'Volver',
                                    confirmButtonColor: '#e74c3c',
                                });
                            } else {
                                console.log();
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Hubo un error al enviar la solicitud',
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

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>