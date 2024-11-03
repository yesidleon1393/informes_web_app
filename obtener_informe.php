<?php
// Obtener la conexión a la base de datos
include('config.php'); 

// Obtener el ID del informe desde la solicitud GET
$id = $_GET['id'];

// Preparar y ejecutar la consulta
$query = "SELECT * FROM informes WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

// Validar imágenes en los datos obtenidos
$imagenCampos = ['figura1', 'figura2', 'figura3', 'figura4', 'figura5', 'figura6', 'figura7', 'figura8', 'figura9', 'figura10', 'figura11', 'figura12_izq', 'figura13_der', 'figura13', 'figura14', 'figura15', 'figura16']; // Campos de las imágenes (ajustar según tu estructura)
foreach ($imagenCampos as $campo) {
    if (empty($data[$campo])) {
        $data[$campo] = 'uploads/plantilla.jpg';  // Puedes también agregar una URL de imagen por defecto
    }
}

// Devolver los datos como JSON
header('Content-Type: application/json');
echo json_encode($data);

$stmt->close();
$conn->close();
?>
