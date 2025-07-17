<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar el valor de la calificación desde el campo oculto
    $calificacionSeleccionada = $_POST['selected-rating'];
    
    // Ahora $calificacionSeleccionada contiene la calificación seleccionada (1 a 5)
    // Puedes utilizarla para guardarla en la base de datos o para otras operaciones
    echo "La calificación seleccionada es: " . $calificacionSeleccionada;
}
?>
