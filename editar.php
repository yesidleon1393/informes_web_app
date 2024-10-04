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
    <title>Editar Informe de Calidad</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Incluye FontAwesome para los iconos y spinners -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Opcional: Tu archivo CSS personalizado -->
    <link rel="stylesheet" href="styles.css">
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
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    
    <section id="formulario-informe" class="container">
        <form id="myForm" method="POST" class="row g-3">
            <div class="col-12">
                <h3 class="section-title">Información de la instalación</h3>
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
            <div class="col-12">
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
            <div class="col-12">
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
                <label for="itubo_cargatrabajopacientes" class="form-label">Carga de Trabajo x Pacientes</label>
                <input type="text" class="form-control" id="itubo_cargatrabajopacientes" name="itubo_cargatrabajopacientes">
            </div>
            <div class="col-md-6">
                <label for="itubo_cargatrabajo_mamin" class="form-label">Carga de Trabajo (mAmin)</label>
                <input type="text" class="form-control" id="itubo_cargatrabajo_mamin" name="itubo_cargatrabajo_mamin">
            </div>
            <div class="col-md-6">
                <label for="itubo_focofinogrueso" class="form-label">Foco Fino/Grueso del Tubo</label>
                <input type="text" class="form-control" id="itubo_focofinogrueso" name="itubo_focofinogrueso">
            </div>
            <div class="col-12">
                <h3 class="section-title"></h3>
            </div>
            <!-- Figuras 1 y 2 -->
            <div class="col-md-6 image-container">
                <label for="figura1" class="form-label">Etiqueta equipo Rx (1x1)</label>
                <input type="file" class="form-control" id="figura1" name="figura1">
            </div>
            <div class="col-md-6 image-container">
                <label for="figura2" class="form-label">Etiqueta tubo Rx (1x1)</label>
                <input type="file" class="form-control" id="figura2" name="figura2">
            </div>

            <div class="col-12">
                <h3 class="section-title">Información de Equipamento de Medición</h3>
            </div>
            <div class="col-md-6">
                <label for="eq_marca" class="form-label">Marca del Equipo</label>
                <input type="text" class="form-control" id="eq_marca" name="eq_marca">
            </div>
            <div class="col-md-6">
                <label for="eq_modelo" class="form-label">Modelo del Equipo</label>
                <input type="text" class="form-control" id="eq_modelo" name="eq_modelo">
            </div>
            <div class="col-md-6">
                <label for="eq_serie" class="form-label">Número de Serie del Equipo</label>
                <input type="text" class="form-control" id="eq_serie" name="eq_serie">
            </div>
            <div class="col-md-6">
                <label for="eq_calibracion" class="form-label">Fecha de Calibración del Equipo</label>
                <input type="text" class="form-control" id="eq_calibracion" name="eq_calibracion">
            </div>
            <div class="col-12">
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
            <!-- Figuras 3 y 4 -->
            <div class="col-12">
                <h3 class="section-title">Montaje para levantamiento radiométrico</h3>
            </div> 
            <div class="col-md-6 image-container">
                <label for="figura3" class="form-label">Montaje Radiometría (9x16)</label>
                <input type="file" class="form-control" id="figura3" name="figura3">
            </div>
            <div class="col-md-6 image-container">
                <label for="figura4" class="form-label">Esquema Radiometría (16x9)</label>
                <input type="file" class="form-control" id="figura4" name="figura4">
            </div>
            <!-- Figura 5 -->
            <div class="col-12">
                <h3 class="section-title">Radiación de Fuga</h3>
            </div>
            <div class="col-md-6 image-container">
                <label for="figura5" class="form-label">Montaje Radiación de Fuga (1x1)</label>
                <input type="file" class="form-control" id="figura5" name="figura5">
            </div>
            <!-- Figura 6 y 7 -->
            <div class="col-12">
                <h3 class="section-title">Perpendicularidad del Haz Central</h3>
            </div>
            <div class="col-md-6 image-container">
                <label for="figura6" class="form-label">Montaje BATT (9x16)</label>
                <input type="file" class="form-control" id="figura6" name="figura6">
            </div>
            <div class="col-md-6 image-container">
                <label for="figura7" class="form-label">Resultado BATT (1x1)</label>
                <input type="file" class="form-control" id="figura7" name="figura7">
            </div>
            <!-- Figura 8 y 9 -->
            <div class="col-12">
                <h3 class="section-title">Coincidencia del campo luminoso con el campo de Radiación</h3>
            </div>
            <div class="col-md-6 image-container">
                <label for="figura8" class="form-label">Montaje Luz-Radiación (9x16)</label>
                <input type="file" class="form-control" id="figura8" name="figura8">
            </div>
            <div class="col-md-6 image-container">
                <label for="figura9" class="form-label">Resultado Luz-Radiación (1x1)</label>
                <input type="file" class="form-control" id="figura9" name="figura9">
            </div>
            <!-- Figura 10 -->
            <div class="col-12">
                <h3 class="section-title">Repetibilidad y exactitud del valor nominal de la tensión del tubo</h3>
            </div>
            <div class="col-md-6 image-container">
                <label for="figura10" class="form-label">Montaje Tensión Tubo (9x16)</label>
                <input type="file" class="form-control" id="figura10" name="figura10">
            </div>
            <!-- Figura 11 12 12 izq-->
            <div class="col-12">
                <h3 class="section-title">Punto Focal</h3>
            </div>
            <div class="col-md-6 image-container">
                <label for="figura11" class="form-label">Montaje Punto Focal (9x16)</label>
                <input type="file" class="form-control" id="figura11" name="figura11">
            </div>
            <div class="col-md-6 image-container">
                <label for="figura12_izq" class="form-label">Imagen Foco Fino (1x1)</label>
                <input type="file" class="form-control" id="figura12_izq" name="figura12_izq">
            </div>
            <div class="col-md-6 image-container">
                <label for="figura13_der" class="form-label">Imagen Foco Grueso (1x1)</label>
                <input type="file" class="form-control" id="figura13_der" name="figura13_der">
            </div>
            <!-- Figura 13 14 -->
            <div class="col-12">
                <h3 class="section-title">Resolución de Alto Contraste</h3>
            </div>
            <div class="col-md-6 image-container">
                <label for="figura13" class="form-label">Alto contraste Primus A (1x1)</label>
                <input type="file" class="form-control" id="figura13" name="figura13">
            </div>            
            <div class="col-md-6 image-container">
                <label for="figura14" class="form-label">Función MTF Primus A (16x9)</label>
                <input type="file" class="form-control" id="figura14" name="figura14">
            </div>
            <!-- Figura 15 -->
            <div class="col-12">
                <h3 class="section-title">Resolución de Bajo Contraste</h3>
            </div>
            <div class="col-md-6 image-container">
                <label for="figura15" class="form-label">Bajo Contraste Primus A (16x9)</label>
                <input type="file" class="form-control" id="figura15" name="figura15">
            </div>
            <!-- Figura 16 -->
            <div class="col-12">
                <h3 class="section-title">Curva de Rendimiento</h3>
            </div>
            <div class="col-md-6 image-container">
                <label for="figura16" class="form-label">Gráfica Rendimiento (16x9)</label>
                <input type="file" class="form-control" id="figura16" name="figura16">
            </div>
            <div class="col-12">
                <button type="submit" id="updateButton" class="btn btn-primary">
                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                <span class="button-text">Actualizar Informe</span>
            </button>
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
                    .then(response => response.json())
                    .then(data => {
                        // Rellena cada campo con los datos recibidos
                        document.getElementById('id').value = data.id;
                        document.getElementById('nombre_equipo').value = data.nombre_equipo;
                        document.getElementById('marca_equipo').value = data.marca_equipo;
                        document.getElementById('modelo_equipo').value = data.modelo_equipo;
                        document.getElementById('numero_serie').value = data.numero_serie;
                        document.getElementById('fecha_evaluacion').value = data.fecha_evaluacion;
                        document.getElementById('nombre_cliente').value = data.nombre_cliente;
                        document.getElementById('direccion').value = data.direccion;
                        document.getElementById('telefono').value = data.telefono;
                        document.getElementById('nit').value = data.nit;
                        document.getElementById('rep_legal').value = data.rep_legal;
                        document.getElementById('persona_contacto').value = data.persona_contacto;
                        document.getElementById('cargo').value = data.cargo;
                        document.getElementById('correo_electronico').value = data.correo_electronico;
                        document.getElementById('fecha_fabricacion').value = data.fecha_fabricacion;
                        document.getElementById('operacion').value = data.operacion;
                        document.getElementById('sistema_adquisicion').value = data.sistema_adquisicion;
                        document.getElementById('ubicacion_equipo').value = data.ubicacion_equipo;
                        document.getElementById('itubo_marca').value = data.itubo_marca;
                        document.getElementById('itubo_modelo').value = data.itubo_modelo;
                        document.getElementById('itubo_serie').value = data.itubo_serie;
                        document.getElementById('itubo_tensionmax').value = data.itubo_tensionmax;
                        document.getElementById('itubo_corrientemax').value = data.itubo_corrientemax;
                        document.getElementById('itubo_fechafabricacion').value = data.itubo_fechafabricacion;
                        document.getElementById('itubo_cargatrabajopacientes').value = data.itubo_cargatrabajopacientes;
                        document.getElementById('itubo_cargatrabajo_mamin').value = data.itubo_cargatrabajo_mamin;
                        document.getElementById('itubo_focofinogrueso').value = data.itubo_focofinogrueso;
                        document.getElementById('eq_marca').value = data.eq_marca;
                        document.getElementById('eq_modelo').value = data.eq_modelo;
                        document.getElementById('eq_serie').value = data.eq_serie;
                        document.getElementById('eq_calibracion').value = data.eq_calibracion;
                        document.getElementById('multimetro_marca').value = data.multimetro_marca;
                        document.getElementById('multimetro_modelo').value = data.multimetro_modelo;
                        document.getElementById('multimetro_serie').value = data.multimetro_serie;
                        document.getElementById('detector_marca').value = data.detector_marca;
                        document.getElementById('detector_modelo').value = data.detector_modelo;
                        document.getElementById('detector_serie').value = data.detector_serie;
                        document.getElementById('detector_calibracion').value = data.detector_calibracion;
                        
                        // Mostrar los nombres de los archivos asignados a figuras
                        // Mostrar los nombres de los archivos asignados a figuras
if (data.figura1) {
    document.getElementById('figura1_label').innerText = `Archivo actual: ${data.figura1}`;
}
if (data.figura2) {
    document.getElementById('figura2_label').innerText = `Archivo actual: ${data.figura2}`;
}
if (data.figura3) {
    document.getElementById('figura3_label').innerText = `Archivo actual: ${data.figura3}`;
}
if (data.figura4) {
    document.getElementById('figura4_label').innerText = `Archivo actual: ${data.figura4}`;
}
if (data.figura5) {
    document.getElementById('figura5_label').innerText = `Archivo actual: ${data.figura5}`;
}
if (data.figura6) {
    document.getElementById('figura6_label').innerText = `Archivo actual: ${data.figura6}`;
}
if (data.figura7) {
    document.getElementById('figura7_label').innerText = `Archivo actual: ${data.figura7}`;
}
if (data.figura8) {
    document.getElementById('figura8_label').innerText = `Archivo actual: ${data.figura8}`;
}
if (data.figura9) {
    document.getElementById('figura9_label').innerText = `Archivo actual: ${data.figura9}`;
}
if (data.figura10) {
    document.getElementById('figura10_label').innerText = `Archivo actual: ${data.figura10}`;
}
if (data.figura11) {
    document.getElementById('figura11_label').innerText = `Archivo actual: ${data.figura11}`;
}
if (data.figura12_izq) {
    document.getElementById('figura12_izq_label').innerText = `Archivo actual: ${data.figura12_izq}`;
}
if (data.figura13_der) {
    document.getElementById('figura13_der_label').innerText = `Archivo actual: ${data.figura13_der}`;
}
if (data.figura13) {
    document.getElementById('figura13_label').innerText = `Archivo actual: ${data.figura13}`;
}
if (data.figura14) {
    document.getElementById('figura14_label').innerText = `Archivo actual: ${data.figura14}`;
}
if (data.figura15) {
    document.getElementById('figura15_label').innerText = `Archivo actual: ${data.figura15}`;
}
if (data.figura16) {
    document.getElementById('figura16_label').innerText = `Archivo actual: ${data.figura16}`;
}

                    })
                    .catch(error => console.error('Error:', error));
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
