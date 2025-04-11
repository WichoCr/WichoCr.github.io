<?php
// Establecer la conexión con la base de datos
$conn = mysqli_connect("localhost", "root", "", "biblioteca");

// Verificar la conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>