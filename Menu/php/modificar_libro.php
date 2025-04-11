<?php
include 'conexion.php';

// Obtener el ID del libro a modificar
$id = $_GET['id'];

// Obtener los datos del libro desde la base de datos
$sql = "SELECT * FROM libros WHERE id = $id";
$result = mysqli_query($conn, $sql);
$libro = mysqli_fetch_assoc($result);

// Si el formulario es enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $stock = $_POST['stock'];
    $imagen = $_POST['imagen'];
    $categoria_id = $_POST['categoria_id'];

    // Actualizar los datos del libro en la base de datos
    $sql = "UPDATE libros SET titulo='$titulo', autor='$autor', stock='$stock', imagen='$imagen', categoria_id='$categoria_id' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Libro modificado exitosamente.";
        header("Location: ../libros.php"); // Redirige a la lista de libros
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
    <title>Modificar Libro</title>
    <link rel="stylesheet" href="css/crud-libros.css">
</head>
<body>
    <h2>Modificar Libro</h2>
    <form action="modificar_libro.php?id=<?php echo $libro['id']; ?>" method="POST">
        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="titulo" value="<?php echo $libro['titulo']; ?>" required>

        <label for="autor">Autor</label>
        <input type="text" id="autor" name="autor" value="<?php echo $libro['autor']; ?>" required>

        <label for="stock">Stock</label>
        <input type="number" id="stock" name="stock" value="<?php echo $libro['stock']; ?>" required>

        <label for="imagen">Imagen</label>
        <input type="text" id="imagen" name="imagen" value="<?php echo $libro['imagen']; ?>" required>

        <label for="categoria_id">Categoría ID</label>
        <input type="number" id="categoria_id" name="categoria_id" value="<?php echo $libro['categoria_id']; ?>" required>

        <input type="submit" value="Modificar Libro">
    </form>
</body>
</html>
