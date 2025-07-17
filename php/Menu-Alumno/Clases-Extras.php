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

    <link rel="stylesheet" href="../../Css/Clases-Extras.css">
    <link rel="shortcut icon" href="../../Img/Logo_velocimetro.png" />

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
                <a href="Clases-Extras.php" style="color: #FDD45B;">
                    <li><i class="fa-solid fa-calendar-plus" style="color: #FDD45B;"></i>Clases extras</li>
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
        <div class="titulo">
            <h3 class="i-name" id="titulo-clase">Cursos Completados</h3>

        </div>





        <div class="values">


            <table id="example1" class="display table-hover bg-dark" style="width:100%; color: #ffff">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Profesor/a</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Puntaje</th>
                        <th class="text-center">Calificación</th>
                        <th class="text-center">Horarios</th>
                    </tr>
                </thead>
                <tbody>



                    <?php
                    $id_alumno = $_SESSION['id_alum'];
                    $sql = "SELECT 
                                solicitud_alumno.id_solicitud,
                                solicitud_alumno.estado_solicitud AS estado_solicitud,
                                solicitud_alumno.estado_clase AS estado_clase,
                                solicitud_alumno.respuesta,
                                profesor.id_prof AS id_profesor,
                                usuario_profesor.nombre AS nombre_profesor,
                                usuario_profesor.imagen AS imagen_profesor,
                                profesor.descripcion_prof AS descripcion_profesor,
                                pagos.estado_pago AS estado_pago,
                                IFNULL(calificaciones_profesores.valoracion, '0') AS valoracion_profesor,
                                IFNULL(calificaciones_profesores.descripcion, 'Sin Calificar') AS descripcion_calificacion
                            FROM solicitud_alumno
                            JOIN pagos ON pagos.solicitud_alumno_fk_id = solicitud_alumno.id_solicitud
                            JOIN profesor ON solicitud_alumno.fk_profesor_id = profesor.id_prof
                            JOIN alumno ON solicitud_alumno.fk_alumno_id = alumno.id_alum
                            JOIN usuario AS usuario_profesor ON profesor.fk_usuario_id = usuario_profesor.id_user
                            LEFT JOIN calificaciones_profesores ON solicitud_alumno.fk_profesor_id = calificaciones_profesores.fk_profesor_id 
                                AND solicitud_alumno.fk_alumno_id = calificaciones_profesores.fk_alumno_id
                            WHERE solicitud_alumno.fk_alumno_id = $id_alumno 
                                AND (solicitud_alumno.estado_clase = 'Finalizado' OR solicitud_alumno.estado_clase = 'Calificado')
                                AND solicitud_alumno.tipo_clase != 'Clase Extra'
                            GROUP BY id_solicitud; ";

                    $result = mysqli_query($conn, $sql);
                    $contador = 1;

                    while ($usuario = mysqli_fetch_array($result)) {

                    ?>

                        <tr>
                            <td class="text-center"><?php echo $contador ?></td>
                            <td class="text-center">
                                <img style="width: 50px;height: 50px;border-radius: 50%;" src="../../Logica/uploads/<?php echo $usuario['imagen_profesor'] ?>" alt="">
                            </td>
                            <td class="text-center"><?php echo $usuario['nombre_profesor'] ?></td>
                            <td class="text-center" style="text-align: justify;"><?php echo $usuario['valoracion_profesor'] ?> <i class="fa-solid fa-star" style="color: #FFD43B;"></i></td>
                            <td class="text-center" style="text-align: justify;"><?php echo $usuario['descripcion_calificacion'] ?></td>
                            <td class="text-center">
                                <?php
                                // Obtener el estado de la solicitud y otros detalles
                                $estadoClase = $usuario['estado_clase'];
                                $id_solicitud = $usuario['id_solicitud'];

                                // Mostrar siempre el botón "Agendar clases"
                                echo '<button class="btn btn-warning" style="background-color: #efc015; border: none;" name="calificar" data-bs-toggle="modal" data-bs-target="#addcalificate' . $id_solicitud . '">Solicitar clase extra</button>';
                                
                                $contador++;
                                ?>
                            </td>
                            <?php include('modal/modal-clase-extra.php'); ?>

                        </tr>

                    <?php } ?>
                </tbody>
            </table>



        </div>

        <?php

    if (isset($_POST['solicitar'])) {
            $id_profe = $_POST['id_profe'];
            $observacion = $_POST['observacion'];
            $id_alumno = $_SESSION['id_alum'];

            $resultadoSolicitud = $dao->enviarSolicitudExtra($id_alumno, $id_profe, $observacion);
            if ($resultadoSolicitud == true) {
                echo "<script>
                    Swal.fire({
                    title: 'Solicitud Enviada',
                    text: 'Se ha enviado con exito la solicitud de clase extra al profesor, espere por una respuesta.',
                    icon: 'success',
                    allowOutsideClick: false,
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#25b32c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Clases-Extras.php';
                    }
                    });
                </script>";
            } else {
                echo "<script>
                    Swal.fire({
                    title: 'Hubo un Problema',
                    text: 'No se pudo realizar la operación',
                    icon: 'error',
                    allowOutsideClick: false,
                    confirmButtonText: 'Volver',
                    confirmButtonColor: '#e74c3c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Clases-Extras.php';
                    }
                    });
                </script>";
            }
        
    }
    ?>

        <div class="titulo">
            <h3 class="i-name-practica" id="titulo-clase">Clases Extras</h3>
        </div>


        <div class="values mb-5">

        <table id="example2" class="display table-hover bg-dark" style="width:100%; color: #ffff">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Profesor/a</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Comentario</th>
                        <th class="text-center">Horarios</th>
                    </tr>
                </thead>
                <tbody>



                    <?php
                    $id_alumno = $_SESSION['id_alum'];
                    $sql = "SELECT 
                                solicitud_alumno.id_solicitud,
                                solicitud_alumno.estado_solicitud AS estado_solicitud,
                                solicitud_alumno.estado_clase AS estado_clase,
                                solicitud_alumno.respuesta AS respuesta,
                                profesor.id_prof AS id_profesor,
                                usuario_profesor.nombre AS nombre_profesor,
                                usuario_profesor.imagen AS imagen_profesor,
                                profesor.descripcion_prof AS descripcion_profesor,
                                pagos.estado_pago AS estado_pago,
                                IFNULL(calificaciones_profesores.valoracion, '0') AS valoracion_profesor,
                                IFNULL(calificaciones_profesores.descripcion, 'Sin Calificar') AS descripcion_calificacion
                            FROM solicitud_alumno
                            JOIN pagos ON pagos.solicitud_alumno_fk_id = solicitud_alumno.id_solicitud
                            JOIN profesor ON solicitud_alumno.fk_profesor_id = profesor.id_prof
                            JOIN alumno ON solicitud_alumno.fk_alumno_id = alumno.id_alum
                            JOIN usuario AS usuario_profesor ON profesor.fk_usuario_id = usuario_profesor.id_user
                            LEFT JOIN calificaciones_profesores ON solicitud_alumno.fk_profesor_id = calificaciones_profesores.fk_profesor_id 
                                AND solicitud_alumno.fk_alumno_id = calificaciones_profesores.fk_alumno_id
                            WHERE solicitud_alumno.fk_alumno_id = $id_alumno AND solicitud_alumno.tipo_clase = 'Clase Extra'
                            GROUP BY id_solicitud;";

                    $result = mysqli_query($conn, $sql);
                    $contador = 1;

                    while ($usuario = mysqli_fetch_array($result)) {

                    ?>

                        <tr>
                            <td class="text-center"><?php echo $contador ?></td>
                            <td class="text-center">
                                <img style="width: 50px;height: 50px;border-radius: 50%;" src="../../Logica/uploads/<?php echo $usuario['imagen_profesor'] ?>" alt="">
                            </td>
                            <td class="text-center"><?php echo $usuario['nombre_profesor'] ?></td>
                            <td class="text-center">
                                <?php
                                $estado = $usuario['estado_solicitud'];
                                $estado_clase = $usuario['estado_clase'];
                                $estado_pago = $usuario['estado_pago'];

                                if ($estado_clase == 'Finalizado' || $estado_clase == 'Calificado') {
                                    echo '<i class="fa-solid fa-graduation-cap text-success" ></i> Curso finalizado';
                                } else {
                                    if ($estado_pago == 'Pendiente' && $estado == 'Aceptado') {
                                        echo '<i class="fa-solid fa-circle-exclamation text-warning"></i> Pago Pendiente'; // Icono de pendiente (por ejemplo, un reloj de arena)
                                    } else {
                                        if ($estado == 'Pendiente') {
                                            echo '<i class="fa-solid fa-circle-exclamation text-warning"></i> Pendiente'; // Icono de pendiente (por ejemplo, un reloj de arena)
                                        } elseif ($estado == 'Rechazado') {
                                            echo '<i class="fa-solid fa-xmark text-danger"></i> Rechazado'; // Icono de rechazado (por ejemplo, una marca de equis)
                                        } elseif ($estado == 'Aceptado') {
                                            echo '<i class="fas fa-check-circle text-success"></i> Aceptado'; // Icono de aceptado (por ejemplo, una marca de cheque)
                                        } else {
                                            echo $estado; // Muestra el estado tal cual si no coincide con ninguno de los casos anteriores
                                        }
                                    }
                                }

                                ?>
                            </td>
                            <td class="text-center" style="text-align: justify;"><?php echo $usuario['respuesta'] ?></td>
                            <td class="text-center">
                                <?php
                                $estadoClase = $usuario['estado_clase'];
                                $estado = $usuario['estado_solicitud'];
                                $estado_pago = $usuario['estado_pago'];
                                $id_solicitud = $usuario['id_solicitud'];
                                $id_prof = $usuario['id_profesor'];

                               if($estadoClase == 'Ocupado'){
                                echo '<button class="btn btn-success btn-agendar" disabled>Agendado</button>';
                               }else if ($estado == 'Aceptado') {
                                    if ($estado_pago == 'Pendiente') {
                                        echo '
                                        <a href="php/redireccionar_pago_extra.php?solicitud=' . $id_solicitud . '" class="btn btn-warning btn-agendar" >
                                        Pagar
                                        </a>';
                                    } else {
                                        if ($estadoClase == 'Finalizado') {
                                            echo '<i class="fa-solid fa-graduation-cap text-success" ></i>';
                                        
                                        } else {
                                            echo '<button class="btn btn-success btn-agendar" data-id="' . $id_prof . '" data-id-solicitud="' . $id_solicitud . '" data-estado-clase="' . $estadoClase . '">Agendar</button>';
                                        }
                                    }
                                } else {
                                    echo '<button class="btn btn-success btn-agendar" disabled> Necesita confirmación de su profesor</button>';
                                }

                                $contador++
                                ?>
                            </td>
                            <?php include('modal/modal-clase-extra.php'); ?>

                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>





    </section>

    <script>
        $(document).ready(function() {
            $('.btn-agendar').click(function() {
                var idUsuario = $(this).data('id'); // Captura el ID del usuario
                var idSolicitud = $(this).data('id-solicitud'); // Captura el ID del usuario
                var estadoClase = $(this).data('estado-clase'); // Captura el estado de la clase
                console.log('ID del usuario:', idUsuario);
                console.log('Estado de la clase:', estadoClase);

                // Redirige a la página correspondiente dependiendo del estado de la clase
                var url = '';
                switch (estadoClase) {
                    case 'Teórico':
                        url = 'Agendar-clases.php';
                        break;
                    case 'Práctica':
                        url = 'Calendario-Extras.php';
                        break;
                }

                window.location.href = url + '?id_profesor=' + idUsuario +'&id_solicitud='+ idSolicitud;
            });
        });
    </script>



    <?php




    if (isset($_POST['cancelar'])) {
        if (!empty($_POST['id_clase'])) {
            $id_clase = $_POST['id_clase'];
            $motivo = $_POST['motivo'];

            $idAlumno = ''; // Inicializamos la variable para almacenar el ID del alumno

            // Suponiendo que buscarAlumClase devuelve un objeto mysqli_result
            $resultado = $dao->buscarAlumClase($id_clase);
            if ($resultado) {
                // Extraer el ID del alumno del resultado (suponiendo que esperas un solo resultado)
                $fila = $resultado->fetch_assoc();
                $idAlumno = $fila['fk_alumno_id'];
            }



            $resultado = $dao->cancelarClaseTeorica($id_clase, $motivo);
            if ($resultado == true) {

                $alumno = $dao->buscarAlumn($idAlumno);
                $nombreAlumno = isset($alumno[0]) ? htmlspecialchars($alumno[0]) : '';
                $correoAlumno = isset($alumno[1]) ? htmlspecialchars($alumno[1]) : '';


                require_once('../../librerias/vendor/autoload.php');

                // Configuración de la clave API de SendinBlue
                $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

                // Creación de una instancia de la API de correos electrónicos transaccionales de SendinBlue
                $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
                    new GuzzleHttp\Client(),
                    $config
                );

                // Creación de un objeto para representar el correo electrónico a enviar
                $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();

                // Configuración del asunto del correo electrónico
                $sendSmtpEmail['subject'] = 'Se ha cancelado su clase teórica';

                // Configuración del contenido HTML del correo electrónico
                $sendSmtpEmail['htmlContent'] = '<html lang="es">
                <head>
                <title>Solicitud</title>

            </head>
            <body>
                <div class="contenedor">
                Estimado(a) <b>' . $nombreAlumno . '</b><br>
                Le informamos que se ha cancelado la clase que tenía agendada debido a ' . $motivo . '. 
                Le recomendamos ingresar a New Drivers para ver todos los detalles correspondientes a esta cancelación.
                No te preocupes, tu clase será reagendada lo antes posible por tu profesor.<br><br>
                
                Le solicitamos estar atento(a) para recibir la nueva fecha y hora de la clase reprogramada. 
                Si tiene alguna pregunta o necesita más información, no dude en ponerse en contacto con nosotros.<br><br>

                Lamentamos cualquier inconveniente que esto pueda causarle y agradecemos su comprensión.<br><br>

                Atentamente,<br><br>

                <b>Soporte de New Drivers</b>

                </div>

                </body>
            </html>';

                // Configuración del remitente del correo electrónico
                $sendSmtpEmail['sender'] = array('name' => 'New Drivers', 'email' => 'newdriverschile@gmail.com');

                // Configuración del destinatario del correo electrónico
                $sendSmtpEmail['to'] = array(
                    array('email' => $correoAlumno, 'name' => $nombreAlumno)
                );
                // m.sanchez62@alumnos.santotomas.cl - no funciona 
                // maikol2001@live.cl - si funciona
                // Se intenta enviar el correo electrónico transaccional
                try {
                    $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
                    echo "<script>
                    Swal.fire({
                        title: 'Clase cancelada',
                        html: 'La clase fue cancelada correctamente, recuerde que deberá reagendar esta clase',
                        icon: 'success',
                        allowOutsideClick: false,
                        confirmButtonText: 'Cancelar Clase',
                        confirmButtonColor: '#25b32c',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'Clases-Agendadas.php';
                        }
                    });
                </script>";
                } catch (Exception $e) {
                    //echo 'Excepción al llamar a TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
                    //echo "error"; // Si hay un error en el envío

                    // Error en el envío del correo
                    echo "<script>Swal.fire({
                            icon: 'error',
                            title: 'Error en el envío del correo',
                            text: 'No se pudo enviar el correo. Por favor, inténtalo de nuevo más tarde.',
                            showConfirmButton: false,
                        });
                        setTimeout(function() {
                            Swal.close(); 
                        }, 3000);</script>";
                }
            } else {
                echo "<script>
                    Swal.fire({
                    title: 'Hubo un Problema',
                    text: 'No se pudo realizar la operación',
                    icon: 'error',
                    allowOutsideClick: false,
                    confirmButtonText: 'Volver',
                    confirmButtonColor: '#e74c3c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Clases-Agendadas.php';
                    }
                    });
                </script>";
            }
        } else {

            echo "<script>
                Swal.fire({
                title: 'Campos Vacios',
                text: 'Ingrese todos los datos por favor',
                icon: 'warning',
                allowOutsideClick: false,
                confirmButtonText: 'Volver',
                confirmButtonColor: '#f39c12',
                });
            </script>";
        }
    }

    if (isset($_POST['reagendar'])) {
        if (!empty($_POST['id_clase'])) {
            $id_clase = $_POST['id_clase'];
            $motivo = $_POST['motivo'];
            $comienzo = $_POST['comienzo'];
            $termino = $_POST['termino'];

            $resultado = $dao->reagendarClaseTeorica($id_clase, $motivo, $comienzo, $termino);
            if ($resultado == true) {
                echo "<script>
                    Swal.fire({
                    title: 'Clase cancelada',
                    text: 'La clase fue cancelada y reagendada correctamente',
                    icon: 'success',
                    allowOutsideClick: false,
                    confirmButtonText: 'Cancelar Clase',
                    confirmButtonColor: '#25b32c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Clases-Agendadas.php';
                    }
                    });
                </script>";
            } else {
                echo "<script>
                    Swal.fire({
                    title: 'Hubo un Problema',
                    text: 'No se pudo realizar la operación',
                    icon: 'error',
                    allowOutsideClick: false,
                    confirmButtonText: 'Volver',
                    confirmButtonColor: '#e74c3c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Clases-Agendadas.php';
                    }
                    });
                </script>";
            }
        } else {

            echo "<script>
                Swal.fire({
                title: 'Campos vacios',
                text: 'Ingrese todos los datos por favor',
                icon: 'warning',
                allowOutsideClick: false,
                confirmButtonText: 'Volver',
                confirmButtonColor: '#f39c12',
                });
            </script>";
        }
    }

    if (isset($_POST['finalizar'])) {
        if (!empty($_POST['id_clase'])) {
            $id_clase = $_POST['id_clase'];
            $observacion = $_POST['observacion'];

            $idAlumno = ''; // Inicializamos la variable para almacenar el ID del alumno

            // Suponiendo que buscarAlumClase devuelve un objeto mysqli_result
            $resultado = $dao->buscarAlumClase($id_clase);
            if ($resultado) {
                // Extraer el ID del alumno del resultado (suponiendo que esperas un solo resultado)
                $fila = $resultado->fetch_assoc();
                $idAlumno = $fila['fk_alumno_id'];
            }

            $resultado = $dao->finalizarClaseTeorica($id_clase, $observacion);
            if ($resultado == true) {
                $alumno = $dao->buscarAlumn($idAlumno);
                $nombreAlumno = isset($alumno[0]) ? htmlspecialchars($alumno[0]) : '';
                $correoAlumno = isset($alumno[1]) ? htmlspecialchars($alumno[1]) : '';


                require_once('../../librerias/vendor/autoload.php');

                // Configuración de la clave API de SendinBlue
                $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

                // Creación de una instancia de la API de correos electrónicos transaccionales de SendinBlue
                $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
                    new GuzzleHttp\Client(),
                    $config
                );

                // Creación de un objeto para representar el correo electrónico a enviar
                $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();

                // Configuración del asunto del correo electrónico
                $sendSmtpEmail['subject'] = 'Clase teórica completada';

                // Configuración del contenido HTML del correo electrónico
                $sendSmtpEmail['htmlContent'] = '<html lang="es">
                <head>
                <title>Solicitud</title>

            </head>
            <body>
                <div class="contenedor">
                    Estimado(a) <b>' . $nombreAlumno . '</b><br>
                    Le queremos informar que su clase ha sido completada correctamente. 
                    Le recomendamos ingresar a New Drivers para ver los detalles de su clase completada y para consultar su calendario.<br><br>

                    Su instructor entrego las siguientes observaciones: <b>' . $observacion . '</b>. <br><br>
                    
                    En su calendario podrá ver la fecha y hora de su próxima clase. 
                    Si tiene alguna pregunta o necesita más información, no dude en ponerse en contacto con nosotros.<br><br>

                    Agradecemos su dedicación y esfuerzo durante la clase.<br><br>

                    Atentamente,<br><br>

                    <b>Soporte de New Drivers.</b>
                </div>

                </body>
            </html>';

                // Configuración del remitente del correo electrónico
                $sendSmtpEmail['sender'] = array('name' => 'New Drivers', 'email' => 'newdriverschile@gmail.com');

                // Configuración del destinatario del correo electrónico
                $sendSmtpEmail['to'] = array(
                    array('email' => $correoAlumno, 'name' => $nombreAlumno)
                );

                try {
                    $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
                    echo "<script>
                    Swal.fire({
                    title: 'Clase Finalizada Correctamente.',
                    text: 'La clase quedará registrada como completada.',
                    icon: 'success',
                    allowOutsideClick: false,
                    confirmButtonText: 'Cancelar Clase',
                    confirmButtonColor: '#25b32c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Clases-Agendadas.php';
                    }
                    });
                </script>";
                } catch (Exception $e) {
                    echo "<script>Swal.fire({
                            icon: 'error',
                            title: 'Error en el envío del correo',
                            text: 'No se pudo enviar el correo. Por favor, inténtalo de nuevo más tarde.',
                            showConfirmButton: false,
                        });
                        setTimeout(function() {
                            Swal.close(); 
                        }, 3000);</script>";
                }
            } else {
                echo "<script>
                    Swal.fire({
                    title: 'Hubo un Problema',
                    text: 'No se Pudo Realizar la operación.',
                    icon: 'error',
                    allowOutsideClick: false,
                    confirmButtonText: 'Volver',
                    confirmButtonColor: '#e74c3c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Clases-Agendadas.php';
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

    /* Funciones para las Clases Practicas */

    if (isset($_POST['cancelarPractica'])) {
        if (!empty($_POST['id_clase'])) {
            $id_clase = $_POST['id_clase'];
            $motivo = $_POST['motivo'];

            $idAlumno = ''; // Inicializamos la variable para almacenar el ID del alumno

            // Suponiendo que buscarAlumClase devuelve un objeto mysqli_result
            $resultado = $dao->buscarAlumClasePractica($id_clase);
            if ($resultado) {
                // Extraer el ID del alumno del resultado (suponiendo que esperas un solo resultado)
                $fila = $resultado->fetch_assoc();
                $idAlumno = $fila['fk_alumno_id'];
            }



            $resultado = $dao->cancelarClasePractica($id_clase, $motivo);
            if ($resultado == true) {

                $alumno = $dao->buscarAlumn($idAlumno);
                $nombreAlumno = isset($alumno[0]) ? htmlspecialchars($alumno[0]) : '';
                $correoAlumno = isset($alumno[1]) ? htmlspecialchars($alumno[1]) : '';


                require_once('../../librerias/vendor/autoload.php');

                // Configuración de la clave API de SendinBlue
                $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

                // Creación de una instancia de la API de correos electrónicos transaccionales de SendinBlue
                $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
                    new GuzzleHttp\Client(),
                    $config
                );

                // Creación de un objeto para representar el correo electrónico a enviar
                $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();

                // Configuración del asunto del correo electrónico
                $sendSmtpEmail['subject'] = 'Se ha cancelado su clase práctica';

                // Configuración del contenido HTML del correo electrónico
                $sendSmtpEmail['htmlContent'] = '<html lang="es">
                <head>
                <title>Solicitud</title>

            </head>
            <body>
                <div class="contenedor">
                Estimado(a) <b>' . $nombreAlumno . '</b><br>
                Le informamos que se ha cancelado la clase que tenía agendada debido a ' . $motivo . '. 
                Le recomendamos ingresar a New Drivers para ver todos los detalles correspondientes a esta cancelación.
                No te preocupes, tu clase será reagendada lo antes posible por tu profesor.<br><br>
                
                Le solicitamos estar atento(a) para recibir la nueva fecha y hora de la clase reprogramada. 
                Si tiene alguna pregunta o necesita más información, no dude en ponerse en contacto con nosotros.<br><br>

                Lamentamos cualquier inconveniente que esto pueda causarle y agradecemos su comprensión.<br><br>

                Atentamente,<br><br>

                <b>Soporte de New Drivers</b>

                </div>

                </body>
            </html>';

                // Configuración del remitente del correo electrónico
                $sendSmtpEmail['sender'] = array('name' => 'New Drivers', 'email' => 'newdriverschile@gmail.com');

                // Configuración del destinatario del correo electrónico
                $sendSmtpEmail['to'] = array(
                    array('email' => $correoAlumno, 'name' => $nombreAlumno)
                );
                // m.sanchez62@alumnos.santotomas.cl - no funciona 
                // maikol2001@live.cl - si funciona
                // Se intenta enviar el correo electrónico transaccional
                try {
                    $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
                    echo "<script>
                    Swal.fire({
                        title: 'Clase cancelada',
                        html: 'La clase fue cancelada correctamente, recuerde que deberá reagendar esta clase',
                        icon: 'success',
                        allowOutsideClick: false,
                        confirmButtonText: 'Cancelar Clase',
                        confirmButtonColor: '#25b32c',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'Clases-Agendadas.php';
                        }
                    });
                </script>";
                } catch (Exception $e) {
                    //echo 'Excepción al llamar a TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
                    //echo "error"; // Si hay un error en el envío

                    // Error en el envío del correo
                    echo "<script>Swal.fire({
                            icon: 'error',
                            title: 'Error en el envío del correo',
                            text: 'No se pudo enviar el correo. Por favor, inténtalo de nuevo más tarde.',
                            showConfirmButton: false,
                        });
                        setTimeout(function() {
                            Swal.close(); 
                        }, 3000);</script>";
                }
            } else {
                echo "<script>
                    Swal.fire({
                    title: 'Hubo un Problema',
                    text: 'No se pudo realizar la operación',
                    icon: 'error',
                    allowOutsideClick: false,
                    confirmButtonText: 'Volver',
                    confirmButtonColor: '#e74c3c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Clases-Agendadas.php';
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

    if (isset($_POST['reagendarPractica'])) {
        if (!empty($_POST['id_clase'])) {
            $id_clase = $_POST['id_clase'];
            $motivo = $_POST['motivo'];
            $comienzo = $_POST['comienzo'];
            $termino = $_POST['termino'];

            $resultado = $dao->reagendarClasePractica($id_clase, $motivo, $comienzo, $termino);
            if ($resultado == true) {
                echo "<script>
                    Swal.fire({
                    title: 'Clase cancelada',
                    text: 'La clase fue cancelada y reagendada correctamente',
                    icon: 'success',
                    allowOutsideClick: false,
                    confirmButtonText: 'Cancelar Clase',
                    confirmButtonColor: '#25b32c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Clases-Agendadas.php';
                    }
                    });
                </script>";
            } else {
                echo "<script>
                    Swal.fire({
                    title: 'Hubo un Problema',
                    text: 'No se pudo realizar la operación',
                    icon: 'error',
                    allowOutsideClick: false,
                    confirmButtonText: 'Volver',
                    confirmButtonColor: '#e74c3c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Clases-Agendadas.php';
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

    if (isset($_POST['finalizarPractica'])) {
        if (!empty($_POST['id_clase'])) {
            $id_clase = $_POST['id_clase'];
            $observacion = $_POST['observacion'];

            $idAlumno = ''; // Inicializamos la variable para almacenar el ID del alumno

            // Suponiendo que buscarAlumClase devuelve un objeto mysqli_result
            $resultado = $dao->buscarAlumClasePractica($id_clase);
            if ($resultado) {
                // Extraer el ID del alumno del resultado (suponiendo que esperas un solo resultado)
                $fila = $resultado->fetch_assoc();
                $idAlumno = $fila['fk_alumno_id'];
            }



            $resultado = $dao->finalizarClasePractica($id_clase, $observacion);
            if ($resultado == true) {
                $alumno = $dao->buscarAlumn($idAlumno);
                $nombreAlumno = isset($alumno[0]) ? htmlspecialchars($alumno[0]) : '';
                $correoAlumno = isset($alumno[1]) ? htmlspecialchars($alumno[1]) : '';


                require_once('../../librerias/vendor/autoload.php');

                // Configuración de la clave API de SendinBlue
                $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

                // Creación de una instancia de la API de correos electrónicos transaccionales de SendinBlue
                $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
                    new GuzzleHttp\Client(),
                    $config
                );

                // Creación de un objeto para representar el correo electrónico a enviar
                $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();

                // Configuración del asunto del correo electrónico
                $sendSmtpEmail['subject'] = 'Clase práctica completada';

                // Configuración del contenido HTML del correo electrónico
                $sendSmtpEmail['htmlContent'] = '<html lang="es">
                <head>
                <title>Solicitud</title>

            </head>
            <body>
                <div class="contenedor">
                    Estimado(a) <b>' . $nombreAlumno . '</b><br>
                    Le queremos informar que su clase práctica ha sido completada correctamente. 
                    Le recomendamos ingresar a New Drivers para ver los detalles de su clase completada y para consultar su calendario.<br><br>
                    
                    En su calendario podrá ver la fecha y hora de su próxima clase. 
                    Si tiene alguna pregunta o necesita más información, no dude en ponerse en contacto con nosotros.<br><br>

                    Agradecemos su dedicación y esfuerzo durante la clase.<br><br>

                    Atentamente,<br><br>

                    <b>Soporte de New Drivers.</b>
                </div>

                </body>
            </html>';

                // Configuración del remitente del correo electrónico
                $sendSmtpEmail['sender'] = array('name' => 'New Drivers', 'email' => 'newdriverschile@gmail.com');

                // Configuración del destinatario del correo electrónico
                $sendSmtpEmail['to'] = array(
                    array('email' => $correoAlumno, 'name' => $nombreAlumno)
                );

                try {
                    $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
                    echo "<script>
                    Swal.fire({
                    title: 'Clase Finalizada Correctamente.',
                    text: 'La clase quedara registrada como completada.',
                    icon: 'success',
                    allowOutsideClick: false,
                    confirmButtonText: 'Cancelar Clase',
                    confirmButtonColor: '#25b32c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Clases-Agendadas.php';
                    }
                    });
                </script>";
                } catch (Exception $e) {
                    //echo 'Excepción al llamar a TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
                    //echo "error"; // Si hay un error en el envío

                    // Error en el envío del correo
                    echo "<script>Swal.fire({
                            icon: 'error',
                            title: 'Error en el envío del correo',
                            text: 'No se pudo enviar el correo. Por favor, inténtalo de nuevo más tarde.',
                            showConfirmButton: false,
                        });
                        setTimeout(function() {
                            Swal.close(); 
                        }, 3000);</script>";
                }
            } else {
                echo "<script>
                    Swal.fire({
                    title: 'Hubo un Problema',
                    text: 'No se pudo realizar la operación',
                    icon: 'error',
                    allowOutsideClick: false,
                    confirmButtonText: 'Volver',
                    confirmButtonColor: '#e74c3c',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'Clases-Agendadas.php';
                    }
                    });
                </script>";
            }
        } else {

            echo "<script>
                Swal.fire({
                title: 'Campos vacios',
                text: 'Ingrese todos los datos por favor',
                icon: 'warning',
                allowOutsideClick: false,
                confirmButtonText: 'Volver',
                confirmButtonColor: '#f39c12',
                });
            </script>";
        }
    }

    ?>
    <!-- Clases Teoricas -->
    <script>
        function rechazar(id_solicitud) {
            console.log(id_solicitud);
            Swal.fire({
                title: '¿Estás seguro que deseas cancelar la clase?',
                text: 'Al cancelar la clase deberas reagendar la clase con el alumno. ¿Deseas hacerlo inmediato?',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#6c757d',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Cancelar Clase',
                cancelButtonText: 'Cerrar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#cancelarClase' + id_solicitud).modal('show');
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // Acción para el botón de cerrar
                }
            });
        }
    </script>


    <script>
        function finalizar(id_solicitud) {
            console.log(id_solicitud);
            Swal.fire({
                title: '¿Estás seguro de que quieres dar por finalizada la clase?',
                text: 'La clase quedará como completada en el calendario de clases',
                icon: 'warning',
                showCancelButton: true,
                showDenyButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#6c757d',
                denyButtonColor: '#0d6efdfa',
                confirmButtonText: 'Sí, Finalizar',
                denyButtonText: 'Finalizar con observación',
                cancelButtonText: 'Cerrar'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = id_solicitud;
                    console.log(id);
                    console.log('hola');
                    $.ajax({
                        url: 'php-profesor/finalizarClaseTeorica.php',
                        type: 'POST',
                        data: {
                            id_clase: id
                        },
                        success: function(response) {
                            if (response === 'success') {
                                Swal.fire({
                                    title: 'Completado',
                                    text: 'La clase se registró como realizada correctamente',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    confirmButtonColor: '#25b32c',
                                });
                                setTimeout(function() {
                                    window.location.href = 'Clases-Agendadas.php';
                                }, 2000);
                            } else {
                                console.log(response);
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Ocurrió un problema al aceptar al alumno',
                                    icon: 'error',
                                    confirmButtonText: 'Volver',
                                    confirmButtonColor: '#e74c3c',
                                });
                            }
                        }
                    });
                } else if (result.isDenied) {
                    $('#finalizarClase' + id_solicitud).modal('show');
                } else if (result.dismiss === Swal.DismissReason.cancel) {}
            });
        }
    </script>

    <!-- Clases Practicas -->

    <script>
        function rechazarPractica(id_solicitud) {
            console.log(id_solicitud);
            Swal.fire({
                title: '¿Estás seguro que deseas cancelar la clase?',
                text: 'Al cancelar la clase deberás reagendar la clase con el alumno. Se enviará un correo al alumno informando que su clase fue cancelada.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Cancelar',
                cancelButtonText: 'Cerrar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#cancelarClasePractica' + id_solicitud).modal('show');
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // Acción para el botón de cerrar
                }
            });
        }
    </script>

    

    <script>
        function finalizarPractica(id_solicitud) {
            console.log(id_solicitud);
            Swal.fire({
                title: '¿Estás seguro de que quieres dar por finalizada la clase?',
                text: 'La clase quedará como completada en el calendario de clases.',
                icon: 'warning',
                showCancelButton: true,
                showDenyButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#6c757d',
                denyButtonColor: '#0d6efdfa',
                confirmButtonText: 'Sí, Finalizar',
                denyButtonText: 'Finalizar con observación',
                cancelButtonText: 'Cerrar'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = id_solicitud;
                    console.log(id);
                    console.log('hola');
                    $.ajax({
                        url: 'php-profesor/finalizarClasePractica.php',
                        type: 'POST',
                        data: {
                            id_clase: id
                        },
                        success: function(response) {
                            if (response === 'success') {
                                Swal.fire({
                                    title: 'Completado',
                                    text: 'La clase se registró como realizada correctamente',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    confirmButtonColor: '#25b32c',
                                });
                                setTimeout(function() {
                                    window.location.href = 'Clases-Agendadas.php';
                                }, 2000);
                            } else {
                                console.log(response);
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Ocurrió un problema al aceptar al alumno',
                                    icon: 'error',
                                    confirmButtonText: 'Volver',
                                    confirmButtonColor: '#e74c3c',
                                });
                            }
                        }
                    });
                } else if (result.isDenied) {
                    $('#finalizarClasePractica' + id_solicitud).modal('show');
                } else if (result.dismiss === Swal.DismissReason.cancel) {}
            });
        }
    </script>

