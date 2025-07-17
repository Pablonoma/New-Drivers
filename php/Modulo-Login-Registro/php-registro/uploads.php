<?php
if (isset($_FILES["licencia"]) && $_FILES["licencia"]["error"] == 0) {
  $nombre_archivo = $_FILES["licencia"]["name"];
  $nombre_temporal = $_FILES["licencia"]["tmp_name"];
  $ruta_destino = "uploads/" . $nombre_archivo;

  if (move_uploaded_file($nombre_temporal, $ruta_destino)) {
    echo "El archivo ha sido subido correctamente.";
  } else {
    echo "Hubo un error al subir el archivo.";
  }
}
?>