<?php 

session_start();
$_SESSION['solicitud'] = $_GET['solicitud'];
header('Location:https://app.payku.cl/p?a=16773p7dd6')

?>