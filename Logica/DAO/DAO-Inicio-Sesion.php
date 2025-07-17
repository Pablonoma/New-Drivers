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

    public function inicioSesion($correo, $password)
    {
        $this->conectarBD();

        $SQL_alumno = mysqli_query($this->conn, "SELECT * FROM usuario WHERE correo = '" . $correo . "' and password_user = '" . $password . "' and permisos = 3 and estado = 1;");
        $resultadoAlumno = mysqli_fetch_array($SQL_alumno);

        $SQL_profesor = mysqli_query($this->conn, "SELECT * FROM usuario WHERE correo = '" . $correo . "' and password_user = '" . $password . "' and permisos = 2 and estado = 1;");
        $resultadoProfesor = mysqli_fetch_array($SQL_profesor);

        $SQL_admin = mysqli_query($this->conn, "SELECT * FROM usuario WHERE correo = '" . $correo . "' and password_user = '" . $password . "' and permisos = 1 and estado = 1;");
        $resultadoAdmin = mysqli_fetch_array($SQL_admin);

        if ($resultadoAlumno != null) {
            return 1; //Se encontro un alumno
        } else if ($resultadoProfesor != 0) {
            return 2; //Se encontro un profesor
        } else if ($resultadoAdmin != 0) {
            return 3; //Se encontro un Super Admin
        } else {
            return 0; //No se encontro usuario
        }

        $this->desconectarBD();
    }


    public function buscarNombre($correo) 
    { 
        $this->conectarBD(); 

        $sql = "SELECT * 
        FROM usuario 
        LEFT JOIN profesor ON profesor.fk_usuario_id = usuario.id_user 
        LEFT JOIN alumno ON alumno.fk_usuario_id = usuario.id_user 
        WHERE correo = '$correo'"; 
        $resultado = $this->conn->query($sql); 

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
            $ubicacion = $r['ubicacion'];

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
            $lista[10] = $ubicacion;
        }
        $this->desconectarBD();
        return $lista;
    }


    public function registrarUsuario($nombre, $numero, $fechaN, $correo, $password, $password2, $ubicacion)
    {
        $this->conectarBD();

        if ($password == $password2) {
            $sql = "INSERT INTO usuario VALUES (null,'$nombre',$numero,'$fechaN','$correo','$ubicacion','$password',1,1,'fotoPerfil.jpg');";
            $result = $this->conn->query($sql);

            $sql_select = "SELECT MAX(id_user) AS ultimo_alumno FROM usuario";
            $resulta = mysqli_query($this->conn, $sql_select);
            $row = mysqli_fetch_assoc($resulta);

            $id = $row['ultimo_alumno'];
            $sql2 = "INSERT INTO alumno VALUES (null,'Soy Alumno Nuevo','$id')";
            $result2 = $this->conn->query($sql2);

            $this->desconectarBD();

            if ($result === true && $result2 === true) {
                return true;
            } else {
                return false;
            }
        } else {
            return 0;
        }
    }

    public function registrarProfesor(
        $nombre,
        $numero,
        $fechaN,
        $correo,
        $password,
        $password2,
        $experiencia,
        $archivo1,
        $archivo2,
        $archivo3,
        $archivo4,
        $archivo5,
        $descripcion,
        $ubicacion
    ) {
        $this->conectarBD();

        $sqlSelect = " SELECT COUNT(correo) AS count_correo FROM usuario WHERE correo = '$correo'";
        $resultselect = mysqli_query($this->conn, $sqlSelect);

        $row = mysqli_fetch_assoc($resultselect);
        $count = $row['count_correo'];

        if ($count == 0) {
            if ($password == $password2) {
                $sql = "INSERT INTO usuario VALUES (null,'$nombre',$numero,'$fechaN','$correo','$ubicacion','$password',2,0,'fotoPerfil.jpg');";
                $result = $this->conn->query($sql);

                $sql_select = "SELECT MAX(id_user) AS ultimo_profesor FROM usuario";
                $resulta = mysqli_query($this->conn, $sql_select);
                $row = mysqli_fetch_assoc($resulta);

                $id = $row['ultimo_profesor'];
                $sql2 = "INSERT INTO profesor VALUES (null,'$experiencia',null,'$archivo1','$archivo2','$archivo3','$archivo4','$archivo5','$descripcion','No se ha entregado información sobre la clase',1,'$id');";
                $result2 = $this->conn->query($sql2);

                $this->desconectarBD();

                if ($result === true && $result2 === true) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return 0;
            }
        }else{
            return 1;
        }
    }

    public function registrarProfesorSuperAdmin(
        $nombre,
        $numero,
        $fechaN,
        $correo,
        $password,
        $password2,
        $archivo1,
        $archivo2,
        $archivo3,
        $archivo4,
        $archivo5,
        $descripcion,
        $ubicacion,
        $experiencia
    ) {
        $this->conectarBD();

        $sqlSelect = " SELECT COUNT(correo) AS count_correo FROM usuario WHERE correo = '$correo'";
        $resultselect = mysqli_query($this->conn, $sqlSelect);

        $row = mysqli_fetch_assoc($resultselect);
        $count = $row['count_correo'];

        if ($count == 0) {
            if ($password == $password2) {
                $sql = "INSERT INTO usuario VALUES (null,'$nombre',$numero,'$fechaN','$correo','$password',2,1,'fotoPerfil.jpg', '$ubicacion');";
                $result = $this->conn->query($sql);

                $sql_select = "SELECT MAX(id_user) AS ultimo_profesor FROM usuario";
                $resulta = mysqli_query($this->conn, $sql_select);
                $row = mysqli_fetch_assoc($resulta);

                $id = $row['ultimo_profesor'];
                $sql2 = "INSERT INTO profesor VALUES (null,$experiencia,'$archivo1','$archivo2','$archivo3','$archivo4','$archivo5','$descripcion',2,'$id',null);";
                $result2 = $this->conn->query($sql2);

                $this->desconectarBD();

                if ($result === true && $result2 === true) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return 0;
            }
        }else{
            return 1;
        }
    }

    public function buscarProfe($id)
    {
        $this->conectarBD();

        $sql = "SELECT * FROM profesor WHERE fk_usuario_id = $id";
        $resultado = $this->conn->query($sql);

        $lista = array();

        while ($r = mysqli_fetch_array($resultado)) {
            $idUsuario = $r['id_prof'];

            $lista[0] = $idUsuario;

        }
        $this->desconectarBD();
        return $lista;
    }

    public function buscarAlumno($id)
    {
        $this->conectarBD();

        $sql = "SELECT * FROM alumno WHERE fk_usuario_id = $id";
        $resultado = $this->conn->query($sql);

        $lista = array();

        while ($r = mysqli_fetch_array($resultado)) {
            $idUsuario = $r['id_alum'];

            $lista[0] = $idUsuario;

        }
        $this->desconectarBD();
        return $lista;
    }

    

}
