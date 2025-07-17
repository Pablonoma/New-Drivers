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

    <link rel="stylesheet" href="../../Css/Vehiculo-Profesor.css">
    <link rel="shortcut icon" href="../../Img/logo New Drivers.jpg" />

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- DataTables  -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">



    <title>Menu - Administrador</title>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Obtener el elemento de input de tipo file
            const fileInput = document.getElementById("file-upload");

            // Obtener el contenedor y crear elementos adicionales
            const container = document.createElement("div");
            container.classList.add("box-container");

            const customButton = document.createElement("label");
            customButton.setAttribute("for", "file-upload");
            customButton.classList.add("custom-upload-button");
            customButton.innerHTML = '<span class="custom-upload-button-label"></span><span class="selected-file-name" >Seleccionar Imagen</span>';

            // Insertar los elementos personalizados en el DOM
            fileInput.parentNode.insertBefore(container, fileInput);
            container.appendChild(fileInput);
            container.appendChild(customButton);

            // Actualizar el nombre del archivo seleccionado
            fileInput.addEventListener("change", function() {
                const fileName = this.files[0] ? this.files[0].name : "Ningún archivo seleccionado";
                document.querySelector(".selected-file-name").textContent = fileName;
            });

        });
    </script>

</head>

<body>


<section id="menu">
        <div class="logo">
            <img src="../../Img/Logo_velocimetro.png">
            <h2>New Drivers</h2>
        </div>

        <div class="items">
            <a href="Vehiculo-Profesor.php" style="color: #FDD45B;">
                <li><i class="fa-solid fa-car" style="color: #FDD45B;"></i>Mi vehículo</li>
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
            <a href="Alumnos-Profesor.php">
                <li><i class="fa-solid fa-users"></i>Mis Alumnos</li>
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

        <h3 class="i-name">
            Mis Vehículos Registrados
        </h3>



        <div class="values">

            <div class="py-3" id="vehiculo-container">
                <div class="container">
                    <div class="row bg-dark animate-in-down">
                        <div class="p-4 col-md-6 align-self-center text-color">
                            <h1>Ingresa tus vehiculos</h1>
                            <p class="my-4">En esta sección, puedes registrar los vehículos que utilizarás en tus clases. Ten en cuenta que puedes agregar un máximo de tres vehículos.
                                Cada vehículo que registres estará asociado a todas tus clases que realices con este, y tendrás la opción de eliminarlos en caso de que ya no los dispongas.
                            </p>
                        </div>
                        <div class="p-0 col-md-6">
                            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="../../Img/Imagenes-landing/autoAzulDelante.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="../../Img/Imagenes-landing/autoAzulDetras.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="../../Img/Imagenes-landing/autoLlaves.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Agregar Vehiculo -->
            <script>
                $(document).ready(function() {
                    $('#formulario').submit(function(e) {
                        e.preventDefault(); // Evita que el formulario se envíe de forma tradicional

                        // Recopila los datos del formulario
                        var formData = new FormData(this);

                        // Realiza la solicitud AJAX
                        $.ajax({
                            type: 'POST',
                            url: 'php-profesor/ajax_registrar_vehiculo.php',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                // Maneja la respuesta aquí
                                if (response == "success") {
                                    Swal.fire({
                                        title: 'Se agrego el vehículo correctamente.',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        iconColor: '#FDD45B',
                                    });
                                    setTimeout(function() {
                                        window.location.href = 'Vehiculo-Profesor.php'; // Redirige después de 3 segundos
                                    }, 2000);
                                    console.log(response)
                                } else {
                                    console.log(response)
                                    Swal.fire({
                                        title: 'No se pudo registrar el vehículo correctamente',
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

            <article>
                <!-- - Mis Vehiculos -->
                <section class="section featured-car" id="featured-car">
                    <div class="container">
                        <ul class="featured-car-list">
                            <?php
                            $id_session = $_SESSION['id_user'];
                            $sql_id = "SELECT id_prof AS id FROM profesor WHERE fk_usuario_id = $id_session";
                            $resulta = mysqli_query($conn, $sql_id);
                            $row = mysqli_fetch_assoc($resulta);
                            $id_profe = $row['id'];
                            $sql = "SELECT id_auto, patente, transmision, combustible, personas, modelo, ano, doble_comando, imagen_auto, estado_auto FROM vehiculo WHERE fk_profesor_id = $id_profe AND estado_auto = 1";
                            $result = mysqli_query($conn, $sql);

                            // Obtener el número de resultados
                            $num_results = mysqli_num_rows($result);

                            // Definir el número máximo de tarjetas de "espacio no disponible"
                            $max_cards = 3;

                            // Mostrar un máximo de 3 tarjetas
                            for ($i = 0; $i < min($num_results, $max_cards); $i++) {
                                $vehiculo = mysqli_fetch_array($result);
                            ?>
                                <li>
                                    <div class="featured-car-card">
                                        <figure class="card-banner">
                                            <img src="../../Logica/uploads/<?php echo $vehiculo['imagen_auto'] ?>" alt="<?php echo $vehiculo['modelo'] ?>" loading="lazy" width="440" height="300" class="w-100">
                                        </figure>
                                        <div class="card-content">
                                            <div class="card-title-wrapper">
                                                <h3 class="h3 card-title">
                                                    <?php echo $vehiculo['modelo'] ?>
                                                </h3>
                                                <data class="year" value="<?php echo $vehiculo['ano'] ?>"><?php echo $vehiculo['ano'] ?></data>
                                            </div>
                                            <ul class="card-list">
                                                <li class="card-list-item">
                                                    <ion-icon name="people-outline"></ion-icon>
                                                    <span class="card-item-text"><?php echo $vehiculo['personas'] ?> personas</span>
                                                </li>
                                                <li class="card-list-item">
                                                    <ion-icon name="flash-outline"></ion-icon>
                                                    <span class="card-item-text"><?php echo $vehiculo['combustible'] ?></span>
                                                </li>
                                                <li class="card-list-item">
                                                    <ion-icon name="speedometer-outline"></ion-icon>
                                                    <?php if ($vehiculo['doble_comando'] == 1) { ?>
                                                        <span class="card-item-text">Doble Comando</span>
                                                    <?php } elseif ($vehiculo['doble_comando'] == 0) { ?>
                                                        <span class="card-item-text">Sin Doble Comando</span>
                                                    <?php } ?>
                                                </li>
                                                <li class="card-list-item">
                                                    <ion-icon name="hardware-chip-outline"></ion-icon>
                                                    <span class="card-item-text"><?php echo $vehiculo['transmision'] ?></span>
                                                </li>
                                            </ul>
                                            <div class="card-price-wrapper">
                                                <p class="card-price">
                                                    <strong><?php echo $vehiculo['patente'] ?></strong>
                                                </p>
                                                <button class="btn fav-btn" onclick="deshabilitar (<?php echo $vehiculo['id_auto']; ?>)">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                                <button class="btn editar-btn" data-bs-toggle="modal" data-bs-target="#editarVehiculo<?php echo $vehiculo['id_auto']; ?>">Editar</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php include('modal/editar-Vehiculo.php'); ?>
                                </li>
                            <?php
                            }

                            // Mostrar tarjetas de "espacio no disponible" si es necesario
                            for ($i = 0; $i < ($max_cards - $num_results); $i++) {
                            ?>
                                <li>
                                    <div class="featured-car-card">
                                        <figure class="card-banner">
                                            <img src="../../Img/autoDibujo.png" alt="Volkswagen T-Cross 2020" loading="lazy" width="440" height="300" class="w-100">
                                        </figure>
                                        <div class="card-content">
                                            <div class="card-title-wrapper">
                                                <h3 class="h3 card-title">
                                                    Espacio disponible
                                                </h3>
                                                <data class="year" value="2020">Año</data>
                                            </div>
                                            <ul class="card-list">
                                                <li class="card-list-item">
                                                    <ion-icon name="people-outline"></ion-icon>
                                                    <span class="card-item-text">Personas</span>
                                                </li>
                                                <li class="card-list-item">
                                                    <ion-icon name="flash-outline"></ion-icon>
                                                    <span class="card-item-text">Combustible</span>
                                                </li>
                                                <li class="card-list-item">
                                                    <ion-icon name="speedometer-outline"></ion-icon>
                                                    <span class="card-item-text">Doble Comando</span>
                                                </li>
                                                <li class="card-list-item">
                                                    <ion-icon name="hardware-chip-outline"></ion-icon>
                                                    <span class="card-item-text">Transmisión</span>
                                                </li>
                                            </ul>
                                            <div class="card-price-wrapper">
                                                <p class="card-price">
                                                    <strong>Patente</strong>
                                                </p>
                                                <button class="btn agregar-btn" name="agregar" data-bs-toggle="modal" data-bs-target="#addVehiculo">Agregar Vehículo</button>
                                            </div>
                                            <?php include('modal/Agregar-Vehiculo.php'); ?>
                                        </div>
                                    </div>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </section>
            </article>


            

        </div>




    </section>

    <?php
    require('../../Logica/DAO/Profesor/DAO-Profesor.php');
    $dao = new DAO();
    if (isset($_POST['editar'])) {
        if (!empty($_POST['id_auto'])) {
            $modelo = $_POST['modelo'];
            $ano = $_POST['ano'];
            $personas = $_POST['personas'];
            $combustible = $_POST['combustible'];
            $doble_comando = $_POST['doble_comando'];
            $transmision = $_POST['transmision'];
            $patente = $_POST['patente'];
            $id_auto = $_POST['id_auto'];

            $resultado = $dao->editarVehiculo($modelo, $ano, $personas, $combustible, $doble_comando, $transmision, $patente,$id_auto);
            if ($resultado == true) {
                echo "<script>
                    Swal.fire({
                    title: 'Vehículo modificado',
                    text: 'Se modifico el vehículo correctamente',
                    icon: 'success',
                    allowOutsideClick: false,
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#25b32c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Vehiculo-Profesor.php';
                    }
                    });
                </script>";
            } else {
                echo "<script>
                    Swal.fire({
                    title: 'Hubo un problema',
                    text: 'No se pudo modificar el vehículo',
                    icon: 'error',
                    allowOutsideClick: false,
                    confirmButtonText: 'Volver',
                    confirmButtonColor: '#e74c3c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Vehiculo-Profesor.php';
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
        function deshabilitar(id_auto) {
            Swal.fire({
                title: '¿Estás seguro en que quieres eliminar el vehículo?',
                text: 'Quedaras sin la posibilidad ver este vehículo',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, deshabilitar',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#198754',
                cancelButtonColor: '#adb5bd',
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = id_auto;
                    var estado = 'deshabilitar';
                    $.ajax({
                        url: 'php-profesor/deshabilitar-vehiculo.php',
                        type: 'POST',
                        data: {
                            id_auto,
                            estado
                        },
                        success: function(response) {
                            if (response === 'success') {
                                Swal.fire({
                                    title: 'vehículo eliminado',
                                    text: 'El vehículo se ha eliminado correctamente',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    confirmButtonColor: '#861d1d',
                                });
                                setTimeout(function() {
                                    window.location.href = 'Vehiculo-profesor.php';
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

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>