<?php
include('../../../Logica/conexion.php');
require_once('../../../librerias/vendor/autoload.php');

$correo = $_POST['correo'];

$consulta = "SELECT nombre, password_user FROM usuario WHERE correo = '$correo'";
$queryconsulta = mysqli_query($conn, $consulta);

if (mysqli_num_rows($queryconsulta) == 0) {
    // El correo no se encontró en la base de datos
    header("Location: ../Recuperar-Contrasena.php?alert=error");
    exit();
} else {
    $resultado = mysqli_fetch_assoc($queryconsulta);
    $nombre = $resultado['nombre'];
    $password = $resultado['password_user'];

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
    $sendSmtpEmail['subject'] = 'Recuperación de contraseña';

    // Configuración del contenido HTML del correo electrónico
    $sendSmtpEmail['htmlContent'] =
        '<html lang="es">

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
                    <strong>Recuperación de Contraseña</strong>
                </p>
            </div>
            <div style="color: #ffffff; font-family: arial, helvetica, sans-serif; font-size: 16px; line-height: 1.5; padding-bottom: 15px; padding-left: 21px; padding-top: 15px; text-align: justify;">
                <p style="margin: 0">Hola <b>' . $nombre . '</b> Recibimos tu solicitud de recuperacion de contraseña y la hemos recuperado!. Tu contraseña es <b>' . $password . '.</b> 
                    Te recordamos la importancia de no compartir
                    esta contraseña con nadie, ya que es personal y confidencial</p>
            </div>
        </div>
    </div>
</body>

</html>';

    // Configuración del remitente del correo electrónico
    $sendSmtpEmail['sender'] = array('name' => 'New Drivers', 'email' => 'newdriverschile@gmail.com');

    // Configuración del destinatario del correo electrónico
    $sendSmtpEmail['to'] = array(
        array('email' => $correo, 'name' => $nombre)
    );
    // m.sanchez62@alumnos.santotomas.cl - no funciona 
    // maikol2001@live.cl - si funciona
    // Se intenta enviar el correo electrónico transaccional
    try {
        $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
        header("Location: ../Recuperar-Contrasena.php?alert=success");
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
}
