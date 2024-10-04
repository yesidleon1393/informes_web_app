<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "u710870102_informes"; // Cambia esto si tienes un nombre de usuario diferente
$password = "Informes@2024"; // Cambia esto si tienes una contraseña
$dbname = "u710870102_informes";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
