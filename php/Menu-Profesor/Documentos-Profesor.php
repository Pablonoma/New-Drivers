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
require('../../Logica/DAO/Profesor/DAO-Profesor.php');
$dao = new DAO();

$datosProfesor = $dao->buscarProfesorPorId($_SESSION['id_profe']);
$experiencia = $datosProfesor[0];
$licencia = $datosProfesor[1];
$cedula = $datosProfesor[2];
$hojaDeVida = $datosProfesor[3];
$capacitacion = $datosProfesor[4];
$semep = $datosProfesor[5];
$descripcion_prof = $datosProfesor[6];
$descripcion_clase = $datosProfesor[7];
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

    <link rel="stylesheet" href="../../Css/Documentos-Profesor.css">
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
    <script>
        function filePreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var previewContainer = $('.selected-file-preview');
                    previewContainer.html('<p style="margin-bottom: 10px;">Vista Previa de la Imagen de Perfil:</p>'); // Agrega el texto
                    previewContainer.append('<img src="' + e.target.result + '" style="border-radius: 50%; object-fit: cover; height: 200px; width: 200px;"/>'); // Agregar por si solicita el style="max-height: 550px;" por la altura de la imagen en la Pre-Visualización
                    $('#foto').hide();
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
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
            <a href="Documentos-Profesor.php" style="color: #FDD45B;">
                <li><i class="fa-solid fa-file-lines" style="color: #FDD45B;"></i>Mis documentos</li>
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
            Mis documentos de New Drivers
        </h3>



        <div class="values">

            <div class="container p-4 mt-2">
                <h1 class="font-weight-bold mb-3 text-center">Documentos Profesor</h1>
                <hr>
                <div class="row g-3">
                    <!-- Lado Izquierdo - Foto del Usuario -->
                    <div class="col-md-4 text-center">
                        <div class="foto-perfil d-flex flex-column align-items-center mt-5">
                            <div class="mb-3 w-50 mt-4">
                                <div class="selected-file-preview"></div>
                                <img src="../../Logica/uploads/<?php echo $_SESSION['imagen']; ?>" alt="Foto de usuario" id="foto" class="rounded-circle" style="width: 200px; height: 200px;">
                            </div>


                        </div>
                    </div>
                    <!-- Línea Vertical que Separa las Partes del Formulario -->
                    <div class="col-md-1 d-flex justify-content-center">
                        <div class="vl bg-warning"></div>
                    </div>
                    <!-- Lado Derecho - Inputs -->
                    <div class="col-md-7">
                        <div class="scroll p-3">
                            <div class="row g-3">
                                <input type="hidden" name="id" value="<?php echo $_SESSION['id_user']; ?>">
                                <label for="archivo1" class="form-label font-weight-bold">Licencia de conducir (archivo actual: <?php echo $licencia ?>)</label>
                                <form action="" id="licencia" method="POST" enctype="multipart/form-data">
                                    <div class="d-flex justify-content-center" style="width: 100%;">

                                        <div style="width: 160%;">
                                            <div class="file">
                                                <label for="archivo1" class="form-label font-weight-bold">Seleccionar archivo</label>
                                                <h5 id="nombreArchivo1"></h5>
                                                <input type="file" name="archivo1" class="" id="archivo1" placeholder="Ingresa tu Número de teléfono">
                                            </div>
                                        </div>
                                        <div style="width: 20%;">
                                            <button type="submit" class="btn btn-primary m-2">Guardar</button>
                                        </div>
                                    </div>

                                </form>

                                <label for="archivo2" class="form-label font-weight-bold">Cédula de identidad (archivo actual: <?php echo $cedula ?>)</label>
                                <form action="" id="cedula" method="POST" enctype="multipart/form-data">
                                    <div class="d-flex justify-content-center" style="width: 100%;">

                                        <div style="width: 160%;">
                                            <div class="file">
                                                <label for="archivo2" class="form-label font-weight-bold">Seleccionar archivo</label>
                                                <h5 id="nombreArchivo2"></h5>
                                                <input type="file" name="archivo2" class="" id="archivo2" placeholder="Ingresa tu Número de teléfono">
                                            </div>
                                        </div>
                                        <div style="width: 20%;">
                                            <button type="submit" class="btn btn-primary m-2">Guardar</button>
                                        </div>
                                    </div>

                                </form>

                                <label for="archivo3" class="form-label font-weight-bold">Hoja de vida del conductor (archivo actual: <?php echo $hojaDeVida ?>)</label>
                                <form action="" id="hojaVida" method="POST" enctype="multipart/form-data">
                                    <div class="d-flex justify-content-center" style="width: 100%;">

                                        <div style="width: 160%;">
                                            <div class="file">
                                                <label for="archivo3" class="form-label font-weight-bold">Seleccionar archivo</label>
                                                <h5 id="nombreArchivo3"></h5>
                                                <input type="file" name="archivo3" class="" id="archivo3" placeholder="Ingresa tu Número de teléfono">
                                            </div>
                                        </div>
                                        <div style="width: 20%;">
                                            <button type="submit" class="btn btn-primary m-2">Guardar</button>
                                        </div>
                                    </div>

                                </form>



                                <label for="archivo4" class="form-label font-weight-bold">Certificado de capacitación (archivo actual: <?php echo $capacitacion ?>)</label>
                                <form action="" id="capacitacion" method="POST" enctype="multipart/form-data">
                                    <div class="d-flex justify-content-center" style="width: 100%;">

                                        <div style="width: 160%;">
                                            <div class="file">
                                                <label for="archivo4" class="form-label font-weight-bold">Seleccionar archivo</label>
                                                <h5 id="nombreArchivo4"></h5>
                                                <input type="file" name="archivo4" class="" id="archivo4" placeholder="Ingresa tu Número de teléfono">
                                            </div>
                                        </div>
                                        <div style="width: 20%;">
                                            <button type="submit" class="btn btn-primary m-2">Guardar</button>
                                        </div>
                                    </div>

                                </form>

                                <label for="archivo" class="form-label font-weight-bold">Certificación SEMEP (archivo actual: <?php echo $semep ?>)</label>
                                <form action="" id="semep" method="POST" enctype="multipart/form-data">
                                    <div class="d-flex justify-content-center" style="width: 100%;">

                                        <div style="width: 160%;">
                                            <div class="file">
                                                <label for="archivo5" class="form-label font-weight-bold">Seleccionar archivo</label>
                                                <h5 id="nombreArchivo5"></h5>
                                                <input type="file" name="archivo5" class="" id="archivo5" placeholder="Ingresa tu Número de teléfono">
                                            </div>
                                        </div>
                                        <div style="width: 20%;">
                                            <button type="submit" class="btn btn-primary m-2">Guardar</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>


    </section>

    <script type="text/javascript">
        document.querySelectorAll('input[type="file"]').forEach((archivoInput, index) => {
            archivoInput.addEventListener('change', () => {
                const nombreArchivoH5 = document.querySelector('#nombreArchivo' + (index + 1));
                nombreArchivoH5.innerText = archivoInput.files[0].name;
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#licencia').submit(function(e) {
                e.preventDefault(); // Evita que el formulario se envíe de forma tradicional

                // Recopila los datos del formulario
                var formData = new FormData(this);

                // Realiza la solicitud AJAX
                $.ajax({
                    type: 'POST',
                    url: 'php-profesor/procesar_documento.php?flag=licencia',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Maneja la respuesta aquí
                        if (response == "success") {
                            Swal.fire({
                                title: 'Se actualizó la licencia de conducir',
                                text: ' El cambio se mostrará en sus documentos',
                                icon: 'success',
                                showConfirmButton: false,
                                iconColor: '#FDD45B',
                            });
                            setTimeout(function() {
                                window.location.href = 'Documentos-profesor.php'; // Redirige después de 3 segundos
                            }, 2000);
                        } else {
                            Swal.fire({
                                title: 'No se pudo procesar correctamente',
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

<script>
        $(document).ready(function() {
            $('#cedula').submit(function(e) {
                e.preventDefault(); // Evita que el formulario se envíe de forma tradicional

                // Recopila los datos del formulario
                var formData = new FormData(this);

                // Realiza la solicitud AJAX
                $.ajax({
                    type: 'POST',
                    url: 'php-profesor/procesar_documento.php?flag=cedula',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Maneja la respuesta aquí
                        if (response == "success") {
                            Swal.fire({
                                title: 'Se actualizó cédula',
                                text: ' El cambio se mostrará en sus documentos',
                                icon: 'success',
                                showConfirmButton: false,
                                iconColor: '#FDD45B',
                            });
                            setTimeout(function() {
                                window.location.href = 'Documentos-profesor.php'; // Redirige después de 3 segundos
                            }, 2000);
                        } else {
                            Swal.fire({
                                title: 'No se pudo procesar correctamente',
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

<script>
        $(document).ready(function() {
            $('#hojaVida').submit(function(e) {
                e.preventDefault(); // Evita que el formulario se envíe de forma tradicional

                // Recopila los datos del formulario
                var formData = new FormData(this);

                // Realiza la solicitud AJAX
                $.ajax({
                    type: 'POST',
                    url: 'php-profesor/procesar_documento.php?flag=hojaVida',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Maneja la respuesta aquí
                        if (response == "success") {
                            Swal.fire({
                                title: 'Se actualizó la hoja de vida',
                                text: ' El cambio se mostrará en sus documentos',
                                icon: 'success',
                                showConfirmButton: false,
                                iconColor: '#FDD45B',
                            });
                            setTimeout(function() {
                                window.location.href = 'Documentos-profesor.php'; // Redirige después de 3 segundos
                            }, 2000);
                        } else {
                            Swal.fire({
                                title: 'No se pudo procesar correctamente',
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

<script>
        $(document).ready(function() {
            $('#capacitacion').submit(function(e) {
                e.preventDefault(); // Evita que el formulario se envíe de forma tradicional

                // Recopila los datos del formulario
                var formData = new FormData(this);

                // Realiza la solicitud AJAX
                $.ajax({
                    type: 'POST',
                    url: 'php-profesor/procesar_documento.php?flag=capacitacion',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Maneja la respuesta aquí
                        if (response == "success") {
                            Swal.fire({
                                title: 'Se actualizó la certificación de su capacitación',
                                text: ' El cambio se mostrará en sus documentos',
                                icon: 'success',
                                showConfirmButton: false,
                                iconColor: '#FDD45B',
                            });
                            setTimeout(function() {
                                window.location.href = 'Documentos-profesor.php'; // Redirige después de 3 segundos
                            }, 2000);
                        } else {
                            Swal.fire({
                                title: 'No se pudo procesar correctamente',
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

<script>
        $(document).ready(function() {
            $('#semep').submit(function(e) {
                e.preventDefault(); // Evita que el formulario se envíe de forma tradicional

                // Recopila los datos del formulario
                var formData = new FormData(this);

                // Realiza la solicitud AJAX
                $.ajax({
                    type: 'POST',
                    url: 'php-profesor/procesar_documento.php?flag=semep',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Maneja la respuesta aquí
                        if (response == "success") {
                            Swal.fire({
                                title: 'Se actualizó la certificación semep',
                                text: ' El cambio se mostrará en sus documentos',
                                icon: 'success',
                                showConfirmButton: false,
                                iconColor: '#FDD45B',
                            });
                            setTimeout(function() {
                                window.location.href = 'Documentos-profesor.php'; // Redirige después de 3 segundos
                            }, 2000);
                        } else {
                            Swal.fire({
                                title: 'No se pudo procesar correctamente',
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