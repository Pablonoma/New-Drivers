<?php
include('../../../Logica/DAO/Alumno/DAO-Alumno.php');
session_start();
$dao = new Dao();

$passwordAntigua = $_POST['passwordAntigua'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$id = $_POST['id'];
if ($passwordAntigua == $password) {
    echo "same";
} else {
    if (preg_match('/^(?=.*[0-9])(?=.*[A-Z])(?=.*[^A-Za-z0-9]).{8,}/', $password)) {
        $resultado = $dao->cambiarContrasena($passwordAntigua, $password, $password2,$id);
        if ($resultado === true) {
            echo "success";
        } elseif ($resultado === 0) {
            echo "error_password";
        } elseif ($resultado === 2) {
            echo "bad_password";
        } else {
            echo "error";
        }
    } else {
        echo "short_password";
    }
}
