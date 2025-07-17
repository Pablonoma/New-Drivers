<?php
$conn;

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "new_drivers";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass , $dbname);

if(!$conn)
{
	die("No hay conexion a la base de datos: ".mysqli_connect_error());	
}
