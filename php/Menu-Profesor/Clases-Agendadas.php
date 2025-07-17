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

    <link rel="stylesheet" href="../../Css/Solicitudes-Alumnos.css">
    <link rel="shortcut icon" href="../../Img/Logo_velocimetro.png" />

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- DataTables  -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">



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
            <a href="Clases-Practicas-Profesor.php">
                <li><i class="fa-solid fa-car"></i>Clases Practicas</li>
            </a>
            <a href="Solicitudes-Alumnos.php">
                <li><i class="fa-solid fa-list"></i>Solicitudes de alumnos</li>
            </a>
            <a href="Clases-agendadas.php" style="color: #FDD45B;">
                <li><i class="fa-solid fa-list" style="color: #FDD45B;"></i>Clases Agendadas</li>
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
        <div class="titulo">
            <h3 class="i-name" id="titulo-clase">Clases Teóricas</h3>

        </div>





        <div class="values">


            <table id="example" class="display table-hover bg-dark" style="width:100%; color: #ffff">
                <thead>
                    <tr>
                        <th class="text-center">Alumno</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Comienzo de la clase</th>
                        <th class="text-center">Termino de la clase</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Especificamientos del alumno</th>
                        <th class="text-center">Observaciones del profesor</th>
                        <th class="text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>



                    <?php
                    $id_profesor = intval($_SESSION['id_profe']);
                    $sql = "SELECT id_clase_teorica AS id_teorica,
                    ct.observacion_alumno AS observacion_alumno,
                    ct.observacion_profe AS observacion_profe,
                    imagen AS imagen_alumno,
                    nombre AS nombre_alumno,
                    comienzo AS horario_comienzo_clase,
                    termino AS horario_termino_clase,
                    COUNT(*) AS cantidad_clases_alumno,
                    ct.estado AS estado_clase
                    FROM clase_teorica ct
                    JOIN alumno ON ct.fk_alumno_id = id_alum
                    JOIN usuario ON fk_usuario_id = id_user
                    WHERE ct.fk_profesor_id = $id_profesor AND ct.estado != 'cancelada'
                    GROUP BY ct.fk_alumno_id, comienzo, ct.estado
                    ORDER BY ct.estado DESC, ct.comienzo DESC;";

                    $result = mysqli_query($conn, $sql);

                    while ($usuario = mysqli_fetch_array($result)) {

                        $id_clase = $usuario['id_teorica']
                    ?>

                        <tr>

                            <td class="text-center">
                                <img style="width: 50px;height: 50px;border-radius: 50%;" src="../../Logica/uploads/<?php echo $usuario['imagen_alumno'] ?>" alt="">
                            </td>
                            <td class="text-center"><?php echo $usuario['nombre_alumno'] ?></td>
                            <td class="text-center"><?php echo $usuario['horario_comienzo_clase'] ?></td>
                            <td class="text-center"><?php echo $usuario['horario_termino_clase'] ?></td>
                            <td class="text-center">
                                <?php
                                $estado = $usuario['estado_clase'];

                                switch ($estado) {
                                    case 'Ocupado':
                                        echo '<i class="fa-solid fa-circle-exclamation text-warning"></i> Pendiente'; // Icono de pendiente (por ejemplo, un reloj de arena)
                                        break;
                                    case 'Cancelada':
                                        echo '<i class="fa-solid fa-xmark text-danger"></i> Cancelada'; // Icono de rechazado (por ejemplo, una marca de equis)
                                        break;
                                    case 'Completada':
                                        echo '<i class="fas fa-check-circle text-success"></i> Aceptado'; // Icono de aceptado (por ejemplo, una marca de cheque)
                                        break;
                                    case 'Finalizada':
                                        echo '<i class="fas fa-check-circle text-success"></i> Finalizada'; // Icono de aceptado (por ejemplo, una marca de cheque)
                                        break;
                                    default:
                                        echo $estado; // Muestra el estado tal cual si no coincide con ninguno de los casos anteriores
                                }
                                ?>
                            </td>
                            <td class="text-center"><?php echo empty($usuario['observacion_alumno']) ? 'Sin especificaciones' : $usuario['observacion_alumno']; ?></td>
                            <td class="text-center"><?php echo empty($usuario['observacion_profe']) ? 'Sin especificaciones' : $usuario['observacion_profe']; ?></td>
                            <td class="text-center">
                                <?php if ($usuario['estado_clase'] == 'Ocupado') { ?>
                                    <button type="button" style="margin-right: 5px !important;" class="btn btn-sm btn-danger" onclick="rechazar(<?php echo $id_clase; ?>)">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                    <button type="button" style="margin-left: 5px !important;" class="btn btn-sm btn-success" onclick="finalizar(<?php echo $id_clase; ?>)">
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                <?php } else { ?>
                                    <button type="button" style="margin-right: 5px !important;" class="btn btn-sm btn-danger" disabled>
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                    <button type="button" style="margin-left: 5px !important;" class="btn btn-sm btn-success" disabled>
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                <?php } ?>
                            </td>
                            <?php include('modal/Cancelar-Clase.php'); ?>

                        </tr>

                    <?php } ?>
                </tbody>
            </table>



        </div>

        <div class="titulo">
            <h3 class="i-name-practica" id="titulo-clase">Clases Prácticas</h3>
        </div>


        <div class="values mb-5">

            <table id="example2" class="display table-hover bg-dark" style="width:100%; color: #ffff">
                <thead>
                    <tr>
                        <th class="text-center">Alumno</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Comienzo de la clase</th>
                        <th class="text-center">Termino de la clase</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Especificamientos del alumno</th>
                        <th class="text-center">Observaciones del profesor</th>
                        <th class="text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>



                    <?php
                    $id_profesor = intval($_SESSION['id_profe']);
                    $sql = "SELECT id_clase_practica AS id_practica,
                                    ct.observacion_alumno AS observacion_alumno,
                                    ct.observacion_profe AS observacion_profe,
                                    imagen AS imagen_alumno,
                                    nombre AS nombre_alumno,
                                    comienzo AS horario_comienzo_clase,
                                    termino AS horario_termino_clase,
                                    COUNT(*) AS cantidad_clases_alumno,
                                    ct.estado AS estado_clase
                            FROM clase_practica ct
                            JOIN alumno ON ct.fk_alumno_id = id_alum
                            JOIN usuario ON fk_usuario_id = id_user
                            JOIN solicitud_alumno sa ON ct.fk_solicitud_id = sa.id_solicitud
                            WHERE ct.fk_profesor_id = $id_profesor 
                            AND ct.estado != 'cancelada'
                            AND sa.tipo_clase = 'Clase Normal'
                            GROUP BY ct.fk_alumno_id, comienzo, ct.estado;";

                    $result = mysqli_query($conn, $sql);

                    while ($usuario = mysqli_fetch_array($result)) {

                        $id_clase = $usuario['id_practica']
                    ?>

                        <tr>

                            <td class="text-center">
                                <img style="width: 50px;height: 50px;border-radius: 50%;" src="../../Logica/uploads/<?php echo $usuario['imagen_alumno'] ?>" alt="">
                            </td>
                            <td class="text-center"><?php echo $usuario['nombre_alumno'] ?></td>
                            <td class="text-center"><?php echo $usuario['horario_comienzo_clase'] ?></td>
                            <td class="text-center"><?php echo $usuario['horario_termino_clase'] ?></td>
                            <td class="text-center">
                                <?php
                                $estado = $usuario['estado_clase'];

                                switch ($estado) {
                                    case 'Ocupado':
                                        echo '<i class="fa-solid fa-circle-exclamation text-warning"></i> Pendiente'; // Icono de pendiente (por ejemplo, un reloj de arena)
                                        break;
                                    case 'Cancelada':
                                        echo '<i class="fa-solid fa-xmark text-danger"></i> Cancelada'; // Icono de rechazado (por ejemplo, una marca de equis)
                                        break;
                                    case 'Completada':
                                        echo '<i class="fas fa-check-circle text-success"></i> Aceptado'; // Icono de aceptado (por ejemplo, una marca de cheque)
                                        break;
                                    case 'Finalizada':
                                        echo '<i class="fas fa-check-circle text-success"></i> Finalizada'; // Icono de aceptado (por ejemplo, una marca de cheque)
                                        break;
                                    default:
                                        echo $estado; // Muestra el estado tal cual si no coincide con ninguno de los casos anteriores
                                }
                                ?>
                            </td>
                            <td class="text-center"><?php echo empty($usuario['observacion_alumno']) ? 'Sin especificaciones' : $usuario['observacion_alumno']; ?></td>
                            <td class="text-center"><?php echo empty($usuario['observacion_profe']) ? 'Sin especificaciones' : $usuario['observacion_profe']; ?></td>
                            <td class="text-center">
                                <?php if ($usuario['estado_clase'] == 'Ocupado') { ?>
                                    <button type="button" style="margin-right: 5px !important;" class="btn btn-sm btn-danger" onclick="rechazarPractica(<?php echo $id_clase; ?>)">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                    <button type="button" style="margin-left: 5px !important;" class="btn btn-sm btn-success" onclick="finalizarPractica(<?php echo $id_clase; ?>)">
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                <?php } else { ?>
                                    <button type="button" style="margin-right: 5px !important;" class="btn btn-sm btn-danger" disabled>
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                    <button type="button" style="margin-left: 5px !important;" class="btn btn-sm btn-success" disabled>
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                <?php } ?>
                            </td>
                            <?php include('modal/Cancelar-Clase-Practica.php'); ?>

                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>


        <div class="titulo">
            <h3 class="i-name-practica" id="titulo-clase">Clases Extras</h3>
        </div>


        <div class="values mb-5">

            <table id="example3" class="display table-hover bg-dark" style="width:100%; color: #ffff">
                <thead>
                    <tr>
                        <th class="text-center">Alumno</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Comienzo de la clase</th>
                        <th class="text-center">Termino de la clase</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Especificamientos del alumno</th>
                        <th class="text-center">Observaciones del profesor</th>
                        <th class="text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>



                    <?php
                    $id_profesor = intval($_SESSION['id_profe']);
                    $sql = "SELECT id_clase_practica AS id_practica,
                                    ct.observacion_alumno AS observacion_alumno,
                                    ct.observacion_profe AS observacion_profe,
                                    imagen AS imagen_alumno,
                                    nombre AS nombre_alumno,
                                    comienzo AS horario_comienzo_clase,
                                    termino AS horario_termino_clase,
                                    COUNT(*) AS cantidad_clases_alumno,
                                    ct.estado AS estado_clase
                            FROM clase_practica ct
                            JOIN alumno ON ct.fk_alumno_id = id_alum
                            JOIN usuario ON fk_usuario_id = id_user
                            JOIN solicitud_alumno sa ON ct.fk_solicitud_id = sa.id_solicitud
                            WHERE ct.fk_profesor_id = $id_profesor 
                            AND ct.estado != 'cancelada'
                            AND sa.tipo_clase = 'Clase Extra'
                            GROUP BY ct.fk_alumno_id, comienzo, ct.estado;";

                    $result = mysqli_query($conn, $sql);

                    while ($usuario = mysqli_fetch_array($result)) {

                        $id_clase = $usuario['id_practica'];
                    ?>

                        <tr>

                            <td class="text-center">
                                <img style="width: 50px;height: 50px;border-radius: 50%;" src="../../Logica/uploads/<?php echo $usuario['imagen_alumno'] ?>" alt="">
                            </td>
                            <td class="text-center"><?php echo $usuario['nombre_alumno'] ?></td>
                            <td class="text-center"><?php echo $usuario['horario_comienzo_clase']?></td>
                            <td class="text-center"><?php echo $usuario['horario_termino_clase'] ?></td>
                            <td class="text-center">
                                <?php
                                $estado = $usuario['estado_clase'];

                                switch ($estado) {
                                    case 'Ocupado':
                                        echo '<i class="fa-solid fa-circle-exclamation text-warning"></i> Pendiente'; // Icono de pendiente (por ejemplo, un reloj de arena)
                                        break;
                                    case 'Cancelada':
                                        echo '<i class="fa-solid fa-xmark text-danger"></i> Cancelada'; // Icono de rechazado (por ejemplo, una marca de equis)
                                        break;
                                    case 'Completada':
                                        echo '<i class="fas fa-check-circle text-success"></i> Aceptado'; // Icono de aceptado (por ejemplo, una marca de cheque)
                                        break;
                                    case 'Finalizada':
                                        echo '<i class="fas fa-check-circle text-success"></i> Finalizada'; // Icono de aceptado (por ejemplo, una marca de cheque)
                                        break;
                                    default:
                                        echo $estado; // Muestra el estado tal cual si no coincide con ninguno de los casos anteriores
                                }
                                ?>
                            </td>
                            <td class="text-center"><?php echo empty($usuario['observacion_alumno']) ? 'Sin especificaciones' : $usuario['observacion_alumno']; ?></td>
                            <td class="text-center"><?php echo empty($usuario['observacion_profe']) ? 'Sin especificaciones' : $usuario['observacion_profe']; ?></td>
                            <td class="text-center">
                                <?php if ($usuario['estado_clase'] == 'Ocupado') { ?>
                                    <button type="button" style="margin-right: 5px !important;" class="btn btn-sm btn-danger" onclick="rechazarPractica(<?php echo $id_clase; ?>)">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                    <button type="button" style="margin-left: 5px !important;" class="btn btn-sm btn-success" onclick="finalizarPractica(<?php echo $id_clase; ?>)">
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                <?php } else { ?>
                                    <button type="button" style="margin-right: 5px !important;" class="btn btn-sm btn-danger" disabled>
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                    <button type="button" style="margin-left: 5px !important;" class="btn btn-sm btn-success" disabled>
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                <?php } ?>
                            </td>
                            <?php include('modal/Cancelar-Clase-Practica.php'); ?>

                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>





    </section>



    <?php
    require('../../Logica/DAO/Profesor/DAO-Profesor.php');
    $dao = new DAO();



    if (isset($_POST['cancelar'])) {
        if (!empty($_POST['id_clase'])) {
            $id_clase = $_POST['id_clase'];
            $comienzo = $_POST['comienzo'];
            $motivo = $_POST['motivo'];

            $hora_formateada = date("H:i", strtotime($comienzo));
            $dia_formateada = date("d-m-Y", strtotime($comienzo));

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
                            <meta charset="UTF-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Recuperacion de Contraseña</title>
                            <style>
                                body, html {
                                    margin: 0;
                                    height: 100%;
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                }

                                .centered-div {
                                    width:55%;
                                    background-color: #16191c;
                                    text-align: center;
                                    padding: 60px;
                                }

                                .contenedor img {
                                    margin-bottom: 10px;
                                }
                            </style>
                        </head>

                        <body>
                            <div class="centered-div">
                                <div class="contenedor">
                                    <img src="https://img.mailinblue.com/6883410/images/content_library/original/66e7be63de6f3678255a79f1.png" style="width: 20%;" />
                                    <br>
                                    <img src="https://img.mailinblue.com/6883410/images/content_library/original/66e7be465ec7a53c146bb6cf.png" style="width: 35%; margin-bottom: -30px;" />
                                    <div style="color: #FDD45B; font-family: arial, helvetica, sans-serif; font-size: 16px; line-height: 1.5; padding-top: 40px;">
                                        <p style="margin: 0; font-size: 26px;">
                                            <strong>Clase teórica cancelada</strong>
                                        </p>
                                    </div>
                                    <div style="color: #ffffff; font-family: arial, helvetica, sans-serif; font-size: 16px; line-height: 1.5; padding-bottom: 15px; padding-left: 21px; padding-top: 15px; text-align: justify;">
                                        <p style="margin: 0">Estimado(a) <b>' . $nombreAlumno . '</b><br>
                                            Le informamos que se ha cancelado la clase que tenía agendada para el día <b>'. $dia_formateada .'</b> a las <b>'. $hora_formateada .'</b> horas debido a ' . $motivo . '. 
                                            Le recomendamos ingresar a New Drivers para ver todos los detalles correspondientes a esta cancelación.
                                            No te preocupes, tu clase será reagendada lo antes posible por tu profesor.<br><br>
                                            
                                            Le solicitamos estar atento(a) para recibir la nueva fecha y hora de la clase reprogramada. 
                                            Si tiene alguna pregunta o necesita más información, no dude en ponerse en contacto con nosotros.<br><br>

                                            Lamentamos cualquier inconveniente que esto pueda causarle y agradecemos su comprensión.<br><br>

                                            Atentamente,<br><br>

                                            <b>Soporte de New Drivers</b></p>
                                    </div>
                                </div>
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
                        confirmButtonText: 'Aceptar',
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
                    text: 'No se pudo Realizar la operación',
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
                    confirmButtonText: 'Aceptar',
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
                    text: 'No se pudo Realizar la operación',
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
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Recuperacion de Contraseña</title>
                        <style>
                            body, html {
                                margin: 0;
                                height: 100%;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                            }

                            .centered-div {
                                width:55%;
                                background-color: #16191c;
                                text-align: center;
                                padding: 60px;
                            }

                            .contenedor img {
                                margin-bottom: 10px;
                            }
                        </style>
                    </head>

                    <body>
                        <div class="centered-div">
                            <div class="contenedor">
                                <img src="https://img.mailinblue.com/6883410/images/content_library/original/66e7be63de6f3678255a79f1.png" style="width: 20%;" />
                                <br>
                                <img src="https://img.mailinblue.com/6883410/images/content_library/original/66e7be465ec7a53c146bb6cf.png" style="width: 35%; margin-bottom: -30px;" />
                                <div style="color: #FDD45B; font-family: arial, helvetica, sans-serif; font-size: 16px; line-height: 1.5; padding-top: 40px;">
                                    <p style="margin: 0; font-size: 26px;">
                                        <strong>Clase teórica completada</strong>
                                    </p>
                                </div>
                                <div style="color: #ffffff; font-family: arial, helvetica, sans-serif; font-size: 16px; line-height: 1.5; padding-bottom: 15px; padding-left: 21px; padding-top: 15px; text-align: justify;">
                                    <p style="margin: 0">Estimado(a) <b>' . $nombreAlumno . '</b><br> 
                                        Queremos informarle que su clase teórica ha sido completada correctamente. 
                                        Le recomendamos ingresar a New Drivers para ver los detalles de su clase completada y para consultar su calendario.<br><br>
                                        Su instructor ha entregado las siguientes observaciones: <b>' . $observacion . '</b>. <br>

                                        
                                        En su calendario podrá ver la fecha y hora de su próxima clase. 
                                        Si tiene alguna pregunta o necesita más información, no dude en ponerse en contacto con nosotros.<br><br>

                                        Agradecemos su dedicación y esfuerzo durante la clase.<br><br>

                                        Atentamente,<br><br>

                                        <b>Soporte de New Drivers.</b></p>
                                </div>
                            </div>
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
                    confirmButtonText: 'Aceptar',
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
                    text: 'No se pudo Realizar la operación.',
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
            $comienzo = $_POST['comienzo'];
            $motivo = $_POST['motivo'];

            $hora_formateada = date("H:i", strtotime($comienzo));
            $dia_formateada = date("d-m-Y", strtotime($comienzo));

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
                            <meta charset="UTF-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Recuperacion de Contraseña</title>
                            <style>
                                body, html {
                                    margin: 0;
                                    height: 100%;
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                }

                                .centered-div {
                                    width:55%;
                                    background-color: #16191c;
                                    text-align: center;
                                    padding: 60px;
                                }

                                .contenedor img {
                                    margin-bottom: 10px;
                                }
                            </style>
                        </head>

                        <body>
                            <div class="centered-div">
                                <div class="contenedor">
                                    <img src="https://img.mailinblue.com/6883410/images/content_library/original/66e7be63de6f3678255a79f1.png" style="width: 20%;" />
                                    <br>
                                    <img src="https://img.mailinblue.com/6883410/images/content_library/original/66e7be465ec7a53c146bb6cf.png" style="width: 35%; margin-bottom: -30px;" />
                                    <div style="color: #FDD45B; font-family: arial, helvetica, sans-serif; font-size: 16px; line-height: 1.5; padding-top: 40px;">
                                        <p style="margin: 0; font-size: 26px;">
                                            <strong>Clase práctica cancelada</strong>
                                        </p>
                                    </div>
                                    <div style="color: #ffffff; font-family: arial, helvetica, sans-serif; font-size: 16px; line-height: 1.5; padding-bottom: 15px; padding-left: 21px; padding-top: 15px; text-align: justify;">
                                        <p style="margin: 0">Estimado(a) <b>' . $nombreAlumno . '</b><br>
                                            Le informamos que se ha cancelado la clase que tenía agendada para el día <b>'. $dia_formateada .'</b> a las <b>'. $hora_formateada .'</b> horas debido a ' . $motivo . '. 
                                            Le recomendamos ingresar a New Drivers para ver todos los detalles correspondientes a esta cancelación.
                                            No te preocupes, tu clase será reagendada lo antes posible por tu profesor.<br><br>
                                            
                                            Le solicitamos estar atento(a) para recibir la nueva fecha y hora de la clase reprogramada. 
                                            Si tiene alguna pregunta o necesita más información, no dude en ponerse en contacto con nosotros.<br><br>

                                            Lamentamos cualquier inconveniente que esto pueda causarle y agradecemos su comprensión.<br><br>

                                            Atentamente,<br><br>

                                            <b>Soporte de New Drivers</b></p>
                                    </div>
                                </div>
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
                        html: 'La clase fue cancelada correctamente, Recuerde que deberá reagendar esta clase',
                        icon: 'success',
                        allowOutsideClick: false,
                        confirmButtonText: 'Aceptar',
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
                    text: 'No se pudo Realizar la operación',
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
                    confirmButtonText: 'Aceptar',
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
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Clase práctica completada</title>
                        <style>
                            body, html {
                                margin: 0;
                                height: 100%;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                            }

                            .centered-div {
                                width:55%;
                                background-color: #16191c;
                                text-align: center;
                                padding: 60px;
                            }

                            .contenedor img {
                                margin-bottom: 10px;
                            }
                        </style>
                    </head>

                    <body>
                        <div class="centered-div">
                            <div class="contenedor">
                                <img src="https://img.mailinblue.com/6883410/images/content_library/original/66e7be63de6f3678255a79f1.png" style="width: 20%;" />
                                <br>
                                <img src="https://img.mailinblue.com/6883410/images/content_library/original/66e7be465ec7a53c146bb6cf.png" style="width: 35%; margin-bottom: -30px;" />
                                <div style="color: #FDD45B; font-family: arial, helvetica, sans-serif; font-size: 16px; line-height: 1.5; padding-top: 40px;">
                                    <p style="margin: 0; font-size: 26px;">
                                        <strong>Recuperación de Contraseña</strong>
                                    </p>
                                </div>
                                <div style="color: #ffffff; font-family: arial, helvetica, sans-serif; font-size: 16px; line-height: 1.5; padding-bottom: 15px; padding-left: 21px; padding-top: 15px; text-align: justify;">
                                    <p style="margin: 0">Estimado(a) <b>' . $nombreAlumno . '</b><br>
                                        Queremos informarle que su clase práctica ha sido completada correctamente. 
                                        Le recomendamos ingresar a New Drivers para ver los detalles de su clase completada y para consultar su calendario.<br><br>
                                        Su instructor ha entregado las siguientes observaciones: <b>' . $observacion . '</b>. <br>

                                        
                                        En su calendario podrá ver la fecha y hora de su próxima clase. 
                                        Si tiene alguna pregunta o necesita más información, no dude en ponerse en contacto con nosotros.<br><br>

                                        Agradecemos su dedicación y esfuerzo durante la clase.<br><br>

                                        Atentamente,<br><br>

                                        <b>Soporte de New Drivers.</b></p>
                                </div>
                            </div>
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
                    confirmButtonText: 'Aceptar',
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
                    text: 'No se pudo Realizar la operación',
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
                                    timer: 1000,
                                    confirmButtonColor: '#25b32c',
                                });
                                setTimeout(function() {
                                    window.location.href = 'Clases-Agendadas.php';
                                }, 1000);
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
                                    timer: 1000,
                                    confirmButtonColor: '#25b32c',
                                });
                                setTimeout(function() {
                                    window.location.href = 'Clases-Agendadas.php';
                                }, 1000);
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

    <script src="../../Js/ClasesAgendadas.js"></script>
    <script src="../../Js/ClasesAgendadas2.js"></script>
    <script src="../../Js/ClasesAgendadas3.js"></script>


</body>

</html>