<?php
include 'conexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM alumnos WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo "Alumno eliminado exitosamente.";
    header("Location: ../alumnos.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
