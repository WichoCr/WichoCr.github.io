<?php
include 'conexion.php';

// Obtener el ID del alumno a eliminar
$id = $_GET['id'];

// Eliminar el alumno de la base de datos
$sql = "DELETE FROM alumnos WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo "Alumno eliminado exitosamente.";
    header("Location: ../alumnos.php"); // Redirige a la lista de alumnos
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