<?php
    if (isset($_GET['response'])) {
        $response = $_GET['response'];

        if ($response == 'success') { ?>
            <script>
                let timerInterval;
                Swal.fire({
                    title: 'Pago Realizado!',
                    text: 'Se ha realizado el pago de forma correcta.',
                    icon: 'success',
                    timer: 3000,
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
                        window.location.href = 'Clases-Extras.php';
                    }
                });
            </script>
        <?php
        } else if ($response == 'error') { ?>
            <script>
                let timerIntervale;
                Swal.fire({
                    title: 'Pago Cancelado',
                    text: 'Se ha cancelado el pago del curso.',
                    icon: 'error',
                    timer: 3000,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,

                    didOpen: () => {
                        Swal.showLoading();
                        const b = Swal.getHtmlContainer().querySelector('b');
                        timerIntervale = setInterval(() => {
                            b.textContent = Swal.getTimerLeft();
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerIntervale);
                    }
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        window.location.href = 'Clases-Extras.php';
                    }
                });
            </script>
        <?php
        } elseif ($response == 'error_support') { ?>
            <script>
                let timerIntervales;
                Swal.fire({
                    title: 'Pago realizado, error de sistema',
                    text: 'Se ha completado el pago, pero no se ha modificado en el sistema. Sugerimos contactar al soporte de New Drivers',
                    icon: 'warning',
                    timer: 4000,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,

                    didOpen: () => {
                        Swal.showLoading();
                        const b = Swal.getHtmlContainer().querySelector('b');
                        timerIntervales = setInterval(() => {
                            b.textContent = Swal.getTimerLeft();
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerIntervales);
                    }
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        window.location.href = 'Clases-Extras.php';
                    }
                });
            </script>
    <?php

        }
    }
    ?>


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

    <script src="../../Js/Clases-Extras1.js"></script>
    <script src="../../Js/Clases-Extras2.js"></script>


</body>

</html>