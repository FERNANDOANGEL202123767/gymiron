<?php
require '../../include/db_conn.php';
page_protect();

// Puerto serial y velocidad de conexión
$port = 'COM4';
$baud = 9600;

// Conexión con el puerto serial
$serial = fopen($port, $baud);

if($serial !== false) {
    // Envía un mensaje para activar el lector de huellas
    fwrite($serial, "activate");
    sleep(2); // Espera 2 segundos para que el lector de huellas procese la activación
    
    // Lee la respuesta del lector de huellas
    $response = fread($serial, 1024);
    
    // Cierra la conexión con el puerto serial
    fclose($serial);
    
    // Verifica si se activó correctamente el lector de huellas
    if($response == "activated") {
        // Simula la asignación de un ID de huella (puedes cambiar esto según la lógica de tu aplicación)
        $idHuella = mt_rand(1000, 9999);
        
        // Guarda el ID de la huella en la tabla huellas_digitales
        $query = "INSERT INTO huellas_digitales (id_huella) VALUES ('$idHuella')";
        mysqli_query($con, $query);
        
        // Devuelve el ID de la huella
        echo $idHuella;
    } else {
        echo "Error al activar el lector de huellas";
    }
} else {
    echo "Error al conectar con el puerto serial";
}
?>
