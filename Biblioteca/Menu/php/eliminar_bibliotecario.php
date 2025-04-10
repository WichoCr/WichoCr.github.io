<?php
include 'conexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM bibliotecarios WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo "Bibliotecario eliminado exitosamente.";
    header("Location: ../bibliotecarios.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
