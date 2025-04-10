<?php
include 'conexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM libros WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo "Libro eliminado exitosamente.";
    header("Location: ../libros.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
