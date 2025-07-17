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

include('../../Logica/DAO/Profesor/DAO-Profesor.php');

$dao = new DAO();

$id_profesor = intval($_SESSION['id_profe']);

$vehiculos = $dao->getVehiculos($id_profesor);

$vehiculos2 = $dao->getVehiculos($id_profesor);

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

    <link rel="stylesheet" href="../../Css/Clases-Profesor.css">
    <link rel="shortcut icon" href="../../Img/logo New Drivers.jpg" />

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- FullCaledar -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales-all.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>



    <title>Menu - Profesor</title>

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
            <a href="Clases-Practicas-Profesor.php" style="color: #FDD45B;">
                <li><i class="fa-solid fa-car" style="color: #FDD45B;"></i>Clases Prácticas</li>
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





        <div class="values">
            <!-- Body Inicio  -->
            <br><br><br>
            <h1 class="heading">Calendario de Clases</h1><br>
            <div class="calendario" id='calendar'></div>
            <!-- Body FINAL  -->
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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <!-- MODAL -->
    <div class="modal" id="eventoModal" tabindex="-1" data-bs-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #303f9f !important; border-color: #303f9f; margin-top: -15px; margin-bottom: -10px;">
                    <h5 class="modal-title" style="color: #fff; text-align: center; font-size: 18px; margin-top: -10px;">
                        Agendar Nueva Clase</h5>
                </div>
                <div class="modal-body" id="bod">
                    <form>
                        <div class="form-group">
                            <label for="titulo">Clase</label>
                            <input type="text" class="form-control" id="titulo" style="color: #000000;" autocomplete="off" placeholder="Ingrese un título para agendar la clase">
                        </div>
                        <div class="form-group" style="margin-top:5px;">
                            <label for="detalle">Descripción</label>
                            <textarea class="form-control" id="descripcion" style="color: #000000;" rows="3" placeholder="Ingrese la Descripción"></textarea>
                        </div>
                        <select class="form-select mb-3 mt-3" id="select_vehiculo" required="true" name="respuesta">
                            <option selected disabled>Seleccionar Vehículo</option>

                            <?php

                            // Iteramos sobre los resultados y generamos las opciones del selector
                            while ($vehiculo = $vehiculos->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $vehiculo['id_auto']; ?>">
                                    <?php echo $vehiculo['modelo']; ?>
                                </option>
                            <?php
                            }
                            ?>

                        </select>
                        <div class="form-group" style="margin-top:5px;">
                            <div class="row">
                                <div class="col">
                                    <label for="fechaHora">Fecha de inicio</label>
                                    <input type="datetime-local" class="form-control" style="color: #000000;" id="comienzo" placeholder="Ingrese la fecha y hora de inicio de la clase">
                                </div>
                                <div class="col">
                                    <label for="duracion">Fecha de termino</label>
                                    <input type="datetime-local" class="form-control" style="color: #000000;" id="termino" placeholder="Ingrese la duración">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" id="mod_fot" style="display: flex; justify-content: end;">
                    <button type="button" class="btn btn-primary" style="width: 24%;" id="guardarEvento">Agregar</button>
                    <button type="button" class="btn btn-secondary" style="width: 24%;" data-dismiss="modal" id="cerrar">Cerrar</button>
                </div>

            </div>
        </div>
    </div>

    <!-- MODAL EDITAR-->
    <div class="modal" id="eventoModalEditar" tabindex="-1" data-bs-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #303f9f !important; border-color: #303f9f; margin-top: -15px; margin-bottom: -10px;">
                    <h5 class="modal-title" style="color: #fff; text-align: center; font-size: 18px; margin-top: -10px;">
                        Detalle de la clase</h5>
                </div>
                <div class="modal-body" id="bod">
                    <form>
                        <div class="form-group">
                            <label for="titulo">Clase</label>
                            <input type="text" class="form-control" id="tituloEdit" style="color: #000000;" autocomplete="off" placeholder="Ingrese un título para agendar la clase">
                        </div>
                        <div class="form-group" style="margin-top:5px;">
                            <label for="detalle">Descripción</label>
                            <textarea class="form-control" id="descripcionEdit" style="color: #000000;" rows="3" placeholder="Ingrese la Descripción"></textarea>
                        </div>
                        <select class="form-select mb-3 mt-3" id="select_vehiculoEdit" required="true" name="respuesta">
                        <?php
                        // Iteramos sobre los resultados y generamos las opciones del selector
                        while ($vehiculos = $vehiculos2->fetch_assoc()) {
                           $selected = ($vehiculos['id_auto'] == $evento['vehiculo_id']) ? "selected" : "";
                        ?>
                           <option value="<?php echo $vehiculos['id_auto']; ?>" <?php echo $selected; ?>>
                              <?php echo $vehiculos['modelo']; ?>
                           </option>
                        <?php
                        }
                        ?>
                        </select>
                        <div class="form-group" style="margin-top:5px;">
                            <div class="row">
                                <div class="col">
                                    <label for="fechaHora">Fecha de inicio</label>
                                    <input type="datetime-local" class="form-control" style="color: #000000;" id="comienzoEdit" placeholder="Ingrese la fecha y hora de inicio de la clase">
                                </div>
                                <div class="col">
                                    <label for="duracion">Fecha de termino</label>
                                    <input type="datetime-local" class="form-control" style="color: #000000;" id="terminoEdit" placeholder="Ingrese la duración">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" id="mod_fot" style="display: flex; justify-content: end;">
                    <button type="button" class="btn btn-primary" style="width: 24%;" id="modificarEvento">Modificar</button>
                    <button type="button" class="btn btn-danger" style="width: 24%;" id="eliminarEvento">Eliminar</button>
                    <button type="button" class="btn btn-secondary" style="width: 24%;" data-dismiss="modal" id="cerrarEdit">Cerrar</button>
                </div>

            </div>
        </div>
    </div>

    <script>
        var eventoSeleccionado; // Declaración en el ámbito global
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: "es",
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: ''
                },
                selectable: true,
                editable: true,
                droppable: true,

                events: {
                    url: 'calendarios-profesor/Controller-Calendario-Practica.php',
                    method: 'GET',
                    failure: function(error) {
                        console.error('Error al cargar eventos desde el servidor:', error);
                    }
                },


                eventContent: function(info) {
                    var backgroundColor = info.event.backgroundColor;
                    // Crea el elemento del evento
                    var content = document.createElement('div');
                    content.style.backgroundColor = backgroundColor;
                    content.style.color = obtenerColorTexto(backgroundColor); // Usa la función para obtener el color de texto
                    content.style.width = '100%'; // Asegura que el fondo ocupe todo el ancho
                    // Crea el punto indicador de evento (dot)
                    var dotEl = document.createElement('div');
                    dotEl.classList.add('fc-event-dot');
                    dotEl.style.backgroundColor = obtenerColorTexto(backgroundColor); // Punto del mismo color que el texto
                    dotEl.style.fontSize = '1.5em'; // Ajusta el tamaño de la fuente del punto
                    // Añade el punto al contenido
                    content.appendChild(dotEl);
                    // Crea el contenedor para la hora, el título y el punto de lista
                    var eventContainer = document.createElement('div');
                    eventContainer.style.display = 'flex';
                    eventContainer.style.alignItems = 'center';
                    // Crea la hora del evento
                    var timeEl = document.createElement('div');
                    timeEl.classList.add('fc-event-time');
                    timeEl.style.marginRight = '5px';
                    timeEl.style.marginLeft = '5px';
                    timeEl.innerText = info.event.start.toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                    // Añade la hora al contenedor
                    eventContainer.appendChild(timeEl);
                    // Crea el contenedor para el título y el punto de lista
                    var titleContainer = document.createElement('div');
                    titleContainer.style.display = 'flex';
                    titleContainer.style.alignItems = 'center';
                    // Crea el título del evento
                    var titleEl = document.createElement('div');
                    titleEl.classList.add('fc-event-title');
                    titleEl.innerText = info.event.title;
                    var truncatedTitle = info.event.title.length > 12 ? info.event.title.substring(0, 12) + '...' : info.event.title;
                    titleEl.innerText = truncatedTitle;
                    // Añade el título al contenedor
                    titleContainer.appendChild(titleEl);
                    // Añade el contenedor del título al contenedor del evento
                    eventContainer.appendChild(titleContainer);
                    // Añade el contenedor del evento al contenido
                    content.appendChild(eventContainer);

                    return {
                        domNodes: [content]
                    };
                },

                eventClick: function(info) {
                    // Abre el modal existente al hacer clic en un evento
                    $('#eventoModalEditar').modal('show');

                    // Muestra la información del evento en el modal
                    document.getElementById('tituloEdit').value = info.event.title;
                    document.getElementById('descripcionEdit').value = info.event.extendedProps.description;
                    document.getElementById('select_vehiculoEdit').value = info.event.extendedProps.vehiculo_id;

                    // Ajusta la zona horaria de la fecha y hora y formatea
                    var fechaHoraSinHorasExtras = moment(info.event.start).format('YYYY-MM-DDTHH:mm');

                    // Calcula la fecha y hora de finalización
                    /*            var fechaHoraFin = calcularFin(info.event.start, info.event.extendedProps.duracion);
                               var fechaHorafin = moment(fechaHoraFin).format('YYYY-MM-DDTHH:mm'); */

                    /*console.log('Fecha y Hora inicio:', fechaHoraSinHorasExtras);
                    console.log('Duración:', info.event.extendedProps.duracion);
                    console.log('Fecha y Hora fin:', fechaHorafin);*/

                    document.getElementById('comienzoEdit').value = fechaHoraSinHorasExtras;

                    eventoSeleccionado = info.event;

                    // Calcula la duración del evento
                    if (info.event.extendedProps.duracion) {
                        document.getElementById('terminoEdit').value = info.event.extendedProps.duracion;
                    } else {
                        console.log('El evento no tiene duración definida.');
                    }



                },

                dateClick: function(info) {
                    // Muestra el modal al hacer clic en una fecha
                    $('#eventoModal').modal('show');

                    // Obtén la fecha seleccionada
                    var selectedDate = info.date;

                    // Ajusta la hora por defecto a las 08:00
                    selectedDate.setHours(8, 0);

                    // Formatea la fecha y hora en el formato adecuado para el campo datetime-local
                    var formattedDate = selectedDate.getFullYear() + '-' +
                        ('0' + (selectedDate.getMonth() + 1)).slice(-2) + '-' +
                        ('0' + selectedDate.getDate()).slice(-2) + 'T' +
                        ('0' + selectedDate.getHours()).slice(-2) + ':' +
                        ('0' + selectedDate.getMinutes()).slice(-2);

                    // Actualiza el valor del campo de fecha con la fecha y hora ajustadas
                    document.getElementById('comienzo').value = formattedDate;
                    document.getElementById('termino').value = formattedDate;
                },
                eventDrop: function(info) {
                    // Obtén el evento que ha sido movido
                    var event = info.event;

                    // Obtén la nueva fecha y hora del evento
                    var newStart = event.start;

                    // Envía los nuevos detalles del evento al servidor para que se actualice
                    $.ajax({
                        url: 'calendarios-profesor/Controller-Calendario-Practica.php',
                        type: 'POST',
                        data: {
                            action: 'move',
                            eventId: event.id,
                            newStart: newStart.toISOString() // Convierte la fecha a un formato compatible con MySQL
                        },
                        success: function(response) {
                            if (response == 'success') {
                                let timerInterval;
                                Swal.fire({
                                    title: 'Hecho',
                                    text: 'Fecha modificada con éxito.',
                                    icon: 'success',
                                    timer: 1000,
                                    timerProgressBar: true,
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    allowEnterKey: false,
                                    didOpen: () => {
                                        Swal.showLoading();
                                        const b = Swal.getHtmlContainer().querySelector('b');
                                        timerInterval = setInterval(() => {
                                            b.textContent = Swal.getTimerLeft();
                                        }, 100);
                                    },
                                    willClose: () => {
                                        clearInterval(timerInterval);
                                    }
                                }).then((result) => {
                                    if (result.dismiss === Swal.DismissReason.timer) {
                                        Swal.close();
                                        // Recarga los eventos en el calendario
                                        calendar.refetchEvents();
                                        // Limpia los campos del modal
                                        limpiarModal();
                                    }
                                });
                            } else {
                                console.log(response);
                                let timerInterval;
                                Swal.fire({
                                    title: 'Ops..',
                                    text: 'Error al modificar la fecha del evento. Por favor, inténtalo de nuevo.',
                                    icon: 'error',
                                    timer: 2000,
                                    timerProgressBar: true,
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    allowEnterKey: false,
                                    didOpen: () => {
                                        Swal.showLoading();
                                        const b = Swal.getHtmlContainer().querySelector('b');
                                        timerInterval = setInterval(() => {
                                            b.textContent = Swal.getTimerLeft();
                                        }, 100);
                                    },
                                    willClose: () => {
                                        clearInterval(timerInterval);
                                    }
                                }).then((result) => {
                                    if (result.dismiss === Swal.DismissReason.timer) {
                                        Swal.close();
                                        // Recarga los eventos en el calendario
                                        calendar.refetchEvents();
                                        // Limpia los campos del modal
                                        limpiarModal();
                                    }
                                });

                            }
                        },
                        error: function() {
                            let timerInterval;
                            Swal.fire({
                                title: 'Error..',
                                text: 'Error al comunicarse con el servidor.',
                                icon: 'error',
                                timer: 2500,
                                timerProgressBar: true,
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                allowEnterKey: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                    const b = Swal.getHtmlContainer().querySelector('b');
                                    timerInterval = setInterval(() => {
                                        b.textContent = Swal.getTimerLeft();
                                    }, 100);
                                },
                                willClose: () => {
                                    clearInterval(timerInterval);
                                }
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    Swal.close();
                                    // Recarga los eventos en el calendario
                                    calendar.refetchEvents();
                                    // Limpia los campos del modal
                                    limpiarModal();
                                }
                            });
                        }
                    });
                },
            });

            document.getElementById('guardarEvento').addEventListener('click', function() {
                var titulo = document.getElementById('titulo').value;
                var descripcion = document.getElementById('descripcion').value;
                var comienzo = document.getElementById('comienzo').value;
                var termino = document.getElementById('termino').value;
                var vehiculo = document.getElementById('select_vehiculo').value;

                // Envía los datos al servidor para crear una nueva clase
                $.ajax({
                    url: 'calendarios-profesor/Controller-Calendario-Practica.php',
                    type: 'POST',
                    data: {
                        action: 'create',
                        titulo: titulo,
                        descripcion: descripcion,
                        comienzo: comienzo,
                        termino: termino,
                        vehiculo: vehiculo
                    },
                    success: function(response) {
                        if (response == 'success') {

                            Swal.fire({
                                title: 'Hecho',
                                text: 'Clase agendada con éxito.',
                                icon: 'success',
                                allowOutsideClick: false,
                                showConfirmButton: false,
                            });
                            setTimeout(function() {
                                Swal.close();
                                // Recarga los eventos en el calendario
                                calendar.refetchEvents();
                                // Limpia los campos del modal
                                limpiarModal(); // Redirige después de 3 segundos
                            }, 2000);

                        } else {
                            console.log(response);
                            Swal.fire({
                                title: 'Ops..',
                                text: 'Error al agendar la clase. Por favor, inténtalo de nuevo.',
                                icon: 'error',
                                allowOutsideClick: false,
                                showConfirmButton: false,
                            });
                            setTimeout(function() {
                                Swal.close();
                                // Recarga los eventos en el calendario
                                calendar.refetchEvents();
                                // Limpia los campos del modal
                                limpiarModal(); // Redirige después de 3 segundos
                            }, 2500);
                        }
                        $('#eventoModal').modal('hide');
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Error..',
                            text: 'Error al comunicarse con el servidor.',
                            icon: 'error',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                        });
                        setTimeout(function() {
                            Swal.close();
                            // Recarga los eventos en el calendario
                            calendar.refetchEvents();
                            // Limpia los campos del modal
                            limpiarModal(); // Redirige después de 3 segundos
                        }, 2500);
                        //alert('Error al comunicarse con el servidor.');
                    }
                });
            });

            document.getElementById('modificarEvento').addEventListener('click', function() {
                // Utiliza la variable global 'eventoSeleccionado' para obtener el evento seleccionado
                var nuevoTitulo = document.getElementById('tituloEdit').value;
                var nuevaDescripcion = document.getElementById('descripcionEdit').value;
                var nuevaVehiculo = document.getElementById('select_vehiculoEdit').value;
                var nuevaFechaHora = document.getElementById('comienzoEdit').value;
                var nuevaDuracion = document.getElementById('terminoEdit').value;

                // Aquí debes enviar estos nuevos valores al servidor para que actualice el evento
                // Utiliza AJAX o fetch para realizar la solicitud al servidor

                // Por ejemplo, podrías hacer algo como esto con AJAX
                console.log(eventoSeleccionado.id);

                $.ajax({
                    url: 'calendarios-profesor/Controller-Calendario-Practica.php',
                    type: 'POST',
                    data: {
                        action: 'update',
                        eventId: eventoSeleccionado.id,
                        nuevoTitulo: nuevoTitulo,
                        nuevaDescripcion: nuevaDescripcion,
                        nuevaFechaHora: nuevaFechaHora,
                        nuevaDuracion: nuevaDuracion,
                        nuevaVehiculo: nuevaVehiculo
                    },
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire({
                                title: 'Hecho',
                                text: 'Evento modificado con éxito.',
                                icon: 'success',
                                allowOutsideClick: false,
                                showConfirmButton: false,
                            });
                            setTimeout(function() {
                                Swal.close();
                                // Recarga los eventos en el calendario
                                calendar.refetchEvents();
                                // Limpia los campos del modal
                                limpiarModal(); // Redirige después de 3 segundos
                            }, 2000);

                        } else {
                            console.log(response);
                            Swal.fire({
                                title: 'Ops..',
                                text: 'Error al modificar el evento. Por favor, inténtalo de nuevo.',
                                icon: 'error',
                                allowOutsideClick: false,
                                showConfirmButton: false,
                            });
                            setTimeout(function() {
                                Swal.close();
                                // Recarga los eventos en el calendario
                                calendar.refetchEvents();
                                // Limpia los campos del modal
                                limpiarModal(); // Redirige después de 3 segundos
                            }, 2500);

                        }
                        $('#eventoModalEditar').modal('hide');
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Error..',
                            text: 'Error al comunicarse con el servidor.',
                            icon: 'error',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                        });
                        setTimeout(function() {
                            Swal.close();
                            // Recarga los eventos en el calendario
                            calendar.refetchEvents();
                            // Limpia los campos del modal
                            limpiarModal(); // Redirige después de 3 segundos
                        }, 2500);
                        //alert('Error al comunicarse con el servidor.');
                    }
                });
            });

            document.getElementById('eliminarEvento').addEventListener('click', function() {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: '¿Estás seguro de que deseas eliminar este evento?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Utiliza la variable global 'eventoSeleccionado' para obtener el evento seleccionado
                        $.ajax({
                            url: 'calendarios-profesor/Controller-Calendario-Practica.php',
                            type: 'POST',
                            data: {
                                action: 'delete',
                                eventId: eventoSeleccionado.id // Asegúrate de enviar el ID del evento que se está eliminando
                            },
                            success: function(response) {
                                if (response == 'success') {
                                    Swal.fire({
                                        title: '¡Eliminado!',
                                        text: 'El evento ha sido eliminado con éxito.',
                                        icon: 'success',
                                        allowOutsideClick: false,
                                        showConfirmButton: false,
                                    });
                                    setTimeout(function() {
                                        Swal.close();
                                        // Recarga los eventos en el calendario
                                        calendar.refetchEvents();
                                        // Limpia los campos del modal
                                        limpiarModal();
                                    }, 2000);
                                } else {
                                    console.log(response);
                                    Swal.fire({
                                        title: 'Ops...',
                                        text: 'Error al eliminar el evento. Por favor, inténtalo de nuevo.',
                                        icon: 'error',
                                        allowOutsideClick: false,
                                        showConfirmButton: false,
                                    });
                                    setTimeout(function() {
                                        Swal.close();
                                        // Recarga los eventos en el calendario
                                        calendar.refetchEvents();
                                        // Limpia los campos del modal
                                        limpiarModal();
                                    }, 2500);
                                }
                                $('#eventoModalEditar').modal('hide');
                            },
                            error: function() {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Error al comunicarse con el servidor.',
                                    icon: 'error',
                                    allowOutsideClick: false,
                                    showConfirmButton: false,
                                });
                                setTimeout(function() {
                                    Swal.close();
                                    // Recarga los eventos en el calendario
                                    calendar.refetchEvents();
                                    // Limpia los campos del modal
                                    limpiarModal();
                                }, 2500);
                            }
                        });
                    }
                });
            });

            function limpiarModal() {
                document.getElementById('titulo').value = '';
                document.getElementById('descripcion').value = '';
                document.getElementById('comienzo').value = '';
                document.getElementById('termino').value = '';
            }

            document.getElementById('cerrar').addEventListener('click', function() {
                // Cierra el modal y limpia los campos
                $('#eventoModal').modal('hide');
                limpiarModal();
            });

            document.getElementById('cerrarEdit').addEventListener('click', function() {
                // Cierra el modal y limpia los campos
                $('#eventoModalEditar').modal('hide');
                limpiarModal();
            });

            function obtenerColorTexto(backgroundColor) {
                // Convierte el color hexadecimal a RGB para determinar su luminosidad
                var rgb = parseInt(backgroundColor.slice(1), 16);
                var r = (rgb >> 16) & 0xff;
                var g = (rgb >> 8) & 0xff;
                var b = (rgb >> 0) & 0xff;

                // Calcula la luminosidad utilizando la fórmula YIQ
                var luminosidad = (r * 299 + g * 587 + b * 114) / 1000;

                // Si la luminosidad es mayor que 128, el fondo es claro, de lo contrario, es oscuro
                return luminosidad > 128 ? '#000000' : '#ffffff';
            }
            calendar.render();

            // Función para capitalizar la primera letra del texto
            function capitalizeFirstLetter(text) {
                return text.charAt(0).toUpperCase() + text.slice(1);
            }

            // Modifica el título del mes para mostrar la primera letra en mayúscula
            function updateMonthTitle() {
                var titleElement = document.querySelector('.fc-toolbar-title');
                if (titleElement) {
                    // Elimina el texto existente
                    titleElement.textContent = '';

                    // Obtiene el nuevo título capitalizado
                    var currentTitle = calendar.view.title;
                    var newTitle = capitalizeFirstLetter(currentTitle);

                    // Añade el nuevo título al elemento del título
                    titleElement.textContent = newTitle;
                }
            }

            // Capitaliza el título del mes al cargar el calendario
            updateMonthTitle();


            // Modifica el texto del botón "Today" después de que el calendario se haya renderizado
            var todayButton = document.querySelector('.fc-today-button');
            if (todayButton) {
                todayButton.textContent = 'Hoy';
                todayButton.addEventListener('click', function() {
                    // Capitaliza el título del mes al cambiar al siguiente mes
                    updateMonthTitle();
                    todayButton.textContent = 'Hoy';
                });
            }


            // Agrega un oyente de eventos al botón "next" del calendario
            var nextButton = document.querySelector('.fc-next-button');
            if (nextButton) {
                nextButton.addEventListener('click', function() {
                    // Capitaliza el título del mes al cambiar al siguiente mes
                    updateMonthTitle();
                    todayButton.textContent = 'Hoy';

                });
            }
            var prevButton = document.querySelector('.fc-prev-button');
            if (prevButton) {
                prevButton.addEventListener('click', function() {
                    // Capitaliza el título del mes al cambiar al siguiente mes
                    updateMonthTitle();
                    todayButton.textContent = 'Hoy';

                });
            }
        });
    </script>




</body>



</html>