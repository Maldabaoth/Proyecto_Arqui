<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit();
}

include('../includes/conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_edificio = $_POST['numero_edificio'];
    $departamento = $_POST['departamento'];
    $telefono = $_POST['telefono'];
    $nombre_empleado = $_POST['nombre_empleado'];
    $estado = $_POST['estado'];

    $sql = "INSERT INTO empleados (numero_edificio, departamento, telefono, nombre_empleado, estado)
            VALUES ('$numero_edificio', '$departamento', '$telefono', '$nombre_empleado', '$estado')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Nuevo empleado agregado exitosamente</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Empleado</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #4CAF50;
            margin-top: 20px;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Layout */
        form {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="number"],
        input[type="text"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin: 5px 0 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button, input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px 0;
        }

        button:hover, input[type="submit"]:hover {
            background-color: #45a049;
        }

        form p {
            text-align: center;
            color: #4CAF50;
        }

        /* Centering the back link */
        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            color: #4CAF50;
            text-decoration: none;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Agregar Nuevo Empleado</h2>
    <form method="post">
        <label for="numero_edificio">Número de Edificio:</label>
        <input type="number" name="numero_edificio" required><br>
        <label for="departamento">Departamento:</label>
        <input type="number" name="departamento" required><br>
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" required><br>
        <label for="nombre_empleado">Nombre del Empleado:</label>
        <input type="text" name="nombre_empleado" required><br>
        <label for="estado">Estado:</label>
        <input type="text" name="estado" required><br>
        <button type="submit">Agregar Empleado</button>
    </form>
    <div class="back-link">
        <a href="../index.php">Volver a la página principal</a>
    </div>
</body>
</html>
