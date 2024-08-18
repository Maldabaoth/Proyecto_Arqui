<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit();
}

include('../includes/conexion.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar el empleado de la base de datos
    $sql = "DELETE FROM empleados WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Empleado eliminado exitosamente";
    } else {
        echo "Error al eliminar el empleado: " . $conn->error;
    }
}

$conn->close();

// Redirigir de nuevo a la página principal
header("Location: ../index.php");
exit();
?>
