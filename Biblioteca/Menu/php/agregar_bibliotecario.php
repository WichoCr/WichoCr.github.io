<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $sql = "INSERT INTO bibliotecarios (nombre, email, telefono) VALUES ('$nombre', '$email', '$telefono')";

    if (mysqli_query($conn, $sql)) {
        echo "Bibliotecario agregado exitosamente.";
        header("Location: ../bibliotecarios.php");
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
    <title>Agregar Bibliotecario</title>
    <link rel="stylesheet" href="css/crud-bibliotecarios.css">
</head>
<body>
    <h2>Agregar Nuevo Bibliotecario</h2>
    <form action="agregar_bibliotecario.php" method="POST">
        <label for="nombre">ID</label>
        <input type="text" id="id" name="id" required>

        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="telefono">Teléfono</label>
        <input type="tel" id="telefono" name="telefono" required>

        <input type="submit" value="Agregar Bibliotecario">
    </form>
</body>
</html>
