<?php 

session_start();
$_SESSION['solicitud'] = $_GET['solicitud'];
header('Location:https://app.payku.cl/p?a=16773pf3c8')

?>