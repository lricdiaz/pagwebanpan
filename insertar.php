<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $vacante = $_POST["vacante"];
    $fecha = $_POST["fecha"];

    // Procesar el archivo adjunto
    $archivoNombre = $_FILES["archivo"]["name"];
    $archivoTemporal = $_FILES["archivo"]["tmp_name"];
    $archivoDestino = "carpeta_destino/" . $archivoNombre;

    // Mover el archivo a su ubicación definitiva
    if (move_uploaded_file($archivoTemporal, $archivoDestino)) {
        // Consulta SQL para insertar los datos en la tabla
        $sql = "INSERT INTO solicitudes_empleo (nombre, apellido, vacante, fecha, archivo) VALUES (?, ?, ?, ?, ?)";

        // Preparar la consulta
        $stmt = $conn->prepare($sql);

        // Vincular los parámetros
        $stmt->bind_param("sssss", $nombre, $apellido, $vacante, $fecha, $archivoDestino);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Los datos se han insertado correctamente en la base de datos.";
        } else {
            echo "Error al insertar los datos en la base de datos: " . $conn->error;
        }

        // Cerrar la consulta y la conexión
        $stmt->close();
    } else {
        echo "Error al subir el archivo.";
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
