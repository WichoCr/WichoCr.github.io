<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $sql = "INSERT INTO alumnos (id, nombre, email, telefono, direccion) VALUES ('$id','$nombre', '$email', '$telefono', '$direccion')";

    if (mysqli_query($conn, $sql)) {
        echo "Alumno agregado exitosamente.";
        header("Location: ../alumnos.php");
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
        
        <label for="id">Numero de control</label>
        <input type="text" id="id" name="id" required>
        
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
