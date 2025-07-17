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

    public function enviarSolicitud($id_alumno, $id_profesor)
    {
        $this->conectarBD();

        $sql = "INSERT INTO solicitud_alumno VALUES(null, $id_alumno, $id_profesor, 'Pendiente', 'Sin Respuesta', 'Teórico', 'Clase Normal')";
        $result = $this->conn->query($sql);

        $sql_select = "SELECT MAX(id_solicitud) AS ultima_solicitud FROM solicitud_alumno";
        $resulta = mysqli_query($this->conn, $sql_select);
        $row = mysqli_fetch_assoc($resulta);

        $id_solicitud = $row['ultima_solicitud'];

        $sql2 = "INSERT INTO pagos VALUES(null, $id_solicitud, 180000, null, 'Pendiente')";
        $result2 = $this->conn->query($sql2);



        $this->desconectarBD();
        if ($result === true && $result2 === true) {
            return true;
        } else {
            return false;
        }
    }

    public function enviarSolicitudExtra($id_alumno, $id_profesor, $observacion)
    {
        $this->conectarBD();

        $sql = "INSERT INTO solicitud_alumno VALUES(null, $id_alumno, $id_profesor, 'Pendiente', '$observacion', 'Práctico', 'Clase Extra')";
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

    public function validarClaseFinalizada($id_alumno, $id_profesor)
    {
        $this->conectarBD();

        $sql = "SELECT COUNT(*) AS clase_finalizada
                FROM solicitud_alumno
                WHERE estado_clase != 'Finalizado' AND estado_solicitud = 'Aceptado' AND fk_alumno_id = '$id_alumno' AND fk_profesor_id = '$id_profesor'";
        $resultado = $this->conn->query($sql);
        $row = $resultado->fetch_assoc();

        $this->desconectarBD();
        return $row['clase_finalizada'];
    }

    public function contadorClasesTeoricas($id,$id_solicitud)
    {
        $this->conectarBD();

        $sql = "SELECT COUNT(*) AS clasesTotal
                FROM clase_teorica
                WHERE fk_alumno_id = '$id' AND fk_solicitud_id = '$id_solicitud'";
        $resultado = $this->conn->query($sql);
        $row = $resultado->fetch_assoc();

        $this->desconectarBD();
        return $row['clasesTotal'];
    }

    public function contadorClasesPracticas($id,$id_solicitud)
    {
        $this->conectarBD();

        $sql = "SELECT COUNT(*) AS clasesTotal
                FROM clase_practica
                WHERE fk_alumno_id = '$id' AND fk_solicitud_id = '$id_solicitud'";
        $resultado = $this->conn->query($sql);
        $row = $resultado->fetch_assoc();

        $this->desconectarBD();
        return $row['clasesTotal'];
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

    public function contactanos($asunto, $descripcion, $nombre, $telefono, $correo)
    {
        $this->conectarBD();
    }

    public function pagar($id)
    {
        $this->conectarBD();
        $sql = "UPDATE pagos SET estado_pago = 'Pagado', fecha_pago = NOW() WHERE solicitud_alumno_fk_id = '$id'";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
        $this->desconectarBD();
    }

    public function buscarNombreAlumno($id)
    {
        // Conectarse a la base de datos
        $this->conectarBD();

        // Consulta SQL para obtener el nombre del alumno basado en el ID
        $sql = "SELECT usuario.nombre 
            FROM alumno 
            INNER JOIN usuario ON alumno.fk_usuario_id = usuario.id_user 
            WHERE alumno.id_alum = '$id'";

        // Ejecutar la consulta
        $resultado = $this->conn->query($sql);

        // Verificar si hay resultados
        if ($resultado->num_rows > 0) {
            // Obtener el nombre del alumno
            $fila = $resultado->fetch_assoc();
            $nombreAlumno = $fila['nombre'];
        } else {
            // Si no se encuentra, devolver null o un mensaje de error
            $nombreAlumno = null;
        }

        // Desconectar de la base de datos
        $this->desconectarBD();

        // Retornar el nombre del alumno
        return $nombreAlumno;
    }

    public function contadorValoraciones($id)
    {
        $this->conectarBD();

        $sql = "SELECT COUNT(*) AS valoraciones_totales
            FROM calificaciones_profesores
            WHERE fk_profesor_id = '$id'";
        $resultado = $this->conn->query($sql);
        $row = $resultado->fetch_assoc();

        $this->desconectarBD();
        return $row['valoraciones_totales'];
    }

    public function sumadorValoraciones($id)
    {
        $this->conectarBD();

        $sql = "SELECT SUM(valoracion) AS suma_valoraciones
            FROM calificaciones_profesores
            WHERE fk_profesor_id = '$id'";
        $resultado = $this->conn->query($sql);
        $row = $resultado->fetch_assoc();

        $this->desconectarBD();
        return $row['suma_valoraciones'];
    }

    public function contadorAlumnosProfe($id)
    {
        $this->conectarBD();

        $sql = "SELECT COUNT(DISTINCT fk_alumno_id) AS alumnos_totales
                FROM solicitud_alumno
                WHERE fk_profesor_id = '$id' AND estado_solicitud = 'Aceptado';";
        $resultado = $this->conn->query($sql);
        $row = $resultado->fetch_assoc();

        $this->desconectarBD();
        return $row['alumnos_totales'];
    }

    public function contadorClasesTeoricasProfe($id)
    {
        $this->conectarBD();

        $sql = "SELECT COUNT(*) AS clasesTotal
                FROM clase_teorica
                WHERE fk_profesor_id = '$id'";
        $resultado = $this->conn->query($sql);
        $row = $resultado->fetch_assoc();

        $this->desconectarBD();
        return $row['clasesTotal'];
    }

    public function contadorClasesPracticasProfe($id)
    {
        $this->conectarBD();

        $sql = "SELECT COUNT(*) AS clasesTotal
                FROM clase_practica
                WHERE fk_profesor_id = '$id'";
        $resultado = $this->conn->query($sql);
        $row = $resultado->fetch_assoc();

        $this->desconectarBD();
        return $row['clasesTotal'];
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

    public function editarPerfil($nombre, $telefono, $fecha_nacimiento, $correo, $descripcion, $imagen, $id, $ubicacion)
    {
        $this->conectarBD();

        $sql = "UPDATE usuario SET nombre = '$nombre', telefono = '$telefono', fecha_nacimiento = '$fecha_nacimiento', correo = '$correo',
                                            imagen = '$imagen', ubicacion = '$ubicacion' WHERE id_user = '$id'";
        $result = $this->conn->query($sql);

        $sql2 = "UPDATE Alumno SET descripcion_alum = '$descripcion' WHERE fk_usuario_id = '$id'";
        $result2 = $this->conn->query($sql2);

        $this->desconectarBD();
        if ($result && $result2) {
            return true;
        } else {
            return false;
        }
    }

    public function editarAlumno($id_user, $nombre, $telefono, $fecha_nacimiento, $correo, $ubicacion){
        $this->conectarBD();
        $sql = "UPDATE usuario SET nombre = '$nombre', telefono = $telefono, fecha_nacimiento = '$fecha_nacimiento', correo = '$correo', ubicacion = '$ubicacion' WHERE id_user = '$id_user'";
        $resultado = $this->conn->query($sql);
        
        $this->desconectarBD();

        if ($resultado === true) {
            return true;
        } else {
            return false;
        }
    }

}
