<?php
include 'conexion.php';

// Obtener el ID del préstamo a eliminar
$id = $_GET['id'];

// Eliminar el préstamo de la base de datos
$sql = "DELETE FROM prestamos WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo "Préstamo eliminado exitosamente.";
    header("Location: ../prestamos.php"); // Redirige a la lista de préstamos
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
