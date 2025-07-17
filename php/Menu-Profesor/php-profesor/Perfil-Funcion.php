<?php
include('../../../Logica/DAO/Profesor/DAO-Profesor.php');
session_start();
$dao = new Dao();

$file_name =  $_FILES['file']['name']; //getting file name
$tmp_name = $_FILES['file']['tmp_name']; //getting temp_name of file


if($file_name == null || $file_name == ''){
    $file_up_name = $_SESSION['imagen'];
}else{
    $file_up_name = time() . $file_name; //making file name dynamic by adding time before file name
}

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$correo = $_POST['correo'];
$descripcion = $_POST['descripcion'];
$ubicacion = $_POST['ubicacion'];
$experiencia = $_POST['experiencia'];
$descripcionClase = $_POST['descripcionClase'];
$id = $_POST['id'];

    $resultado = $dao->editarPerfil($nombre, $telefono, $fecha_nacimiento, $correo, $descripcion, $file_up_name, $id, $experiencia, $descripcionClase, $ubicacion);
        if ($resultado === true) {
            $_SESSION['nombre'] = $nombre;
            $_SESSION['telefono'] = $telefono;
            $_SESSION['fecha_nacimiento'] = $fecha_nacimiento;
            $_SESSION['correo'] = $correo;
            $_SESSION['descripcion'] = $descripcion;
            $_SESSION['ubicacion'] = $ubicacion;
            $_SESSION['imagen'] = $file_up_name;
            //$_SESSION['correo'] = $email; 
            echo "success";
            if($file_name == null || $file_name == ''){
            }else{
                move_uploaded_file($tmp_name, "../../../Logica/uploads/" . $file_up_name); //moving file to the specified folder with dynamic name                
            }

        }else {
            echo "error";
        }
    
