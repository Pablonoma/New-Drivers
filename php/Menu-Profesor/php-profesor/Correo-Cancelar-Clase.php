<?php
include('../../../Logica/conexion.php');
require_once('../../../librerias/vendor/autoload.php');

$correo = $_POST['correo'];

$consulta = "SELECT id_clase_practica AS id_practica,
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
                    WHERE ct.fk_profesor_id = 1
                    GROUP BY ct.fk_alumno_id, comienzo, ct.estado;";
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
    $sendSmtpEmail['htmlContent'] = '<html lang="es">
    <head>
    <title>Solicitud</title>

</head>
<body>
    <div class="contenedor">
    
    Hola <b>' . $nombre . '</b> Recibimos tu solicitud de recuperación de contraseña y la hemos recuperado!. Tu contraseña es <b>' . $password . '.</b> 
    Te recordamos la importancia de no compartir
     esta contraseña con nadie, ya que es personal y confidencial

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
