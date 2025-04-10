<?php
include 'conexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM prestamos WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo "Préstamo eliminado exitosamente.";
    header("Location: ../prestamos.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
