<?php
header('Content-Type: application/json');

// Incluir el archivo de configuración
include 'config.php';

try {
    // Consultar la base de datos usando el nombre correcto de la tabla
    $query = "SELECT * FROM informes";
    $result = $conn->query($query);

    // Verificar si la consulta fue exitosa
    if (!$result) {
        throw new Exception("Error en la consulta: " . $conn->error);
    }

    // Recuperar los resultados
    $informes = $result->fetch_all(MYSQLI_ASSOC);

    // Enviar los resultados como JSON agrupados bajo la clave 'informes'
    echo json_encode(['informes' => $informes]);
} catch (Exception $e) {
    // Manejar errores de conexión o consulta
    http_response_code(500); // Código de error 500: Error del servidor
    echo json_encode(['error' => 'Error al cargar los informes: ' . $e->getMessage()]);
}

// Cerrar la conexión
$conn->close();
?>
