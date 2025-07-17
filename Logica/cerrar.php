<?php
session_start(); 
session_destroy();
header('Location:../php/Modulo-Login-Registro/Login.php');
?>