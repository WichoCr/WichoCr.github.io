<?php
include 'conexion.php';

// Si el formulario es enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    // Insertar el nuevo alumno en la base de datos
    $sql = "INSERT INTO alumnos (nombre, email, telefono, direccion) VALUES ('$nombre', '$email', '$telefono', '$direccion')";

    if (mysqli_query($conn, $sql)) {
        echo "Alumno agregado exitosamente.";
        header("Location: ../alumnos.php"); // Redirige a la lista de alumnos
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Alumno</title>
    <link rel="stylesheet" href="css/crud-alumnos.css">
</head>
<body>
    <h2>Agregar Nuevo Alumno</h2>
    <form action="agregar_alumno.php" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        
        <label for="telefono">Teléfono</label>
        <input type="tel" id="telefono" name="telefono" required>

        <label for="direccion">Dirección</label>
        <input type="text" id="direccion" name="direccion" required>

        <input type="submit" value="Agregar Alumno">
    </form>
</body>
</html>
