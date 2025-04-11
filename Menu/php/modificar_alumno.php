<?php
include 'conexion.php';

// Obtener el ID del alumno a modificar
$id = $_GET['id'];

// Obtener los datos del alumno desde la base de datos
$sql = "SELECT * FROM alumnos WHERE id = $id";
$result = mysqli_query($conn, $sql);
$alumno = mysqli_fetch_assoc($result);

// Si el formulario es enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    // Actualizar los datos del alumno en la base de datos
    $sql = "UPDATE alumnos SET nombre='$nombre', email='$email', telefono='$telefono', direccion='$direccion' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Alumno modificado exitosamente.";
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
    <title>Modificar Alumno</title>
    <link rel="stylesheet" href="css/crud-alumnos.css">
</head>
<body>
    <h2>Modificar Alumno</h2>
    <form action="modificar_alumno.php?id=<?php echo $alumno['id']; ?>" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $alumno['nombre']; ?>" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo $alumno['email']; ?>" required>

        <label for="telefono">Teléfono</label>
        <input type="tel" id="telefono" name="telefono" value="<?php echo $alumno['telefono']; ?>" required>

        <label for="direccion">Dirección</label>
        <input type="text" id="direccion" name="direccion" value="<?php echo $alumno['direccion']; ?>" required>

        <input type="submit" value="Modificar Alumno">
    </form>
</body>
</html>
