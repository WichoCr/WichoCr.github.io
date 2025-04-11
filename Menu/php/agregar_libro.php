<?php
include 'conexion.php';

// Si el formulario es enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $stock = $_POST['stock'];
    $imagen = $_POST['imagen']; // Ruta de la imagen
    $categoria_id = $_POST['categoria_id'];

    // Insertar el nuevo libro en la base de datos
    $sql = "INSERT INTO libros (titulo, autor, stock, imagen, categoria_id) VALUES ('$titulo', '$autor', '$stock', '$imagen', '$categoria_id')";

    if (mysqli_query($conn, $sql)) {
        echo "Libro agregado exitosamente.";
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
    <title>Agregar Libro</title>
    <link rel="stylesheet" href="css/crud-libros.css">
</head>
<body>
    <h2>Agregar Nuevo Libro</h2>
    <form action="agregar_libro.php" method="POST">
        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="titulo" required>

        <label for="autor">Autor</label>
        <input type="text" id="autor" name="autor" required>

        <label for="stock">Stock</label>
        <input type="number" id="stock" name="stock" required>

        <label for="imagen">Imagen</label>
        <input type="text" id="imagen" name="imagen" required>

        <label for="categoria_id">Categoría ID</label>
        <input type="number" id="categoria_id" name="categoria_id" required>

        <input type="submit" value="Agregar Libro">
    </form>
</body>
</html>
