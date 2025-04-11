<?php
include 'conexion.php';

// Obtener el ID del bibliotecario a eliminar
$id = $_GET['id'];

// Eliminar el bibliotecario de la base de datos
$sql = "DELETE FROM bibliotecarios WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo "Bibliotecario eliminado exitosamente.";
    header("Location: ../bibliotecarios.php"); // Redirige a la lista de bibliotecarios
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
