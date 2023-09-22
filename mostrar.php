<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivos Subidos</title>
</head>
<body>
    <h1>Archivos Subidos</h1>
    <ul>
        <?php
        // Establece la conexión a la base de datos (usando los mismos valores que en el código anterior)
        $host = "tu_servidor_mysql";
        $username = "tu_usuario_mysql";
        $password = "tu_contraseña_mysql";
        $database = "tu_base_de_datos";

        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Consulta SQL para obtener los archivos subidos
        $sql = "SELECT archivo FROM solicitudes_empleo";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $archivo = $row["archivo"];
                echo "<li><a href='$archivo'>$archivo</a></li>";
            }
        } else {
            echo "<p>No se han encontrado archivos subidos.</p>";
        }

        // Cierra la conexión a la base de datos
        $conn->close();
        ?>
    </ul>
</body>
</html>
