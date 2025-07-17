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
    public function MostrarUsuarios()
    {
        $this->conectarBD();
        $sql = "SELECT id_user, nombre, telefono, date_format(fecha_nacimiento, '%d/%m/%Y') as fecha_nacimiento, correo, estado FROM usuario WHERE permisos = 3";
        $resultado = $this->conn->query($sql);

        $usuarios = array(); // crea un array para almacenar los usuarios

        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $usuarios[] = $fila; // agrega cada fila a la lista de usuarios
            }
        }

        $this->desconectarBD();

        return $usuarios; // retorna la lista de usuarios
    }
    public function habilitarUsuario($id){
        $this->conectarBD();
        $sql = "UPDATE usuario SET estado = 1 WHERE id_user = '$id'";
        $resultado = $this->conn->query($sql);
        $this->desconectarBD();

        if ($resultado) {
            echo "success"; // Indica éxito
        } else {
            echo "error"; // Indica un error
        }
    }

    public function deshabilitarUsuario($id){
        $this->conectarBD();
        $sql = "UPDATE usuario SET estado = 0 WHERE id_user = '$id'";
        $resultado = $this->conn->query($sql);
        $this->desconectarBD();

        if ($resultado) {
            echo "success"; // Indica éxito
        } else {
            echo "error"; // Indica un error
        }
    }

    public function aceptarProfesor($id_user){
        $this->conectarBD();
        $sql = "UPDATE profesor SET aprobado = 2 WHERE fk_usuario_id = $id_user";
        $resultado = $this->conn->query($sql);
        $sql2 = "UPDATE usuario SET estado = 1 WHERE id_user = $id_user";
        $resultado2 = $this->conn->query($sql2);

        $this->desconectarBD();
        

        if ($resultado == true && $resultado2 == true) {
            echo "success"; // Indica éxito
        } else {
            echo "error"; // Indica un error
        }
    }

    public function habilitarVehiculo($id){
        $this->conectarBD();
        $sql = "UPDATE vehiculo SET estado_auto = 1 WHERE id_auto = '$id'";
        $resultado = $this->conn->query($sql);
        $this->desconectarBD();

        if ($resultado) {
            echo "success"; // Indica éxito
        } else {
            echo "error"; // Indica un error
        }
    }

    public function deshabilitarVehiculo($id){
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

    public function rechazarProfesor($id_user){
        $this->conectarBD();
        $sql = "UPDATE profesor SET aprobado = 0 WHERE fk_usuario_id = $id_user";
        $resultado = $this->conn->query($sql);
        $this->desconectarBD();

        if ($resultado) {
            echo "success"; // Indica éxito
        } else {
            echo "error"; // Indica un error
        }
    }

    public function editarAlumno($id_user, $nombre, $telefono, $fecha_nacimiento, $correo, $ubicacion){
        $this->conectarBD();
        $sql = "UPDATE usuario SET nombre = '$nombre', telefono = '$telefono', fecha_nacimiento = '$fecha_nacimiento', correo = '$correo', ubicacion = '$ubicacion' WHERE id_user = '$id_user'";
        $resultado = $this->conn->query($sql);
        
        $this->desconectarBD();

        if ($resultado === true) {
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

    public function editarPerfil($nombre, $telefono, $fecha_nacimiento, $correo, $imagen, $id, $ubicacion)
    {
        $this->conectarBD();

        $sql = "UPDATE usuario SET nombre = '$nombre', telefono = '$telefono', fecha_nacimiento = '$fecha_nacimiento', correo = '$correo',
                                            imagen = '$imagen', ubicacion = '$ubicacion' WHERE id_user = '$id'";
        $result = $this->conn->query($sql);

        $this->desconectarBD();
        if ($result) {
            return true;
        } else {
            return false;
        }
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


}
