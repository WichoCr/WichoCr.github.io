<?php
include 'conexion.php';

// Obtener el ID del préstamo a modificar
$id = $_GET['id'];

// Obtener los datos del préstamo desde la base de datos
$sql = "SELECT * FROM prestamos WHERE id = $id";
$result = mysqli_query($conn, $sql);
$prestamo = mysqli_fetch_assoc($result);

// Si el formulario es enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $libro_id = $_POST['libro_id'];
    $alumno_id = $_POST['alumno_id'];
    $fecha_prestamo = $_POST['fecha_prestamo'];
    $fecha_devolucion = $_POST['fecha_devolucion'];

    // Actualizar los datos del préstamo en la base de datos
    $sql = "UPDATE prestamos SET libro_id='$libro_id', alumno_id='$alumno_id', fecha_prestamo='$fecha_prestamo', fecha_devolucion='$fecha_devolucion' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Préstamo modificado exitosamente.";
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
    <title>Modificar Préstamo</title>
    <link rel="stylesheet" href="css/crud-prestamos.css">
</head>
<body>
    <h2>Modificar Préstamo</h2>
    <form action="modificar_prestamo.php?id=<?php echo $prestamo['id']; ?>" method="POST">
        <label for="libro_id">Libro</label>
        <select id="libro_id" name="libro_id" required>
            <!-- Asegúrate de obtener los libros desde la base de datos -->
            <option value="1" <?php if ($prestamo['libro_id'] == 1) echo "selected"; ?>>Libro 1</option>
            <option value="2" <?php if ($prestamo['libro_id'] == 2) echo "selected"; ?>>Libro 2</option>
        </select>

        <label for="alumno_id">Alumno</label>
        <select id="alumno_id" name="alumno_id" required>
            <!-- Asegúrate de obtener los alumnos desde la base de datos -->
            <option value="1" <?php if ($prestamo['alumno_id'] == 1) echo "selected"; ?>>Alumno 1</option>
            <option value="2" <?php if ($prestamo['alumno_id'] == 2) echo "selected"; ?>>Alumno 2</option>
        </select>

        <label for="fecha_prestamo">Fecha de Préstamo</label>
        <input type="date" id="fecha_prestamo" name="fecha_prestamo" value="<?php echo $prestamo['fecha_prestamo']; ?>" required>

        <label for="fecha_devolucion">Fecha de Devolución</label>
        <input type="date" id="fecha_devolucion" name="fecha_devolucion" value="<?php echo $prestamo['fecha_devolucion']; ?>" required>

        <input type="submit" value="Modificar Préstamo">
    </form>
</body>
</html>
