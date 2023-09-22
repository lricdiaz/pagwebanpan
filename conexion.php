<?php
$host = "tu_servidor_mysql";
$username = "tu_usuario_mysql";
$password = "tu_contraseña_mysql";
$database = "tu_base_de_datos";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
