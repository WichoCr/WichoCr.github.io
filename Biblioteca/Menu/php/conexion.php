<?php
$conn = mysqli_connect("localhost", "root", "", "biblioteca");

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>