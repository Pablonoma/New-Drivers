<?php
class DAO
{
    private $conn;

    public function conectarBD()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "new_drivers";

        $this->conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

        if ($this->conn->connect_errno) {
            echo "Se encontro un error en la conexion " . $this->conn->connect_error;
        }
    }

    public function desconectarBD()
    {
        $this->conn->close();
    }

    public function editarPerfil($nombre, $telefono, $fecha_nacimiento, $correo, $descripcion, $imagen, $id, $experiencia, $descripcion_clase, $ubicacion)
    {
        $this->conectarBD();

        $sql = "UPDATE usuario SET nombre = '$nombre', telefono = '$telefono', fecha_nacimiento = '$fecha_nacimiento', correo = '$correo',
                                            imagen = '$imagen', ubicacion = '$ubicacion' WHERE id_user = '$id'";
        $result = $this->conn->query($sql);

        $sql2 = "UPDATE profesor SET descripcion_prof = '$descripcion', descripcion_clase = '$descripcion_clase', experiencia = '$experiencia' WHERE fk_usuario_id = '$id'";
        $result2 = $this->conn->query($sql2);

        $this->desconectarBD();
        if ($result && $result2) {
            return true;
        } else {
            return false;
        }
    }


    public function editarVehiculo(
        $modelo,
        $ano,
        $personas,
        $combustible,
        $doble_comando,
        $transmision,
        $patente,
        $id_auto
    ) {
        $this->conectarBD();
        if ($doble_comando == "si") {
            $sql = "UPDATE vehiculo SET patente = '$patente', transmision = '$transmision', combustible = '$combustible', personas = '$personas',
                 modelo = '$modelo', ano = '$ano', doble_comando = 1 WHERE id_auto = '$id_auto'";
            $result = $this->conn->query($sql);
        } else if ($doble_comando == "no") {
            $sql = "UPDATE vehiculo SET patente = '$patente', transmision = '$transmision', combustible = '$combustible', personas = '$personas',
                 modelo = '$modelo', ano = '$ano', doble_comando = 0 WHERE id_auto = '$id_auto'";
            $result = $this->conn->query($sql);
        }

        /*$sql = "UPDATE vehiculo SET patente = '$patente', transmision = '$transmision', combustible = '$combustible', personas = '$personas',
                 modelo = '$modelo', ano = '$ano', doble_comando = '$doble_comando' WHERE id_auto = '$id_auto'";
        $result = $this->conn->query($sql);*/
        $this->desconectarBD();

        if ($result === true) {
            return true;
        } else {
            return false;
        }
    }


    public function registrarVehiculo(
        $modelo,
        $ano,
        $personas,
        $combustible,
        $doble_comando,
        $transmision,
        $patente,
        $imagen,
        $id_profe
    ) {
        $this->conectarBD();

        if ($doble_comando == "si") {
            $sql = "INSERT INTO vehiculo VALUES (null,'$patente','$transmision','$combustible','$personas','$modelo', '$ano',1,'$imagen','$id_profe', 1)";

            $result = $this->conn->query($sql);
        } else if ($doble_comando == "no") {
            $sql = "INSERT INTO vehiculo VALUES (null,'$patente','$transmision','$combustible','$personas','$modelo', '$ano',0,'$imagen','$id_profe', 1)";

            $result = $this->conn->query($sql);
        }
        //$sql = "INSERT INTO vehiculo VALUES (null,'$patente','$transmision','$combustible','$personas','$modelo', '$ano','$doble_comando','$imagen','$id_profe', 1)";
        //$result = $this->conn->query($sql);
        $this->desconectarBD();

        if ($result === true) {
            return true;
        } else {
            return false;
        }
    }


    public function deshabilitarVehiculo($id)
    {
        $this->conectarBD();
        $sql = "UPDATE vehiculo SET estado_auto = 0 WHERE id_auto = '$id'";
        $resultado = $this->conn->query($sql);
        $this->desconectarBD();

        if ($resultado) {
            echo "success"; // Indica éxito
        } else {
            echo "error"; // Indica un error
        }
    }

    public function contadorClaseExtra($id)
    {
        $this->conectarBD();

        $sql = "SELECT COUNT(*) AS clasesTotal
                FROM solicitud_alumno
                WHERE id_solicitud = '$id' AND tipo_clase = 'Clase Extra'";
        $resultado = $this->conn->query($sql);
        $row = $resultado->fetch_assoc();

        $this->desconectarBD();
        return $row['clasesTotal'];
    }

    public function aceptarAlumno($id_solicitud)
    {
        $this->conectarBD();
        $sql = "UPDATE solicitud_alumno SET estado_solicitud = 'Aceptado', respuesta = 'Se ha aceptado tu solicitud, ahora debes seleccionar el horario de tus clases' WHERE id_solicitud = '$id_solicitud'";
        $resultado = $this->conn->query($sql);
        $this->desconectarBD();

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function aceptarAlumnoExtra($id_solicitud)
    {
        $this->conectarBD();
        $sql = "UPDATE solicitud_alumno SET estado_solicitud = 'Aceptado', respuesta = 'Se ha aceptado tu solicitud de clase extra, ahora debes seleccionar el horario de tu clase.' WHERE id_solicitud = '$id_solicitud'";
        $resultado = $this->conn->query($sql);
        $this->desconectarBD();

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function rechazarAlumno($id_solicitud, $respuesta)
    {
        $this->conectarBD();
        $sql = "UPDATE solicitud_alumno SET estado_solicitud = 'Rechazado', respuesta = '$respuesta' WHERE id_solicitud = '$id_solicitud'";
        $resultado = $this->conn->query($sql);
        $this->desconectarBD();

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }


    public function cambiarContrasena($passwordAntigua, $password, $password2, $id)
    {
        $this->conectarBD();

        $consultaPassActual = mysqli_query($this->conn, "SELECT password_user FROM usuario WHERE id_user = '$id'");
        $filaPassActual = mysqli_fetch_array($consultaPassActual);
        $passActual = $filaPassActual['password_user'];
        if ($passActual == $passwordAntigua) {
            if ($password == $password2) {
                $sql = "UPDATE usuario SET password_user = '$password' WHERE id_user = '$id'";
                $result = $this->conn->query($sql);
                $this->desconectarBD();
                if ($result) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return 0;
            }
        } else {
            return 2;
        }
    }

    public function cancelarClaseTeorica($id_clase, $motivo)
    {
        $this->conectarBD();
        $sql = "UPDATE clase_teorica SET estado = 'Cancelada', observacion_profe = '$motivo', color = '#e61919' WHERE id_clase_teorica = '$id_clase'";
        $resultado = $this->conn->query($sql);
        $this->desconectarBD();

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }


    public function reagendarClaseTeorica($id_clase, $comienzo, $termino)
    {
        $this->conectarBD();
        $sql = "UPDATE clase_teorica SET estado = 'Ocupado', observacion_profe = 'Sin observaciones', comienzo = '$comienzo', termino = '$termino' WHERE id_clase_teorica = '$id_clase'";
        $resultado = $this->conn->query($sql);
        $this->desconectarBD();

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function finalizarClaseTeorica($id_clase, $motivo)
    {
        $this->conectarBD();
        $sql = "UPDATE clase_teorica SET estado = 'Finalizada', observacion_profe = '$motivo', color = '#00ff88' WHERE id_clase_teorica = '$id_clase'";
        $resultado = $this->conn->query($sql);
        $this->desconectarBD();

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function finalizarClaseTeoricaSinObservacion($id_clase)
    {
        $this->conectarBD();
        $sql = "UPDATE clase_teorica SET estado = 'Finalizada', observacion_profe = 'Sin observaciones', color = '#00ff88' WHERE id_clase_teorica = '$id_clase'";
        $resultado = $this->conn->query($sql);
        $this->desconectarBD();

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function cancelarClasePractica($id_clase, $motivo)
    {
        $this->conectarBD();
        $sql = "UPDATE clase_practica SET estado = 'Cancelada', observacion_profe = '$motivo', color = '#e61919' WHERE id_clase_practica = '$id_clase'";
        $resultado = $this->conn->query($sql);
        $this->desconectarBD();

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }


    public function reagendarClasePractica($id_clase, $comienzo, $termino)
    {
        $this->conectarBD();
        $sql = "UPDATE clase_practica SET estado = 'Ocupado', observacion_profe = 'Sin Observaciones', comienzo = '$comienzo', termino = '$termino' WHERE id_clase_practica = '$id_clase'";
        $resultado = $this->conn->query($sql);
        $this->desconectarBD();

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function finalizarClasePractica($id_clase, $motivo)
    {
        $this->conectarBD();
        $sql = "UPDATE clase_practica SET estado = 'Finalizada', observacion_profe = '$motivo', color = '#00ff88' WHERE id_clase_practica = '$id_clase'";
        $resultado = $this->conn->query($sql);
        $this->desconectarBD();

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function finalizarClasePracticaSinObservacion($id_clase)
    {
        $this->conectarBD();
        $sql = "UPDATE clase_practica SET estado = 'Finalizada', observacion_profe = 'Sin observaciones', color = '#00ff88' WHERE id_clase_practica = '$id_clase'";
        $resultado = $this->conn->query($sql);
        $this->desconectarBD();

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function buscarAlumClase($id)
    {
        $this->conectarBD();

        $sql = "SELECT fk_alumno_id
        FROM clase_teorica
        WHERE id_clase_teorica = '$id'";
        $resultado = $this->conn->query($sql);

        $this->desconectarBD();
        return $resultado;
    }

    public function buscarAlumClasePractica($id)
    {
        $this->conectarBD();

        $sql = "SELECT fk_alumno_id
        FROM clase_practica
        WHERE id_clase_practica = '$id'";
        $resultado = $this->conn->query($sql);

        $this->desconectarBD();
        return $resultado;
    }

    public function buscarAlumn($id)
    {
        $this->conectarBD();

        $sql_select = "SELECT fk_usuario_id as id_usuario FROM alumno WHERE id_alum = '$id'";
        $resulta = mysqli_query($this->conn, $sql_select);
        $row = mysqli_fetch_assoc($resulta);

        $id_usuario = $row['id_usuario'];

        $sql2 = "SELECT * FROM usuario WHERE id_user = '$id_usuario'";
        $resultado2 = mysqli_query($this->conn, $sql2);

        $lista = array();

        while ($r = mysqli_fetch_assoc($resultado2)) {
            $nombre = $r['nombre'];
            $correo = $r['correo'];

            // Agregar al final del array para no sobrescribir
            $lista[] = $nombre;
            $lista[] = $correo;
        }

        $this->desconectarBD();
        return $lista;
    }
    public function contadorClasesTeoricasFin($id, $id_solicitud)
    {
        $this->conectarBD();

        $sql = "SELECT COUNT(*) AS clasesTotal
                FROM clase_teorica
                WHERE fk_alumno_id = '$id' AND estado = 'Finalizada' AND fk_solicitud_id= '$id_solicitud'";
        $resultado = $this->conn->query($sql);
        $row = $resultado->fetch_assoc();

        $this->desconectarBD();
        return $row['clasesTotal'];
    }
    public function contadorClasesPracticasFin($id, $id_solicitud)
    {
        $this->conectarBD();

        $sql = "SELECT COUNT(*) AS clasesTotal
                FROM clase_practica
                WHERE fk_alumno_id = '$id' AND estado = 'Finalizada' AND fk_solicitud_id= '$id_solicitud'";
        $resultado = $this->conn->query($sql);
        $row = $resultado->fetch_assoc();

        $this->desconectarBD();
        return $row['clasesTotal'];
    }

    public function habilitarPractica($id, $id_profe)
    {
        $this->conectarBD();
        $sql = "UPDATE solicitud_alumno SET estado_clase = 'Práctico' WHERE fk_alumno_id = $id AND fk_profesor_id = $id_profe";
        $resultado = $this->conn->query($sql);
        $this->desconectarBD();

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }



    public function finalizarCurso($id, $id_profe)
    {
        $this->conectarBD();
        $sql = "UPDATE solicitud_alumno SET estado_clase = 'Finalizado' WHERE fk_alumno_id = $id AND fk_profesor_id = $id_profe";
        $resultado = $this->conn->query($sql);
        $this->desconectarBD();

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
    public function calificar($id_profe, $puntaje, $id_alumno, $observacion)
    {
        $this->conectarBD();
        $sql = "INSERT INTO calificaciones_profesores VALUES(null, $puntaje, '$observacion', $id_alumno, $id_profe)";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
        $this->desconectarBD();
    }
    public function estado_solicitud_calificar($id_solicitud)
    {
        $this->conectarBD();
        $sql = "UPDATE solicitud_alumno SET estado_clase = 'Calificado' WHERE id_solicitud = '$id_solicitud'";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
        $this->desconectarBD();
    }

    public function contadorFinalizado($id)
    {
        $this->conectarBD();
    
        $sql = "SELECT COUNT(*) AS finalizados
            FROM solicitud_alumno
            WHERE fk_alumno_id = $id AND (estado_clase = 'Finalizado' OR estado_clase = 'Calificado')";
        $resultado = $this->conn->query($sql);
        $row = $resultado->fetch_assoc();
    
        $this->desconectarBD();
        return $row['finalizados'];
    }

    public function enviarSolicitudExtra($id_alumno, $id_profesor, $observacion)
    {
        $this->conectarBD();

        $sql = "INSERT INTO solicitud_alumno VALUES(null, $id_alumno, $id_profesor, 'Pendiente', '$observacion', 'Práctica', 'Clase Extra')";
        $result = $this->conn->query($sql);

        $sql_select = "SELECT MAX(id_solicitud) AS ultima_solicitud FROM solicitud_alumno";
        $resulta = mysqli_query($this->conn, $sql_select);
        $row = mysqli_fetch_assoc($resulta);

        $id_solicitud = $row['ultima_solicitud'];

        $sql2 = "INSERT INTO pagos VALUES(null, $id_solicitud, 24000, null, 'Pendiente')";
        $result2 = $this->conn->query($sql2);



        $this->desconectarBD();
        if ($result === true && $result2 === true) {
            return true;
        } else {
            return false;
        }
    }

    public function getVehiculos($id_profesor)
    {
        $this->conectarBD();

        $sql = "SELECT id_auto, patente, modelo
        FROM vehiculo
        WHERE fk_profesor_id = '$id_profesor' AND estado_auto = 1";
        $query = $this->conn->query($sql);
        //echo $query;
        return $query;
    }

    public function buscarProfesorPorId($id)
    {
        $this->conectarBD();

        $sql = "SELECT * FROM profesor WHERE id_prof = $id";
        $resultado = $this->conn->query($sql);

        $lista = array();

        while ($r = mysqli_fetch_array($resultado)) {
            $experiencia = $r['experiencia'];
            $licencia = $r['licencia'];
            $cedula = $r['cedula'];
            $hojaDeVida = $r['hojaDeVida'];
            $capacitacion = $r['capacitacion'];
            $semep = $r['semep'];
            $descripcion_prof = $r['descripcion_prof'];
            $descripcion_clase = $r['descripcion_clase'];

            $lista[0] = $experiencia;
            $lista[1] = $licencia;
            $lista[2] = $cedula;
            $lista[3] = $hojaDeVida;
            $lista[4] = $capacitacion;
            $lista[5] = $semep;
            $lista[6] = $descripcion_prof;
            $lista[7] = $descripcion_clase;

        }
        $this->desconectarBD();
        return $lista;
    }

    public function actualizarlicencia($licencia, $id_profe)
    {
        $this->conectarBD();
        $sql = "UPDATE profesor SET licencia = '$licencia' WHERE id_prof = $id_profe";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
        $this->desconectarBD();
    }

    public function actualizarCedula($cedula, $id_profe)
    {
        $this->conectarBD();
        $sql = "UPDATE profesor SET cedula = '$cedula' WHERE id_prof = $id_profe";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
        $this->desconectarBD();
    }

    public function actualizarHojaVida($hojaVida, $id_profe)
    {
        $this->conectarBD();
        $sql = "UPDATE profesor SET hojaDeVida = '$hojaVida' WHERE id_prof = $id_profe";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
        $this->desconectarBD();
    }

    public function actualizarCapacitacion($capacitacion, $id_profe)
    {
        $this->conectarBD();
        $sql = "UPDATE profesor SET capacitacion = '$capacitacion' WHERE id_prof = $id_profe";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
        $this->desconectarBD();
    }

    public function actualizarSemep($semep, $id_profe)
    {
        $this->conectarBD();
        $sql = "UPDATE profesor SET semep = '$semep' WHERE id_prof = $id_profe";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
        $this->desconectarBD();
    }

    /* 



        $lista = array();

        while ($r = mysqli_fetch_array($resultado)) {
            $nombre = $r['nombre'];
            $idUsuario = $r['id_user'];
            $telefono = $r['telefono'];
            $fechaN = $r['fecha_nacimiento'];
            $correo = $r['correo'];
            $permisos = $r['permisos'];
            $estado = $r['estado'];
            $imagen = $r['imagen'];
            $descripcion = $r['descripcion_prof'];
            $descripcion_alum = $r['descripcion_alum'];

            $lista[0] = $nombre;
            $lista[1] = $idUsuario;
            $lista[2] = $telefono;
            $lista[3] = $fechaN;
            $lista[4] = $correo;
            $lista[5] = $permisos;
            $lista[6] = $estado;
            $lista[7] = $descripcion;
            $lista[8] = $imagen;
            $lista[9] = $descripcion_alum;
        } */
}
