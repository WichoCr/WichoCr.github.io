<?php
include 'conexion.php';

// Obtener el ID del libro a eliminar
$id = $_GET['id'];

// Eliminar el libro de la base de datos
$sql = "DELETE FROM libros WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo "Libro eliminado exitosamente.";
    header("Location: ../libros.php"); // Redirige a la lista de libros
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
