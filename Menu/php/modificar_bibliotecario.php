<?php
include 'conexion.php';

// Obtener el ID del bibliotecario a modificar
$id = $_GET['id'];

// Obtener los datos del bibliotecario desde la base de datos
$sql = "SELECT * FROM bibliotecarios WHERE id = $id";
$result = mysqli_query($conn, $sql);
$bibliotecario = mysqli_fetch_assoc($result);

// Si el formulario es enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    // Actualizar los datos del bibliotecario en la base de datos
    $sql = "UPDATE bibliotecarios SET nombre='$nombre', email='$email', telefono='$telefono' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Bibliotecario modificado exitosamente.";
        header("Location: ../bibliotecarios.php"); // Redirige a la lista de bibliotecarios
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
    <title>Modificar Bibliotecario</title>
    <link rel="stylesheet" href="css/crud-bibliotecarios.css">
</head>
<body>
    <h2>Modificar Bibliotecario</h2>
    <form action="modificar_bibliotecario.php?id=<?php echo $bibliotecario['id']; ?>" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $bibliotecario['nombre']; ?>" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo $bibliotecario['email']; ?>" required>

        <label for="telefono">Teléfono</label>
        <input type="tel" id="telefono" name="telefono" value="<?php echo $bibliotecario['telefono']; ?>" required>

        <input type="submit" value="Modificar Bibliotecario">
    </form>
</body>
</html>
