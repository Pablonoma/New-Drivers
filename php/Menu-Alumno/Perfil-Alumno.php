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

    <link rel="stylesheet" href="../../Css/Perfil-Alumno.css">
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
            <a href="Perfil-Alumno.php" style="color: #FDD45B;">
                <li><i class="fa-solid fa-user" style="color: #FDD45B;"></i>Mi perfil</li>
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
            Tú perfil
        </h3>



        <div class="values">
            <div class="container p-4 mt-2">
                <h1 class="font-weight-bold mb-3 text-center">Información Personal</h1>
                <hr>
                <form id="editProfileForm" method="POST" enctype="multipart/form-data">
                    <div class="row g-3">
                        <!-- Lado Izquierdo - Foto del Usuario -->
                        <div class="col-md-4 text-center">
                            <div class="foto-perfil d-flex flex-column align-items-center mt-5">
                                <div class="mb-3 w-50">
                                    <div class="selected-file-preview"></div>
                                    <img src="../../Logica/uploads/<?php echo $_SESSION['imagen']; ?>" alt="Foto de usuario" id="foto" class="rounded-circle" style="width: 200px; height: 200px;">
                                </div>
                                <input type="file" name="file" id="file-upload" accept="image/*" class="box">


                            </div>
                        </div>
                        <!-- Línea Vertical que Separa las Partes del Formulario -->
                        <div class="col-md-1 d-flex justify-content-center">
                            <div class="vl bg-warning"></div>
                        </div>
                        <!-- Lado Derecho - Inputs -->
                        <div class="col-md-7">
                            <div class="row g-3">
                                <input type="hidden" name="id" value="<?php echo $_SESSION['id_user']; ?>">
                                <div class="col-md-6">
                                    <label for="nombre" class="form-label">Nombre y apellido</label>
                                    <input type="text" class="form-control bg-dark-x border-0 mb-2" name="nombre" id="nombre" value="<?php echo $_SESSION['nombre'] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="number" class="form-control bg-dark-x border-0 mb-2" name="telefono" id="telefono" value="<?php echo $_SESSION['telefono'] ?>" oninput="if(this.value.length > 9) this.value = this.value.slice(0,9);">
                                </div>
                                <div class="col-md-6">
                                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control bg-dark-x border-0 mb-2" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $_SESSION['fecha_nacimiento'] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="correo" class="form-label">Correo</label>
                                    <input type="email" class="form-control bg-dark-x border-0 mb-2" name="correo" id="correo" value="<?php echo $_SESSION['correo'] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="ubicacion" class="form-label">Ubicación</label>
                                    <input type="text" class="form-control bg-dark-x border-0 mb-2" name="ubicacion" id="ubicacion" value="<?php echo $_SESSION['ubicacion'] ?>">
                                </div>
                                <div class="col-md-12">
                                    <label for="exampleInputPassword1" class="form-label font-weight-bold">Acerca de ti</label>
                                    <textarea class="form-control bg-dark-x border-0 mb-2" name="descripcion" aria-label="With textarea" placeholder="Títulos, años de experiencia, métodos de enseñanza, etc. " required><?php echo $_SESSION['descripcion_alum'] ?></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" name="submit" class="btn btn-primary w-100 mt-4 p-2">Guardar Cambios</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>


    </section>


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

    <script>
        $(document).ready(function() {
            $("#file-upload").change(function() {
                filePreview(this);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Selecciona todas las tarjetas con clase profile-card
            $('.profile-card').each(function() {
                // Obtiene el elemento con la clase info dentro de cada tarjeta
                var infoElement = $(this).find('.info');

                // Verifica si el contenido de texto es más largo que 120 caracteres
                if (infoElement.text().length > 320) {
                    // Trunca el texto y agrega tres puntos suspensivos
                    var truncatedText = infoElement.text().substring(0, 320) + '...';

                    // Establece el nuevo texto truncado en la tarjeta
                    infoElement.text(truncatedText);
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#editProfileForm').submit(function(e) {
                e.preventDefault(); // Evita que el formulario se envíe de forma tradicional

                // Recopila los datos del formulario
                var formData = new FormData(this);

                // Realiza la solicitud AJAX
                $.ajax({
                    type: 'POST',
                    url: 'php/Perfil-Funcion.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Maneja la respuesta aquí
                        if (response == "success") {
                            Swal.fire({
                                title: 'Modificación Exitosa.',
                                text: 'Modificaste tu perfil correctamente.',
                                icon: 'success',
                                showConfirmButton: false,
                            });
                            setTimeout(function() {
                                window.location.href = 'Perfil-Alumno.php';
                            }, 2000);
                        } else {
                            console.log("Error en la solicitud AJAX:", response);
                            Swal.fire({
                                title: 'No se pudo modificar su perfil correctamente',
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