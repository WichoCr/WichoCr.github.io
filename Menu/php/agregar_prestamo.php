<?php
include 'conexion.php';

// Si el formulario es enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $libro_id = $_POST['libro_id'];
    $alumno_id = $_POST['alumno_id'];
    $fecha_prestamo = $_POST['fecha_prestamo'];
    $fecha_devolucion = $_POST['fecha_devolucion'];

    // Insertar el nuevo préstamo en la base de datos
    $sql = "INSERT INTO prestamos (libro_id, alumno_id, fecha_prestamo, fecha_devolucion) 
            VALUES ('$libro_id', '$alumno_id', '$fecha_prestamo', '$fecha_devolucion')";

    if (mysqli_query($conn, $sql)) {
        echo "Préstamo agregado exitosamente.";
        header("Location: ../prestamos.php"); // Redirige a la lista de préstamos
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
    <title>Agregar Préstamo</title>
    <link rel="stylesheet" href="css/crud-prestamos.css">
</head>
<body>
    <h2>Agregar Nuevo Préstamo</h2>
    <form action="agregar_prestamo.php" method="POST">
        <label for="libro_id">Libro</label>
        <select id="libro_id" name="libro_id" required>
            <!-- Asegúrate de obtener los libros desde la base de datos -->
            <option value="1">Libro 1</option>
            <option value="2">Libro 2</option>
        </select>

        <label for="alumno_id">Alumno</label>
        <select id="alumno_id" name="alumno_id" required>
            <!-- Asegúrate de obtener los alumnos desde la base de datos -->
            <option value="1">Alumno 1</option>
            <option value="2">Alumno 2</option>
        </select>

        <label for="fecha_prestamo">Fecha de Préstamo</label>
        <input type="date" id="fecha_prestamo" name="fecha_prestamo" required>

        <label for="fecha_devolucion">Fecha de Devolución</label>
        <input type="date" id="fecha_devolucion" name="fecha_devolucion" required>

        <input type="submit" value="Agregar Préstamo">
    </form>
</body>
</html>
