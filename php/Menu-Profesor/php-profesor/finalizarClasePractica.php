<?php
include('../../../Logica/DAO/Profesor/DAO-Profesor.php');
$dao = new DAO();

$id = $_POST['id_clase'];

$idAlumno = ''; // Inicializamos la variable para almacenar el ID del alumno

// Suponiendo que buscarAlumClase devuelve un objeto mysqli_result
$resultado = $dao->buscarAlumClasePractica($id);
if ($resultado) {
    // Extraer el ID del alumno del resultado (suponiendo que esperas un solo resultado)
    $fila = $resultado->fetch_assoc();
    $idAlumno = $fila['fk_alumno_id'];
}

$resultadoFinalizar = $dao->finalizarClasePracticaSinObservacion($id);
if($resultadoFinalizar === true){

    $alumno = $dao->buscarAlumn($idAlumno);
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
    $sendSmtpEmail['subject'] = 'Clase práctica completada';

    // Configuración del contenido HTML del correo electrónico
    $sendSmtpEmail['htmlContent'] = '
<html lang="es">

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
                    <strong>Clase práctica completada</strong>
                </p>
            </div>
            <div style="color: #ffffff; font-family: arial, helvetica, sans-serif; font-size: 16px; line-height: 1.5; padding-bottom: 15px; padding-left: 21px; padding-top: 15px; text-align: justify;">
                <p style="margin: 0">Estimado(a) <b>' . $nombreAlumno . '</b><br>
                    Queremos informarle que su clase práctica ha sido completada correctamente. 
                    Le recomendamos ingresar a New Drivers para ver los detalles de su clase completada y para consultar su calendario.<br><br>
                    
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
        echo "success";
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
}else{
    echo 'error';
}


?>