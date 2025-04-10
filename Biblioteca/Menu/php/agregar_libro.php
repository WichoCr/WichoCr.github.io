<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $stock = $_POST['stock'];
    $categoria_id = $_POST['categoria_id'];

    $imagen = $_FILES['imagen'];
    $imagen_nombre = $imagen['name'];
    $imagen_tmp = $imagen['tmp_name'];
    $imagen_error = $imagen['error'];
    $imagen_size = $imagen['size'];

    if ($imagen_error === 0) {
        if ($imagen_size <= 5000000) {
            $imagen_ext = pathinfo($imagen_nombre, PATHINFO_EXTENSION);
            $imagen_ext = strtolower($imagen_ext);

            if (in_array($imagen_ext, ['jpg', 'jpeg', 'png'])) {
                $imagen_nueva = uniqid('', true) . '.' . $imagen_ext;
                $imagen_destino = 'uploads/' . $imagen_nueva;

                if (move_uploaded_file($imagen_tmp, $imagen_destino)) {
                    $sql = "INSERT INTO libros (id, titulo, autor, stock, imagen, categoria_id) 
                            VALUES ('$id', '$titulo', '$autor', '$stock', '$imagen_destino', '$categoria_id')";

                    if (mysqli_query($conn, $sql)) {
                        echo "Libro agregado exitosamente.";
                        header("Location: ../libros.php");
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                } else {
                    echo "Error al mover el archivo.";
                }
            } else {
                echo "Solo se permiten imágenes con extensiones .jpg, .jpeg o .png.";
            }
        } else {
            echo "El archivo es demasiado grande. Debe ser menor a 5MB.";
        }
    } else {
        echo "Hubo un error al cargar la imagen.";
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
    <form action="agregar_libro.php" method="POST" enctype="multipart/form-data">
        <label for="id">Id</label>
        <input type="text" id="id" name="id" required>

        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="titulo" required>

        <label for="autor">Autor</label>
        <input type="text" id="autor" name="autor" required>

        <label for="stock">Stock</label>
        <input type="number" id="stock" name="stock" required>

        <label for="imagen">Imagen</label>
        <input type="file" id="imagen" name="imagen" accept="image/*" required>

        <label for="categoria_id">Categoría ID</label>
        <select id="categoria_id" name="categoria_id" required>
            <option value="1">Terror</option>
            <option value="2">Acción</option>
            <option value="3">Eroticos</option>
            <option value="4">Suspenso</option>
            <option value="5">Aventura</option>
        </select>
        <input type="submit" value="Agregar Libro">
    </form>
</body>
</html>
