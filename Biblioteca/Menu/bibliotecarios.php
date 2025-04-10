<?php

include 'php/conexion.php';

$sql = "SELECT * FROM bibliotecarios";
$result = mysqli_query($conn, $sql);
$bibliotecarios = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Bibliotecarios</title>
    <link rel="stylesheet" href="css/bibliotecarios.css">
</head>
<body>
    <header>
        <h1>Gestionar Bibliotecarios</h1>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="alumnos.php">Alumnos</a></li>
                <li><a href="libros.php">Libros</a></li>
                <li><a href="prestamos.php">Préstamos</a></li>
                <li><a href="bibliotecarios.php">Bibliotecarios</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <h2>Lista de Bibliotecarios</h2>
        <a href="php/agregar_bibliotecario.php">Agregar Bibliotecario</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($bibliotecarios as $bibliotecario): ?>
            <tr>
                <td><?php echo $bibliotecario['id']; ?></td>
                <td><?php echo $bibliotecario['nombre']; ?></td>
                <td><?php echo $bibliotecario['email']; ?></td>
                <td><?php echo $bibliotecario['telefono']; ?></td>
                <td>
                    <a href="php/modificar_bibliotecario.php?id=<?php echo $bibliotecario['id']; ?>">Modificar</a>
                    <a href="php/eliminar_bibliotecario.php?id=<?php echo $bibliotecario['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este bibliotecario?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>

    <footer>
        <p>Biblioteca - Sistema de Gestión - 2025</p>
    </footer>
</body>
</html>
