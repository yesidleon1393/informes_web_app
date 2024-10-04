<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html"); // Redirige a la página de inicio de sesión si no está autenticado
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo - Informes</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Incluye FontAwesome para los iconos y spinners -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header class="bg-dark text-white py-3 mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">Medphys Apps</h1>
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Panel Admin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="nuevo.php">Nuevo Informe</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register.php">Nuevo Usuario</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Salir</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header> 

    <section id="formulario-informe" class="container">
        <h2 class="mb-4">Informes Existentes</h2>
        <button id="updateButton" class="btn btn-primary mb-3">Actualizar</button>
        <div class="table-responsive">
            <table id="informesTable" class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre Equipo</th>
                        <th>Nombre Cliente</th>
                        <th>Fecha Evaluación</th>
                        <th>Contacto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="informes">
                    <!-- Aquí se cargarán los informes -->
                </tbody>
            </table>
        </div>
        <!-- Cargador -->
    </section>



    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <!-- Archivo JS personalizado -->
    <script defer src="panel_administrativo.js"></script>
</body>
</html>
