<?php
include 'config.php';

// Obtener datos del formulario
$id = $_POST['id'];
$nombre_equipo = $_POST['nombre_equipo'];
$marca_equipo = $_POST['marca_equipo'];
$modelo_equipo = $_POST['modelo_equipo'];
$numero_serie = $_POST['numero_serie'];
$fecha_evaluacion = $_POST['fecha_evaluacion'];
$nombre_cliente = $_POST['nombre_cliente'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$nit = $_POST['nit'];
$rep_legal = $_POST['rep_legal'];
$persona_contacto = $_POST['persona_contacto'];
$cargo = $_POST['cargo'];
$correo_electronico = $_POST['correo_electronico'];
$fecha_fabricacion = $_POST['fecha_fabricacion'];
$operacion = $_POST['operacion'];
$sistema_adquisicion = $_POST['sistema_adquisicion'];
$ubicacion_equipo = $_POST['ubicacion_equipo'];
$itubo_marca = $_POST['itubo_marca'];
$itubo_modelo = $_POST['itubo_modelo'];
$itubo_serie = $_POST['itubo_serie'];
$itubo_tensionmax = $_POST['itubo_tensionmax'];
$itubo_corrientemax = $_POST['itubo_corrientemax'];
$itubo_fechafabricacion = $_POST['itubo_fechafabricacion'];
$itubo_cargatrabajopacientes = $_POST['itubo_cargatrabajopacientes'];
$itubo_cargatrabajo_mamin = $_POST['itubo_cargatrabajo_mamin'];
$itubo_focofinogrueso = $_POST['itubo_focofinogrueso'];
$itubo_focofinogrueso2 = $_POST['itubo_focofinogrueso2'];
$objeto_prueba = $_POST['objeto_prueba'];
$tension_kv = $_POST['tension_kv'];
$corriente_ma = $_POST['corriente_ma'];
$carga_mas = $_POST['carga_mas'];
$objeto_salida = $_POST['objeto_salida'];
$tension_fuga_kv = $_POST['tension_fuga_kv'];
$corriente_fuga_ma = $_POST['corriente_fuga_ma'];
$carga_fuga_mas = $_POST['carga_fuga_mas'];
$distancia_foco = $_POST['distancia_foco'];
$tecnica_frecuente = $_POST['tecnica_frecuente'];
$tension_tension_kv = $_POST['tension_tension_kv'];
$carga_tension_kv = $_POST['carga_tension_kv'];
$corriente_tension_kv = $_POST['corriente_tension_kv'];
$distancia_tension_cm = $_POST['distancia_tension_cm'];
$valores_diferentes = $_POST['valores_diferentes'];
$distancia_estrella = $_POST['distancia_estrella'];
$distancia_foco_imagen = $_POST['distancia_foco_imagen'];
$numero_objetos = $_POST['numero_objetos'];
$eq_marca = $_POST['eq_marca'];
$eq_modelo = $_POST['eq_modelo'];
$eq_serie = $_POST['eq_serie'];
$eq_calibracion = $_POST['eq_calibracion'];
$multimetro_marca = $_POST['multimetro_marca'];
$multimetro_modelo = $_POST['multimetro_modelo'];
$multimetro_serie = $_POST['multimetro_serie'];
$detector_marca = $_POST['detector_marca'];
$detector_modelo = $_POST['detector_modelo'];
$detector_serie = $_POST['detector_serie'];
$detector_calibracion = $_POST['detector_calibracion'];

function subirArchivo($inputName) {
    if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES[$inputName]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Si el archivo ya existe, generar un nuevo nombre
        if (file_exists($target_file)) {
            $baseName = pathinfo($target_file, PATHINFO_FILENAME);
            $counter = 1;
            while (file_exists($target_file)) {
                $target_file = $target_dir . $baseName . "_" . $counter . "." . $imageFileType;
                $counter++;
            }
        }

        // Verifica el tamaño del archivo
        if ($_FILES[$inputName]["size"] > 50000000) {
            echo "El archivo es demasiado grande.";
            $uploadOk = 0;
        }

        // Permitir ciertos formatos de archivo
        $allowedTypes = array("jpg", "jpeg", "png", "gif", "pdf", "webp");
        if (!in_array($imageFileType, $allowedTypes)) {
            echo "Solo se permiten archivos JPG, JPEG, PNG, GIF, PDF y WEBP.";
            $uploadOk = 0;
        }

        // Si todo está bien, intenta subir el archivo
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES[$inputName]["tmp_name"], $target_file)) {
                return $target_file;
            } else {
                echo "Hubo un error al subir el archivo.";
            }
        }
    }
    return null;
}


