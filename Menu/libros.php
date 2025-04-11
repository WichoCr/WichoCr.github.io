<?php
// libros.php

include 'php/conexion.php';

$sql = "SELECT * FROM libros";
$result = mysqli_query($conn, $sql);
$libros = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Libros</title>
    <link rel="stylesheet" href="css/libros.css">
</head>
<body>
    <header>
        <h1>Gestionar Libros</h1>
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
        <h2>Lista de Libros</h2>
        <a href="php/agregar_libro.php">Agregar Libro</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>ISBN</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($libros as $libro): ?>
            <tr>
                <td><?php echo $libro['id']; ?></td>
                <td><?php echo $libro['titulo']; ?></td>
                <td><?php echo $libro['autor']; ?></td>
                <td><?php echo $libro['isbn']; ?></td>
                <td>
                    <a href="php/modificar_libro.php?id=<?php echo $libro['id']; ?>">Modificar</a>
                    <a href="php/eliminar_libro.php?id=<?php echo $libro['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este libro?')">Eliminar</a>
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
