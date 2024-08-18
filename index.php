<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include('includes/conexion.php');

$sql = "SELECT * FROM empleados";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Empleados</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Lista de Empleados</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Número de Edificio</th>
            <th>Departamento</th>
            <th>Teléfono</th>
            <th>Nombre del Empleado</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["numero_edificio"] . "</td>";
                echo "<td>" . $row["departamento"] . "</td>";
                echo "<td>" . $row["telefono"] . "</td>";
                echo "<td>" . $row["nombre_empleado"] . "</td>";
                echo "<td>" . $row["estado"] . "</td>";
                echo "<td>";
                echo "<a href='pages/editar_empleado.php?id=" . $row["id"] . "'>Editar</a> | ";
                echo "<a href='pages/eliminar_empleado.php?id=" . $row["id"] . "' onclick=\"return confirm('¿Estás seguro de que deseas eliminar a este empleado?');\">Eliminar</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No hay empleados registrados.</td></tr>";
        }
        ?>
    </table>
    <br>
    <a href="pages/agregar_empleado.php">Agregar Empleado</a>
    <br>
    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>

<?php
$conn->close();
?>
