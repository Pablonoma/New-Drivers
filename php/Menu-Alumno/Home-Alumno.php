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

    <link rel="stylesheet" href="../../Css/Menu-Alumno.css">
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
            <a href="Home-Alumno.php" style="color: #FDD45B;">
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
                <a href="Clases-Extras.php">
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
            Escoge a tu profesor
        </h3>



        <div class="values">
            <?php
            $sql = "SELECT id_user,
            nombre,
            ubicacion,
            imagen,
            permisos,
            estado,
            experiencia,
            descripcion_prof,
            descripcion_clase,
            aprobado,
            imagen_auto,
            id_prof
            FROM usuario
            INNER JOIN profesor ON usuario.id_user = profesor.fk_usuario_id 
            INNER JOIN vehiculo ON profesor.id_prof = vehiculo.fk_profesor_id
            WHERE permisos = 2 AND aprobado = 2
            GROUP BY usuario.id_user;";
            $result = mysqli_query($conn, $sql);
            while ($usuario = mysqli_fetch_array($result)) {


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

                <div class="profile-card">
                    <img src="../../Logica/uploads/<?php echo  $usuario['imagen_auto']; ?>" alt="" class="cover-pic">
                    <img src="../../Logica/uploads/<?php echo $usuario['imagen']; ?>" alt="" class="profile-pic">
                    <h1><?php echo $usuario['nombre']; ?></h1>
                    <span>

                        <h4><?php echo $usuario['ubicacion']; ?></h4>
                        <div class="rating">
                            <img src="../../Img/Imagenes-landing/etoile_on.svg" alt="">
                            <?php echo $promedio ?>
                            (<a href="#"><?php echo $count; ?> comentarios</a>)
                        </div>

                        <p class="info"><?php echo $usuario['descripcion_prof']; ?></p>

                        <hr>

                        <div class="rowCard">
                            <div>
                                <p>Clases ejercidas</p>
                                <h2><?php echo $clasesTotales; ?></h2>
                            </div>
                            <hr>
                            <div>
                                <p>Alumnos</p>
                                <h2><?php echo $alumnosTotales ?></h2>
                            </div>
                            <hr>
                            <div>
                                <p>Años de experiencia</p>
                                <h2><?php echo $usuario['experiencia']; ?></h2>
                            </div>
                        </div>
                        <a href="Profesor-Info.php?id_user=<?php echo $usuario['id_user']; ?>" class="view-btn">Contratar</a>

                </div>

            <?php } ?>
