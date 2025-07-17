<?php
include('../../../Logica/DAO/Profesor/DAO-Profesor.php');
$dao = new DAO();
session_start();

$id_alumn = $_POST['id_alumno'];
$estado = $_POST['estado'];
$id_profe = $_SESSION['id_profe'];

$idAlumno = ''; // Inicializamos la variable para almacenar el ID del alumno


if ($estado === 'Teórico') {

    $resultado = $dao->habilitarPractica($id_alumn, $id_profe);

    if ($resultado === true) {

        $alumno = $dao->buscarAlumn($id_alumn);
        $nombreAlumno = isset($alumno[0]) ? htmlspecialchars($alumno[0]) : '';
        $correoAlumno = isset($alumno[1]) ? htmlspecialchars($alumno[1]) : '';


        require_once('../../../librerias/vendor/autoload.php');

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
        $sendSmtpEmail['subject'] = 'Clases Teóricas Completadas';

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
                                                    <strong>Clases teóricas completadas</strong>
                                                </p>
                                            </div>
                                            <div style="color: #ffffff; font-family: arial, helvetica, sans-serif; font-size: 16px; line-height: 1.5; padding-bottom: 15px; padding-left: 21px; padding-top: 15px; text-align: justify;">
                                                <p style="margin: 0">Estimado(a) <b>' . $nombreAlumno . '</b><br>
                                                                        Le informamos que ha completado con éxito todas sus clases teóricas. 
                                                                        Ahora es el momento de comenzar a agendar sus clases prácticas.<br><br>
                                                                        
                                                                        Puede agendar sus clases prácticas en la sección de solicitudes de New Drivers. 
                                                                        Si tiene alguna pregunta o necesita más información, no dude en contactarnos.<br><br>

                                                                        Agradecemos su dedicación y esfuerzo durante el curso.<br><br>

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

        try {
            $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
            echo "success_habilitar";
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
        echo "error_habilitar";
    }


} elseif ($estado === 'Práctico') {

    $resultado = $dao->finalizarCurso($id_alumn, $id_profe);

    if ($resultado === true) {
        
        $alumno = $dao->buscarAlumn($id_alumn);
        $nombreAlumno = isset($alumno[0]) ? htmlspecialchars($alumno[0]) : '';
        $correoAlumno = isset($alumno[1]) ? htmlspecialchars($alumno[1]) : '';


        require_once('../../../librerias/vendor/autoload.php');

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
        $sendSmtpEmail['subject'] = '¡Felicidades has aprobado tu Curso de Manejo! 🎉🚗';

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
                                                            <strong>¡Felicidades!</strong>
                                                        </p>
                                                    </div>
                                                    <div style="color: #ffffff; font-family: arial, helvetica, sans-serif; font-size: 16px; line-height: 1.5; padding-bottom: 15px; padding-left: 21px; padding-top: 15px; text-align: justify;">
                                                        <p style="margin: 0">Estimado(a) <b>' . $nombreAlumno . '</b><br>
                                                        Nos complace informarte que has aprobado con éxito tu curso de manejo. ¡Felicidades!
                                                        Este es un gran logro y un paso importante hacia tu independencia y seguridad al volante.<br><br>
                                                        
                                                        Queremos reconocer tu dedicación y esfuerzo durante las clases. 
                                                        Tu compromiso ha dado frutos y estamos seguros de que serás un conductor ejemplar.<br><br>

                                                        Si tienes alguna pregunta adicional o necesitas más información, no dudes en contactarnos. 
                                                        También te recordamos que estamos aquí para apoyarte en cualquier etapa de tu camino como conductor.<br><br>

                                                        Atentamente,<br><br>

                                                        <b>New Drivers.</b></p>
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
            echo "success_finalizar";
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
        echo "error_finalizar";
    }
} else {
    echo "error";
}
