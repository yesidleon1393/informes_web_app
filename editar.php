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
    <title>Editar Informe de Calidad Equipo de Rayos X</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- Formula Math -->
    <script>
        function calculateWorkload() {
            const patientsPerWeek = document.getElementById('itubo_cargatrabajopacientes').value;
            const workload = patientsPerWeek * 2.5;
            document.getElementById('itubo_cargatrabajo_mamin').value = workload;
        }
    </script>

</head>
<body>
    <!-- Header -->
    <header class="bg-dark text-white py-3 mb-4">
        <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand" href="index.php">
                <h1 class="h3 mb-0">Medphys Apps</h1>
            </a>
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.php">
                                    <i class="fas fa-tachometer-alt"></i>
                                    <span class="nav-link-tooltip">Panel Administrativo</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="nuevo.php">
                                    <i class="fas fa-file"></i>
                                    <span class="nav-link-tooltip">Nuevo Informe</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register.php">
                                    <i class="fas fa-user-plus"></i>
                                    <span class="nav-link-tooltip">Nuevo Usuario</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://drive.google.com/drive/folders/1q2iLeKxOMRhh6ovDOh4KFesLuMEAH3Zr?usp=sharing">
                                    <i class="fab fa-google-drive"></i>
                                    <span class="nav-link-tooltip">Ir a Drive</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span class="nav-link-tooltip">Salir</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <section class="container mb-5">
        <h2 class="section-title">Edita aquí el informe de Calidad Equipo de Rayos X</h2>
        <p style="text-align:justify">Este formulario te permitirá crear un informe de calidad para un equipo de rayos X. Por favor, llena todos los campos requeridos. Para subir archivos, puedes usar el pc o el celular, recuerda siempre hacer clic en el botón "Guardar Informe".</p>
        <p style="text-align:justify">Nota: Los archivos deben ser imágenes en formato JPG o PNG y puedes guiarte por las medidas de la etiqueta.</p>
        <p>Puedes usar este menú para desplazarte por el formulario</p>
    <nav>
        <ul>
            <li><a href="#formulario-informe">Información del Cliente</a></li>
            <li><a href="#infoequipo">Información del Equipo de rayos X</a></li>
            <li><a href="#infotubo">Información del Tubo de rayos X</a></li>
            <li><a href="#monitor_radiacion">Información del Monitor de Radiación</a></li>
            <li><a href="#multidetector">Información del Multidetector</a></li>
            <li><a href="#levantamientoradiometrico">Levantamiento radiométrico</a></li>
            <li><a href="#radiacionfuga">Radiación de Fuga</a></li>
            <li><a href="#perpendicularidad">Perpendicularidad del Haz Central</a></li>
            <li><a href="#coincidencia">Coincidencia del campo luminoso con el campo de Radiación</a></li>
            <li><a href="#repetibilidad">Repetibilidad y exactitud del valor nominal de la tensión del tubo</a></li>
            <li><a href="#puntofocal">Punto Focal</a></li>
            <li><a href="#altocontraste">Resolución de Alto Contraste</a></li>
            <li><a href="#bajocontraste">Resolución de Bajo Contraste</a></li>
            <li><a href="#curvaderendimiento">Curva de Rendimiento</a></li>
        </ul>
    </nav>
    </section>
    
    <!-- Formulario informe de Rayos X -->

    <section id="formulario-informe" class="container">
        <form id="myForm" method="POST" class="row g-3">
            <div class="col-12">
                <h3 class="section-title">Información del Cliente</h3>
            </div>
            <div class="col-md-6">
                <input type="hidden" id="id" name="id" value="">
                <label for="fecha_evaluacion" class="form-label">Fecha de la Evaluación</label>
                <input type="date" class="form-control" id="fecha_evaluacion" name="fecha_evaluacion">
            </div>
            <div class="col-md-6">
                <label for="nombre_cliente" class="form-label">Nombre del Cliente</label>
                <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente">
            </div>
            <div class="col-md-6">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion">
            </div>
            <div class="col-md-6">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono">
            </div>
            <div class="col-md-6">
                <label for="nit" class="form-label">NIT o Cédula</label>
                <input type="text" class="form-control" id="nit" name="nit">
            </div>
            <div class="col-md-6">
                <label for="rep_legal" class="form-label">Representante Legal</label>
                <input type="text" class="form-control" id="rep_legal" name="rep_legal">
            </div>
            <div class="col-md-6">
                <label for="persona_contacto" class="form-label">Persona de Contacto</label>
                <input type="text" class="form-control" id="persona_contacto" name="persona_contacto">
            </div>
            <div class="col-md-6">
                <label for="cargo" class="form-label">Cargo</label>
                <input type="text" class="form-control" id="cargo" name="cargo">
            </div>
            <div class="col-md-6">
                <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo_electronico" name="correo_electronico">
            </div>
            <div class="col-12" id="infoequipo">
                <h3 class="section-title">Información del Equipo</h3>
            </div>
            <div class="col-md-6">
                <label for="nombre_equipo" class="form-label">Nombre del Equipo</label>
                <input type="text" class="form-control" id="nombre_equipo" name="nombre_equipo">
            </div>
            <div class="col-md-6">
                <label for="marca_equipo" class="form-label">Marca del Equipo</label>
                <input type="text" class="form-control" id="marca_equipo" name="marca_equipo">
            </div>
            <div class="col-md-6">
                <label for="modelo_equipo" class="form-label">Modelo del Equipo</label>
                <input type="text" class="form-control" id="modelo_equipo" name="modelo_equipo">
            </div>
            <div class="col-md-6">
                <label for="numero_serie" class="form-label">Número de Serie del Equipo</label>
                <input type="text" class="form-control" id="numero_serie" name="numero_serie">
            </div>
            <div class="col-md-6">
                <label for="fecha_fabricacion" class="form-label">Fecha de Fabricación</label>
                <input type="text" class="form-control" id="fecha_fabricacion" name="fecha_fabricacion">
            </div>
            <div class="col-md-6">
                <label for="operacion" class="form-label">Operación</label>
                <input type="text" class="form-control" id="operacion" name="operacion">
            </div>
            <div class="col-md-6">
                <label for="sistema_adquisicion" class="form-label">Sistema de Adquisición</label>
                <input type="text" class="form-control" id="sistema_adquisicion" name="sistema_adquisicion">
            </div>
            <div class="col-md-6">
                <label for="ubicacion_equipo" class="form-label">Ubicación del Equipo</label>
                <input type="text" class="form-control" id="ubicacion_equipo" name="ubicacion_equipo">
            </div>
            <!-- Figura 1 -->
            <div class="col-md-6 image-container">
                <label for="figura1" class="form-label">Etiqueta equipo Rx (1x1)</label>
                <input type="file" class="form-control" id="figura1" name="figura1">
                <div id="figura1_label" class="mb-2"></div>
            </div>
            <div class="col-12" id="infotubo">
                <h3 class="section-title">Información del tubo</h3>
            </div>
            <div class="col-md-6">
                <label for="itubo_marca" class="form-label">Marca del Tubo</label>
                <input type="text" class="form-control" id="itubo_marca" name="itubo_marca">
            </div>
            <div class="col-md-6">
                <label for="itubo_modelo" class="form-label">Modelo del Tubo</label>
                <input type="text" class="form-control" id="itubo_modelo" name="itubo_modelo">
            </div>
            <div class="col-md-6">
                <label for="itubo_serie" class="form-label">Número de Serie del Tubo</label>
                <input type="text" class="form-control" id="itubo_serie" name="itubo_serie">
            </div>
            <div class="col-md-6">
                <label for="itubo_tensionmax" class="form-label">Tensión Máxima del Tubo</label>
                <input type="text" class="form-control" id="itubo_tensionmax" name="itubo_tensionmax">
            </div>
            <div class="col-md-6">
                <label for="itubo_corrientemax" class="form-label">Corriente Máxima del Tubo</label>
                <input type="text" class="form-control" id="itubo_corrientemax" name="itubo_corrientemax">
            </div>
            <div class="col-md-6">
                <label for="itubo_fechafabricacion" class="form-label">Fecha de Fabricación del Tubo</label>
                <input type="text" class="form-control" id="itubo_fechafabricacion" name="itubo_fechafabricacion">
            </div>
            <div class="col-md-6">
                <label for="itubo_cargatrabajopacientes" class="form-label">Número de pacientes por semana</label>
                <input type="number" class="form-control" id="itubo_cargatrabajopacientes" name="itubo_cargatrabajopacientes" oninput="calculateWorkload()">
            </div>
            <div class="col-md-6">
                <label for="itubo_cargatrabajo_mamin" class="form-label">Carga de Trabajo (mA.min/semana)</label>
                <input type="number" class="form-control" id="itubo_cargatrabajo_mamin" name="itubo_cargatrabajo_mamin" readonly>
            </div>
            <div class="col-md-6">
                <label for="itubo_focofinogrueso" class="form-label">Foco Fino (mm)</label>
                <input type="text" class="form-control" id="itubo_focofinogrueso" name="itubo_focofinogrueso">
            </div>
            <div class="col-md-6">
                <label for="itubo_focofinogrueso2" class="form-label">Foco Grueso (mm)</label>
                <input type="text" class="form-control" id="itubo_focofinogrueso2" name="itubo_focofinogrueso2">
            </div>
            <!-- Figuras 2 -->
            <div class="col-md-6 image-container">
                <label for="figura2" class="form-label">Etiqueta tubo Rx (1x1)</label>
                <input type="file" class="form-control" id="figura2" name="figura2">
                <div id="figura2_label" class="mb-2"></div>
            </div>

            <div class="col-12" id="monitor_radiacion">
                <h3 class="section-title">Información del Monitor de Radiación</h3>
            </div>
            <div class="col-md-6">
                <label for="eq_marca" class="form-label">Marca del Monitor de Radiación</label>
                <input type="text" class="form-control" id="eq_marca" name="eq_marca">
            </div>
            <div class="col-md-6">
                <label for="eq_modelo" class="form-label">Modelo del Monitor de Radiación</label>
                <input type="text" class="form-control" id="eq_modelo" name="eq_modelo">
            </div>
            <div class="col-md-6">
                <label for="eq_serie" class="form-label">Número de Serie del Monitor de Radiación</label>
                <input type="text" class="form-control" id="eq_serie" name="eq_serie">
            </div>
            <div class="col-md-6">
                <label for="eq_calibracion" class="form-label">Fecha de Calibración</label>
                <input type="text" class="form-control" id="eq_calibracion" name="eq_calibracion">
            </div>
            <div class="col-12" id="multidetector">
                <h3 class="section-title">Información del Multidetector</h3>
            </div>
            <div class="col-md-6">
                <label for="multimetro_marca" class="form-label">Marca del Multímetro</label>
                <input type="text" class="form-control" id="multimetro_marca" name="multimetro_marca">
            </div>
            <div class="col-md-6">
                <label for="multimetro_modelo" class="form-label">Modelo del Multímetro</label>
                <input type="text" class="form-control" id="multimetro_modelo" name="multimetro_modelo">
            </div>
            <div class="col-md-6">
                <label for="multimetro_serie" class="form-label">Número de Serie del Multímetro</label>
                <input type="text" class="form-control" id="multimetro_serie" name="multimetro_serie">
            </div>
            <div class="col-12">
                <h3 class="section-title">Información del Detector</h3>
            </div>
            <div class="col-md-6">
                <label for="detector_marca" class="form-label">Marca del Detector</label>
                <input type="text" class="form-control" id="detector_marca" name="detector_marca">
            </div>
            <div class="col-md-6">
                <label for="detector_modelo" class="form-label">Modelo del Detector</label>
                <input type="text" class="form-control" id="detector_modelo" name="detector_modelo">
            </div>
            <div class="col-md-6">
                <label for="detector_serie" class="form-label">Número de Serie del Detector</label>
                <input type="text" class="form-control" id="detector_serie" name="detector_serie">
            </div>
            <div class="col-md-6">
                <label for="detector_calibracion" class="form-label">Fecha de Calibración del Detector</label>
                <input type="text" class="form-control" id="detector_calibracion" name="detector_calibracion">
            </div>
            <!-- Montaje para levantamiento radiométrico -->
            <div class="col-12" id="levantamientoradiometrico">
                <h3 class="section-title">Montaje para levantamiento radiométrico</h3>
            </div>
            <div class="col-md-6">
                <label for="objeto_prueba" class="form-label">Objeto de Prueba</label>
                <input type="text" class="form-control" id="objeto_prueba" name="objeto_prueba">
            </div>
            <div class="col-md-6">
                <label for="tension_kv" class="form-label">Tensión (kV)</label>
                <input type="text" class="form-control" id="tension_kv" name="tension_kv">
            </div>
            <div class="col-md-6">
                <label for="corriente_ma" class="form-label">Corriente (mA)</label>
                <input type="text" class="form-control" id="corriente_ma" name="corriente_ma">
            </div>
            <div class="col-md-6">
                <label for="carga_mas" class="form-label">Carga (mAs)</label>
                <input type="text" class="form-control" id="carga_mas" name="carga_mas">
            </div> 
            <div class="col-md-6 image-container">
                <label for="figura3" class="form-label">Montaje Radiometría (9x16)</label>
                <input type="file" class="form-control" id="figura3" name="figura3">
                <div id="figura3_label" class="mb-2"></div>
            </div>
            <div class="col-md-6 image-container">
                <label for="figura4" class="form-label">Esquema Radiometría (16x9)</label>
                <input type="file" class="form-control" id="figura4" name="figura4">
                <div id="figura4_label" class="mb-2"></div>
            </div>
            <!-- Sección Radiación de Fuga -->
            <div class="col-12" id="radiacionfuga">
                <h3 class="section-title">Radiación de Fuga</h3>
            </div>
            <div class="col-md-6">
                <label for="objeto_salida" class="form-label">Objeto que bloquea la salida del haz</label>
                <input type="text" class="form-control" id="objeto_salida" name="objeto_salida">
            </div>
            <div class="col-md-6">
                <label for="tension_fuga_kv" class="form-label">Tensión Fuga (kV)</label>
                <input type="text" class="form-control" id="tension_fuga_kv" name="tension_fuga_kv">
            </div>
            <div class="col-md-6">
                <label for="corriente_fuga_ma" class="form-label">Corriente Fuga (mA)</label>
                <input type="text" class="form-control" id="corriente_fuga_ma" name="corriente_fuga_ma">
            </div>
            <div class="col-md-6">
                <label for="carga_fuga_mas" class="form-label">Carga Fuga (mAs)</label>
                <input type="text" class="form-control" id="carga_fuga_mas" name="carga_fuga_mas">
            </div>
            <div class="col-md-6 image-container">
                <label for="figura5" class="form-label">Montaje Radiación de Fuga (1x1)</label>
                <input type="file" class="form-control" id="figura5" name="figura5">
                <div id="figura5_label" class="mb-2"></div>
            </div>
            <!-- Perpendicularidad del Haz Central -->
            <div class="col-12" id="perpendicularidad">
                <h3 class="section-title">Perpendicularidad del Haz Central</h3>
            </div>
            <div class="col-md-6 image-container">
                <label for="figura6" class="form-label">Montaje BATT (9x16)</label>
                <input type="file" class="form-control" id="figura6" name="figura6">
                <div id="figura6_label" class="mb-2"></div>
            </div>
            <div class="col-md-6 image-container">
                <label for="figura7" class="form-label">Resultado BATT (1x1)</label>
                <input type="file" class="form-control" id="figura7" name="figura7">
                <div id="figura7_label" class="mb-2"></div>
            </div>
            <!-- Coincidencia del campo luminoso con el campo de Radiación -->
            <div class="col-12" id="coincidencia">
                <h3 class="section-title">Coincidencia del campo luminoso con el campo de Radiación</h3>
            </div>
            <div class="col-md-6 image-container">
                <label for="figura8" class="form-label">Montaje Luz-Radiación (9x16)</label>
                <input type="file" class="form-control" id="figura8" name="figura8">
                <div id="figura8_label" class="mb-2"></div>
            </div>
            <div class="col-md-6 image-container">
                <label for="figura9" class="form-label">Resultado Luz-Radiación (1x1)</label>
                <input type="file" class="form-control" id="figura9" name="figura9">
                <div id="figura9_label" class="mb-2"></div>
            </div>
            <div class="col-md-6">
                <label for="distancia_foco" class="form-label">Distancia Foco-Objeto de prueba (cm)</label>
                <input type="text" class="form-control" id="distancia_foco" name="distancia_foco">
            </div>
            <!-- Repetibilidad y exactitud del valor nominal de la tensión del tubo -->
            <div class="col-12" id="repetibilidad">
                <h3 class="section-title">Repetibilidad y exactitud del valor nominal de la tensión del tubo</h3>
            </div>
            <div class="col-md-6">
                <label for="tecnica_frecuente" class="form-label">Técnica más frecuente</label>
                <input type="text" class="form-control" id="tecnica_frecuente" name="tecnica_frecuente">
            </div>
            <div class="col-md-6">
                <label for="tension_tension_kv" class="form-label">Tensión “Tensión” (kV)</label>
                <input type="text" class="form-control" id="tension_tension_kv" name="tension_tension_kv">
            </div>
            <div class="col-md-6">
                <label for="carga_tension_kv" class="form-label">Carga “Tensión” (kV)</label>
                <input type="text" class="form-control" id="carga_tension_kv" name="carga_tension_kv">
            </div>
            <div class="col-md-6">
                <label for="corriente_tension_kv" class="form-label">Corriente “Tensión” (kV)</label>
                <input type="text" class="form-control" id="corriente_tension_kv" name="corriente_tension_kv">
            </div>
            <div class="col-md-6">
                <label for="distancia_tension_cm" class="form-label">Distancia Foco-Detector “Tensión” (cm)</label>
                <input type="text" class="form-control" id="distancia_tension_cm" name="distancia_tension_cm">
            </div>
            <div class="col-md-6">
                <label for="valores_diferentes" class="form-label">Valores diferentes de Carga/Corriente</label>
                <input type="text" class="form-control" id="valores_diferentes" name="valores_diferentes">
            </div>
            <div class="col-md-6 image-container">
                <label for="figura10" class="form-label">Montaje Tensión Tubo (9x16)</label>
                <input type="file" class="form-control" id="figura10" name="figura10">
                <div id="figura10_label" class="mb-2"></div>
            </div>
            <!-- Punto Focal-->
            <div class="col-12" id="puntofocal">
                <h3 class="section-title">Punto Focal</h3>
            </div>
            <div class="col-md-6">
                <label for="distancia_estrella" class="form-label">Distancia Foco-Patrón de Estrella (cm)</label>
                <input type="text" class="form-control" id="distancia_estrella" name="distancia_estrella">
            </div>
            <div class="col-md-6">
                <label for="distancia_foco_imagen" class="form-label">Distancia Foco-Detector de Imagen (cm)</label>
                <input type="text" class="form-control" id="distancia_foco_imagen" name="distancia_foco_imagen">
            </div>
            <div class="col-md-6 image-container">
                <label for="figura11" class="form-label">Montaje Punto Focal (9x16)</label>
                <input type="file" class="form-control" id="figura11" name="figura11">
                <div id="figura11_label" class="mb-2"></div>
            </div>
            <div class="col-md-6 image-container">
                <label for="figura12_izq" class="form-label">Imagen Foco Fino (1x1)</label>
                <input type="file" class="form-control" id="figura12_izq" name="figura12_izq">
                <div id="figura12_izq_label" class="mb-2"></div>
            </div>
            <div class="col-md-6 image-container">
                <label for="figura13_der" class="form-label">Imagen Foco Grueso (1x1)</label>
                <input type="file" class="form-control" id="figura13_der" name="figura13_der">
                <div id="figura13_der_label" class="mb-2"></div>
            </div>
            <!-- Resolución de Alto Contraste -->
            <div class="col-12" id="altocontraste">
                <h3 class="section-title">Resolución de Alto Contraste</h3>
            </div>
            <div class="col-md-6 image-container">
                <label for="figura13" class="form-label">Alto contraste Primus A (1x1)</label>
                <input type="file" class="form-control" id="figura13" name="figura13">
                <div id="figura13_label" class="mb-2"></div>
            </div>            
            <div class="col-md-6 image-container">
                <label for="figura14" class="form-label">Función MTF Primus A (16x9)</label>
                <input type="file" class="form-control" id="figura14" name="figura14">
                <div id="figura14_label" class="mb-2"></div>
            </div>
            <!-- Resolución de Bajo Contraste -->
            <div class="col-12" id="bajocontraste">
                <h3 class="section-title">Resolución de Bajo Contraste</h3>
            </div>
            <div class="col-md-6 image-container">
                <label for="figura15" class="form-label">Bajo Contraste Primus A (16x9)</label>
                <input type="file" class="form-control" id="figura15" name="figura15">
                <div id="figura15_label" class="mb-2"></div>
            </div>
            <div class="col-md-6">
                <label for="numero_objetos" class="form-label">Número de objetos de bajo contraste visibles</label>
                <input type="text" class="form-control" id="numero_objetos" name="numero_objetos">
            </div>
            <!-- Figura 16 -->
            <div class="col-12" id="curvaderendimiento">
                <h3 class="section-title">Curva de Rendimiento</h3>
            </div>
            <div class="col-md-6 image-container">
                <label for="figura16" class="form-label">Gráfica Rendimiento (16x9)</label>
                <input type="file" class="form-control" id="figura16" name="figura16">
                <div id="figura16_label" class="mb-2"></div>
            </div>
            <div class="col-12">
                <button type="submit" id="updateButton" class="btn btn-primary">
                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                <span class="button-text">Actualizar Informe</span>
            </button>
            </div>
            <div class="col-12">
                <h3 class="section-title"></h3>
            </div>

            
        </form>
    </section>

    <!-- Bootstrap JS (Opcional, pero recomendado para interactividad) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Tu archivo JS personalizado -->
    <script>
    // Función para obtener los datos de un informe basado en el ID
    function obtenerDatosInforme() {
        const urlParams = new URLSearchParams(window.location.search);
        const id = urlParams.get('id'); // Obtiene el ID de la URL

        if (id) {
            fetch(`obtener_informe.php?id=${id}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la respuesta del servidor');
                    }
                    return response.json();
                })
                .then(data => {
                    // Asegúrate de que el JSON contiene los datos esperados antes de asignar valores
                    if (data) {
                        // Rellena los campos si existen en el DOM y si los datos existen
                        const setFieldValue = (fieldId, value) => {
                            const field = document.getElementById(fieldId);
                            if (field && value !== undefined) {
                                field.value = value;
                            }
                        };

                        setFieldValue('id', data.id);
                        setFieldValue('nombre_equipo', data.nombre_equipo);
                        setFieldValue('marca_equipo', data.marca_equipo);
                        setFieldValue('modelo_equipo', data.modelo_equipo);
                        setFieldValue('numero_serie', data.numero_serie);
                        setFieldValue('fecha_evaluacion', data.fecha_evaluacion);
                        setFieldValue('nombre_cliente', data.nombre_cliente);
                        setFieldValue('direccion', data.direccion);
                        setFieldValue('telefono', data.telefono);
                        setFieldValue('nit', data.nit);
                        setFieldValue('rep_legal', data.rep_legal);
                        setFieldValue('persona_contacto', data.persona_contacto);
                        setFieldValue('cargo', data.cargo);
                        setFieldValue('correo_electronico', data.correo_electronico);
                        setFieldValue('fecha_fabricacion', data.fecha_fabricacion);
                        setFieldValue('operacion', data.operacion);
                        setFieldValue('sistema_adquisicion', data.sistema_adquisicion);
                        setFieldValue('ubicacion_equipo', data.ubicacion_equipo);
                        setFieldValue('itubo_marca', data.itubo_marca);
                        setFieldValue('itubo_modelo', data.itubo_modelo);
                        setFieldValue('itubo_serie', data.itubo_serie);
                        setFieldValue('itubo_tensionmax', data.itubo_tensionmax);
                        setFieldValue('itubo_corrientemax', data.itubo_corrientemax);
                        setFieldValue('itubo_fechafabricacion', data.itubo_fechafabricacion);
                        setFieldValue('itubo_cargatrabajopacientes', data.itubo_cargatrabajopacientes);
                        setFieldValue('itubo_cargatrabajo_mamin', data.itubo_cargatrabajo_mamin);
                        setFieldValue('itubo_focofinogrueso', data.itubo_focofinogrueso);
                        setFieldValue('itubo_focofinogrueso2', data.itubo_focofinogrueso2);
                        setFieldValue('objeto_prueba', data.objeto_prueba);
                        setFieldValue('tension_kv', data.tension_kv);
                        setFieldValue('corriente_ma', data.corriente_ma);
                        setFieldValue('carga_mas', data.carga_mas);
                        setFieldValue('objeto_salida', data.objeto_salida);
                        setFieldValue('tension_fuga_kv', data.tension_fuga_kv);
                        setFieldValue('corriente_fuga_ma', data.corriente_fuga_ma);
                        setFieldValue('carga_fuga_mas', data.carga_fuga_mas);
                        setFieldValue('distancia_foco', data.distancia_foco);
                        setFieldValue('tecnica_frecuente', data.tecnica_frecuente);
                        setFieldValue('tension_tension_kv', data.tension_tension_kv);
                        setFieldValue('carga_tension_kv', data.carga_tension_kv);
                        setFieldValue('corriente_tension_kv', data.corriente_tension_kv);
                        setFieldValue('distancia_tension_cm', data.distancia_tension_cm);
                        setFieldValue('valores_diferentes', data.valores_diferentes);
                        setFieldValue('distancia_estrella', data.distancia_estrella);
                        setFieldValue('distancia_foco_imagen', data.distancia_foco_imagen);
                        setFieldValue('numero_objetos', data.numero_objetos);
                        setFieldValue('eq_marca', data.eq_marca);
                        setFieldValue('eq_modelo', data.eq_modelo);
                        setFieldValue('eq_serie', data.eq_serie);
                        setFieldValue('eq_calibracion', data.eq_calibracion);
                        setFieldValue('multimetro_marca', data.multimetro_marca);
                        setFieldValue('multimetro_modelo', data.multimetro_modelo);
                        setFieldValue('multimetro_serie', data.multimetro_serie);
                        setFieldValue('detector_marca', data.detector_marca);
                        setFieldValue('detector_modelo', data.detector_modelo);
                        setFieldValue('detector_serie', data.detector_serie);
                        setFieldValue('detector_calibracion', data.detector_calibracion);

                        // Mostrar los nombres de los archivos asignados a figuras si existen
                        const setFileLabel = (labelId, fileName) => {
                            const label = document.getElementById(labelId);
                            if (label && fileName) {
                                label.innerText = `Archivo actual: ${fileName}`;
                            }
                        };

                        setFileLabel('figura1_label', data.figura1);
                        setFileLabel('figura2_label', data.figura2);
                        setFileLabel('figura3_label', data.figura3);
                        setFileLabel('figura4_label', data.figura4);
                        setFileLabel('figura5_label', data.figura5);
                        setFileLabel('figura6_label', data.figura6);
                        setFileLabel('figura7_label', data.figura7);
                        setFileLabel('figura8_label', data.figura8);
                        setFileLabel('figura9_label', data.figura9);
                        setFileLabel('figura10_label', data.figura10);
                        setFileLabel('figura11_label', data.figura11);
                        setFileLabel('figura12_izq_label', data.figura12_izq);
                        setFileLabel('figura13_der_label', data.figura13_der);
                        setFileLabel('figura13_label', data.figura13);
                        setFileLabel('figura14_label', data.figura14);
                        setFileLabel('figura15_label', data.figura15);
                        setFileLabel('figura16_label', data.figura16);
                    }
                })
                .catch(error => console.error('Error al obtener los datos:', error));
        }
    }

    // Llamada a la función para obtener datos cuando la página cargue
    window.onload = obtenerDatosInforme;
</script>
<script src="script2.js"></script>
    
</body>
</html>
</body>
</html>
