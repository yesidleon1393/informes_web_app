<?php
// eliminar_informe.php

// Incluye tu archivo de configuración
require 'config.php';

header('Content-Type: application/json');

// Verifica que se haya enviado un ID
if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    
    // Prepara la consulta para eliminar el informe
    $sql = "DELETE FROM informes WHERE id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        
        // Verifica si la eliminación fue exitosa
        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error en la eliminación']);
        }
        
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Error en la preparación de la consulta']);
    }
    
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'ID no proporcionado']);
}