// Procesar cada archivo
$figura1 = subirArchivo('figura1');
$figura2 = subirArchivo('figura2');
$figura3 = subirArchivo('figura3');
$figura4 = subirArchivo('figura4');
$figura5 = subirArchivo('figura5');
$figura6 = subirArchivo('figura6');
$figura7 = subirArchivo('figura7');
$figura8 = subirArchivo('figura8');
$figura9 = subirArchivo('figura9');
$figura10 = subirArchivo('figura10');
$figura11 = subirArchivo('figura11');
$figura12_izq = subirArchivo('figura12_izq');
$figura13_der = subirArchivo('figura13_der');
$figura13 = subirArchivo('figura13');
$figura14 = subirArchivo('figura14');
$figura15 = subirArchivo('figura15');
$figura16 = subirArchivo('figura16');

// Consulta SQL
// Verifica si el ID ya existe
$sql_check = "SELECT id FROM informes WHERE id = '$id'";
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {
    // Si el ID existe, realiza un UPDATE
    $sql = "UPDATE informes SET 
        nombre_equipo='$nombre_equipo', 
        marca_equipo='$marca_equipo',
        modelo_equipo='$modelo_equipo',
        numero_serie='$numero_serie',
        fecha_evaluacion='$fecha_evaluacion',
        nombre_cliente='$nombre_cliente',
        direccion='$direccion',
        telefono='$telefono',
        nit='$nit',
        rep_legal='$rep_legal',
        persona_contacto='$persona_contacto',
        cargo='$cargo',
        correo_electronico='$correo_electronico',
        fecha_fabricacion='$fecha_fabricacion',
        operacion='$operacion',
        sistema_adquisicion='$sistema_adquisicion',
        ubicacion_equipo='$ubicacion_equipo',
        itubo_marca='$itubo_marca',
        itubo_modelo='$itubo_modelo',
        itubo_serie='$itubo_serie',
        itubo_tensionmax='$itubo_tensionmax',
        itubo_corrientemax='$itubo_corrientemax',
        itubo_fechafabricacion='$itubo_fechafabricacion',
        itubo_cargatrabajopacientes='$itubo_cargatrabajopacientes',
        itubo_cargatrabajo_mamin='$itubo_cargatrabajo_mamin',
        itubo_focofinogrueso='$itubo_focofinogrueso',
        itubo_focofinogrueso2='$itubo_focofinogrueso2',
        objeto_prueba='$objeto_prueba',
        tension_kv='$tension_kv',
        corriente_ma='$corriente_ma',
        carga_mas='$carga_mas',
        objeto_salida='$objeto_salida',
        tension_fuga_kv='$tension_fuga_kv',
        corriente_fuga_ma='$corriente_fuga_ma',
        carga_fuga_mas='$carga_fuga_mas',
        distancia_foco='$distancia_foco',
        tecnica_frecuente='$tecnica_frecuente',
        tension_tension_kv='$tension_tension_kv',
        carga_tension_kv='$carga_tension_kv',
        corriente_tension_kv='$corriente_tension_kv',
        distancia_tension_cm='$distancia_tension_cm',
        valores_diferentes='$valores_diferentes',
        distancia_estrella='$distancia_estrella',
        distancia_foco_imagen='$distancia_foco_imagen',
        numero_objetos='$numero_objetos',
        figura1='$figura1',
        figura2='$figura2',
        eq_marca='$eq_marca',
        eq_modelo='$eq_modelo',
        eq_serie='$eq_serie',
        eq_calibracion='$eq_calibracion',
        multimetro_marca='$multimetro_marca',
        multimetro_modelo='$multimetro_modelo',
        multimetro_serie='$multimetro_serie',
        detector_marca='$detector_marca',
        detector_modelo='$detector_modelo',
        detector_serie='$detector_serie',
        detector_calibracion='$detector_calibracion',
        figura3='$figura3',
        figura4='$figura4',
        figura5='$figura5',
        figura6='$figura6',
        figura7='$figura7',
        figura8='$figura8',
        figura9='$figura9',
        figura10='$figura10',
        figura11='$figura11',
        figura12_izq='$figura12_izq',
        figura13_der='$figura13_der',
        figura13='$figura13',
        figura14='$figura14',
        figura15='$figura15',
        figura16='$figura16',
        WHERE id='$id'";
} else {
    // Si el ID no existe, realiza un INSERT
    $sql = "INSERT INTO informes (
        id, nombre_equipo, marca_equipo, modelo_equipo, numero_serie, fecha_evaluacion, nombre_cliente, direccion, telefono, nit, rep_legal, persona_contacto, cargo, correo_electronico, fecha_fabricacion, operacion, sistema_adquisicion, ubicacion_equipo, itubo_marca, itubo_modelo, itubo_serie, itubo_tensionmax, itubo_corrientemax, itubo_fechafabricacion, itubo_cargatrabajopacientes, itubo_cargatrabajo_mamin, itubo_focofinogrueso, itubo_focofinogrueso2, objeto_prueba, tension_kv, corriente_ma, carga_mas, objeto_salida, tension_fuga_kv, corriente_fuga_ma, carga_fuga_mas, distancia_foco, tecnica_frecuente, tension_tension_kv, carga_tension_kv, corriente_tension_kv, distancia_tension_cm, valores_diferentes, distancia_estrella, distancia_foco_imagen, numero_objetos, figura1, figura2, eq_marca, eq_modelo, eq_serie, eq_calibracion, multimetro_marca, multimetro_modelo, multimetro_serie, detector_marca, detector_modelo, detector_serie, detector_calibracion, figura3, figura4, figura5, figura6, figura7, figura8, figura9, figura10, figura11, figura12_izq, figura13_der, figura13, figura14, figura15, figura16)
        VALUES (
        '$id', '$nombre_equipo', '$marca_equipo', '$modelo_equipo', '$numero_serie', '$fecha_evaluacion', '$nombre_cliente', '$direccion', '$telefono', '$nit', '$rep_legal', '$persona_contacto', '$cargo', '$correo_electronico', '$fecha_fabricacion', '$operacion', '$sistema_adquisicion', '$ubicacion_equipo', '$itubo_marca', '$itubo_modelo', '$itubo_serie', '$itubo_tensionmax', '$itubo_corrientemax', '$itubo_fechafabricacion', '$itubo_cargatrabajopacientes', '$itubo_cargatrabajo_mamin', '$itubo_focofinogrueso', '$itubo_focofinogrueso2', '$objeto_prueba', '$tension_kv', '$corriente_ma', '$carga_mas', '$objeto_salida', '$tension_fuga_kv', '$corriente_fuga_ma', '$carga_fuga_mas', '$distancia_foco', '$tecnica_frecuente', '$tension_tension_kv', '$carga_tension_kv', '$corriente_tension_kv', '$distancia_tension_cm', '$valores_diferentes', '$distancia_estrella', '$distancia_foco_imagen', '$numero_objetos', '$figura1', '$figura2', '$eq_marca', '$eq_modelo', '$eq_serie', '$eq_calibracion', '$multimetro_marca', '$multimetro_modelo', '$multimetro_serie', '$detector_marca', '$detector_modelo', '$detector_serie', '$detector_calibracion', '$figura3', '$figura4', '$figura5', '$figura6', '$figura7', '$figura8', '$figura9', '$figura10', '$figura11', '$figura12_izq', '$figura13_der', '$figura13', '$figura14', '$figura15', '$figura16')";
}

if ($conn->query($sql) === TRUE) {
    echo "Informe guardado correctamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