<!-- 
            <div class="profile-card">
                <img src="../../Img/Imagenes-landing/1366_2000.jpg" alt="" class="cover-pic">
                <img src="../../Img/Imagenes-landing/victoriaSkinRubiaRecortada.jpg" alt="" class="profile-pic">
                <h1>Victoria Jamett</h1>
                <span>

                    <h4>Iquique, Av. La Tirana</h4>
                    <div class="rating">
                        <img src="../../Img/Imagenes-landing/etoile_on.svg" alt="">
                        4.7
                        (<a href="#">27 opiniones</a>)
                    </div>

                    <p class="info">Instructora de conducción apasionada, comprometida a enseñar a conducir de manera segura y confiada. Con más de una década de
                        experiencia en la industria automovilística, me especializo en adaptar mis lecciones a las necesidades individuales de cada estudiante,
                        asegurando así un aprendizaje efectivo y personalizado. Más allá de simplemente enseñar las reglas básicas de manejo,
                        me dedico a cultivar habilidades prácticas
                        y actitudes responsables en mis alumnos, preparándolos para enfrentar cualquier desafío en la carretera con confianza y destreza.</p>

                    <hr>

                    <div class="rowCard">
                        <div>
                            <p>Clases ejercidas</p>
                            <h2>34</h2>
                        </div>
                        <hr>
                        <div>
                            <p>Alumnos</p>
                            <h2>12</h2>
                        </div>
                        <hr>
                        <div>
                            <p>Años de experiencia</p>
                            <h2>10</h2>
                        </div>
                    </div>
                    <a href="#" class="view-btn">Contratar</a>
            </div>

            <div class="profile-card">
                <img src="../../Img/Imagenes-landing/citycar-2.jpeg" alt="" class="cover-pic">
                <img src="../../Img/Imagenes-landing/customer-1.jpg" alt="" class="profile-pic">
                <h1>Ramiro Perez</h1>
                <span>

                    <h4>Rocha</h4>
                    <div class="rating">
                        <img src="../../Img/Imagenes-landing/etoile_on.svg" alt="">
                        4.7
                        (<a href="#">27 opiniones</a>)
                    </div>

                    <p class="info">Soy estudiante de magíster en Ingeniería Civil Matemática y Computación de la Universidad de
                        Chile, ymo desarrollador de software mientras mo desarrollador de software mientras
                        también trabajo como desarrollador de software mientras preparo mi de software mientras preparo mi tesis.
                        Soy estudiante de magíster en Ingeniería Civil Matemática y Computación de la Universidad de
                        Chile, ymo desarrollador de software mientras mo desarrollador de software mientras
                        también trabajo como desarrollador de software mientras preparo mi de software mientras preparo mi tesis.</p>
                    <hr>

                    <div class="rowCard">
                        <div>
                            <p>Clases ejercidas</p>
                            <h2>34</h2>
                        </div>
                        <hr>
                        <div>
                            <p>Alumnos</p>
                            <h2>12</h2>
                        </div>
                        <hr>
                        <div>
                            <p>Años de experiencia</p>
                            <h2>6</h2>
                        </div>
                    </div>
                    <a href="#" class="view-btn">Contratar</a>
            </div>

 -->
        </div>
        <!-- <div class="profile-card">
                        <img src="../../Img/Imagenes-landing/car-3.jpg" alt="" class="cover-pic">
                        <img src="../../Img/Imagenes-landing/customer-3.jpg" alt="" class="profile-pic">
                        <h1>Maikol Sanchez</h1>
                        <span>

                            <h4>Pataguacerro, Baquedano</h4>
                            <div class="rating">
                                <img src="../../Img/Imagenes-landing/etoile_on.svg" alt="">
                                4.7
                                (<a href="#">27 opiniones</a>)
                            </div>

                            <p class="info">Soy estudiante de magíster en Ingeniería Civil Matemática y Computación de la Universidad de
                                Chile, ymo desarrollador de software mientras mo desarrollador de software mientras
                                también trabajo como desarrollador de software mientras preparo mi de software mientras preparo mi tesis.
                                Soy estudiante de magíster en Ingeniería Civil Matemática y Computación de la Universidad de
                                Chile, ymo desarrollador de software mientras mo desarrollador de software mientras
                                también trabajo como desarrollador de software mientras preparo mi de software mientras preparo mi tesis.</p>

                            <hr>

                            <div class="rowCard">
                                <div>
                                    <p>Clases ejercidas</p>
                                    <h2>34</h2>
                                </div>
                                <hr>
                                <div>
                                    <p>Alumnos</p>
                                    <h2>12</h2>
                                </div>
                                <hr>
                                <div>
                                    <p>Años de experiencia</p>
                                    <h2>6</h2>
                                </div>
                            </div>
                            <a href="#" class="view-btn">Contratar</a>
                    </div> -->
    </section>

    <script>
        $(document).ready(function() {
            // Selecciona todas las tarjetas con clase profile-card
            $('.profile-card').each(function() {
                // Obtiene el elemento con la clase info dentro de cada tarjeta
                var infoElement = $(this).find('.info');

                // Verifica si el contenido de texto es más largo que 120 caracteres
                if (infoElement.text().length > 275) {
                    // Trunca el texto y agrega tres puntos suspensivos
                    var truncatedText = infoElement.text().substring(0, 275) + '...';

                    // Establece el nuevo texto truncado en la tarjeta
                    infoElement.text(truncatedText);
                }
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