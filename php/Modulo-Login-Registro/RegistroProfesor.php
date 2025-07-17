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

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Fonts Used = "spartan" -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;600&family=PT+Serif:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../Css/RegistroProfesor.css">
    <link rel="shortcut icon" href="../../Img/Logo_velocimetro.png" />

    <title>New Drivers - Crear cuenta</title>
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
                    <h1 class="font-weight-bold mb-3">Envía tu solicitud</h1>

                    <form class="formulario mb-5" id="formulario" enctype="multipart/form-data" method="POST">
                        <div class="scroll p-3">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label font-weight-bold">Nombre Completo</label>
                                <input type="text" name="nombre" class="form-control bg-dark-x border-0" placeholder="Ingresa tu nombre y apellido" aria-describedby="emailHelp" required>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label font-weight-bold">Número de teléfono</label>
                                <input type="number" name="numero" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingresa tu número de teléfono" required oninput="if(this.value.length > 9) this.value = this.value.slice(0,9);">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label font-weight-bold">Fecha de nacimiento</label>
                                <input type="date" name="fechaN" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingresa tu fecha de nacimiento" required>
                            </div>
                            <div class="mb-3">
                                <label for="ubicacion" class="form-label font-weight-bold">Ubicación</label>
                                <input type="text" name="ubicacion" class="form-control bg-dark-x border-0" placeholder="Ingresa tu ubicación" aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label font-weight-bold">Experiencia</label>
                                <input type="text" name="experiencia" class="form-control bg-dark-x border-0" placeholder="Ingresa tus años de experiencia" aria-describedby="emailHelp" required>
                            </div>

                            <!-- Correo electronico Dinamico -->
                            <div class="formulario__grupo mb-3" id="grupo__correo">
                                <label for="correo" class="form-label font-weight-bold">Correo electrónico</label>
                                <div class="formulario__grupo-input">
                                    <input type="email" name="correo" class="formulario__input form-control bg-dark-x border-0 mb-2" placeholder="Ingresa tu correo electrónico" required>
                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                </div>
                                <p class="formulario__input-error">El correo debe contener un @ y finalizar con .com o algún similar.</p>
                            </div>
                            <label for="archivo1" class="form-label font-weight-bold">Licencia de conducir</label>
                            <div class="file">
                                <label for="archivo1" class="form-label font-weight-bold">Seleccionar archivo</label>
                                <h5 id="nombreArchivo1"></h5>
                                <input type="file" name="archivo1" class="" id="archivo1" placeholder="Ingresa tu número de teléfono" required>
                            </div>

                            <label for="archivo2" class="form-label font-weight-bold">Cédula de identidad</label>
                            <div class="file">
                                <label for="archivo2" class="form-label font-weight-bold">Seleccionar archivo</label>
                                <h5 id="nombreArchivo2"></h5>
                                <input type="file" name="archivo2" class="" id="archivo2" placeholder="Ingresa tu Número de teléfono" required>
                            </div>

                            <label for="archivo3" class="form-label font-weight-bold">Hoja de vida del conductor</label>
                            <div class="file">
                                <label for="archivo3" class="form-label font-weight-bold">Seleccionar archivo</label>
                                <h5 id="nombreArchivo3"></h5>
                                <input type="file" name="archivo3" class="" id="archivo3" placeholder="Ingresa tu Número de telefono" required>
                            </div>

                            <label for="archivo4" class="form-label font-weight-bold">Certificado de capacitación</label>
                            <div class="file">
                                <label for="archivo4" class="form-label font-weight-bold">Seleccionar archivo</label>
                                <h5 id="nombreArchivo4"></h5>
                                <input type="file" name="archivo4" class="" id="archivo4" placeholder="Ingresa tu Número de telefono" required>
                            </div>

                            <label for="archivo" class="form-label font-weight-bold">Certificación SEMEP</label>
                            <div class="file">
                                <label for="archivo5" class="form-label font-weight-bold">Seleccionar archivo</label>
                                <h5 id="nombreArchivo5"></h5>
                                <input type="file" name="archivo5" class="" id="archivo5" placeholder="Ingresa tu Número de telefono" required>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label font-weight-bold">Acerca de ti</label>
                                <textarea class="form-control bg-dark-x border-0 mb-2" name="descripcion" aria-label="With textarea" placeholder="Títulos, años de experiencia, métodos de enseñanza, etc. " required></textarea>
                            </div>

                            <!-- Contraseña Dinamica -->
                            <div class="formulario__grupo mb-3" id="grupo__password">
                                <label for="password" class="form-label font-weight-bold">Contraseña</label>
                                <div class="formulario__grupo-input">
                                    <input type="password" name="password" class="formulario__input form-control bg-dark-x border-1 mb-2" placeholder="Ingresa tu contraseña" id="password" required>
                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                </div>
                                <p class="formulario__input-error">La contraseña debe contener al menos 8 caracteres, 1 mayúscula, 1 dígito y 1 carácter especial.</p>

                                <div class="formulario__grupo mb-3" id="grupo__password2">
                                    <label for="password2" class="form-label font-weight-bold">Confirmar Contraseña</label>
                                    <div class="formulario__grupo-input">
                                        <input type="password" name="password2" class="formulario__input form-control bg-dark-x border-1 mb-2" placeholder="Ingresa tu contraseña" id="password2" required>
                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                    </div>
                                    <p class="formulario__input-error">Por favor, asegúrate de que las contraseñas sean idénticas.</p>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mt-4 p-2">Enviar solicitud</button>
                    </form>
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
            $('#formulario').submit(function(e) {
                e.preventDefault(); // Evita que el formulario se envíe de forma tradicional

                // Recopila los datos del formulario
                var formData = new FormData(this);

                // Realiza la solicitud AJAX
                $.ajax({
                    type: 'POST',
                    url: 'php-registro/procesar_archivos.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Maneja la respuesta aquí
                        if (response == "success") {
                            Swal.fire({
                                title: 'Se envió la solicitud',
                                text: ' Se le informará por correo el resultado de su solicitud',
                                icon: 'success',
                                showConfirmButton: false,
                                iconColor: '#FDD45B',
                            });
                            setTimeout(function() {
                                window.location.href = 'Login.php'; // Redirige después de 3 segundos
                            }, 2000);
                        } else if (response == "error_password") {
                            Swal.fire({
                                title: 'Las contraseñas no son iguales',
                                text: ' Intente nuevamente',
                                icon: 'error',
                                confirmButtonText: 'Volver',
                                confirmButtonColor: '#FDD45B'
                            });
                        } else if (response == "error_mail") {
                            Swal.fire({
                                title: 'Este correo ya está registrado',
                                text: 'Por favor, intenta con otro correo electrónico o recupera tu contraseña.',
                                icon: 'error',
                                confirmButtonText: 'Volver',
                                confirmButtonColor: '#FDD45B'
                            });
                        } else {
                            Swal.fire({
                                title: 'No se pudo registrar correctamente',
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
    <!-- Validar Password -->
    <script src="../../Js/formulario.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>