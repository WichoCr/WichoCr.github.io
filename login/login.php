<?php
session_start();
include "db.php";


if (!isset($_SESSION["intentos"])) {
    $_SESSION["intentos"] = 0;
}

if ($_SESSION["intentos"] >= 3) {
    echo "<script>alert('¡Has alcanzado el número máximo de intentos!');</script>";
    echo "<script>window.location.href = 'index.html';</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Usuario = $_POST["Usuario"];
    $Clave = $_POST["Clave"];

    $sql = "SELECT * FROM login WHERE Usuario = ? AND Clave = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $Usuario, $Clave);
    $stmt->execute();
    $resultado = $stmt->get_result();
    if ($resultado->num_rows > 0) {
        echo "<script>alert('¡Inicio de sesión exitoso!');</script>";
        header("Location: ../Menu/index.php"); // Redirigir a una página de bienvenida
        exit;
    } else {
        $_SESSION['attempts']++;
        echo "<script>alert('Usuario o contraseña incorrectos. Intento " . $_SESSION['attempts'] . " de 3.');</script>";
        echo "<script>window.location.href = 'index.html';</script>";
        exit;
    }
    
    }


?>
