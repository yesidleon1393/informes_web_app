<?php
require 'config.php'; // Incluye la configuración de la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe y escapa las entradas del formulario
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashea la contraseña
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Verifica si el nombre de usuario ya existe
    $checkUserQuery = "SELECT * FROM usuarios WHERE username = '$username'";
    $result = $conn->query($checkUserQuery);

    if ($result->num_rows > 0) {
        echo "<script>alert('El nombre de usuario ya está en uso, por favor elige otro.'); window.location.href = 'register.html';</script>";
    } else {
        // Inserta el nuevo usuario en la base de datos
        $insertQuery = "INSERT INTO usuarios (username, password, email) VALUES ('$username', '$password', '$email')";
        
        if ($conn->query($insertQuery) === TRUE) {
            echo "<script>alert('Usuario registrado con éxito.'); window.location.href = 'index.php';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
    $conn->close(); // Cierra la conexión a la base de datos
}
?>
