<?php
$servername = "localhost";
$username = "root"; // Usuario por defecto en MySQL local
$password = ""; // Contraseña por defecto en MySQL local
$dbname = "freedom_database"; // Nombre de la base de datos creada

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
