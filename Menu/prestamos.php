<?php
// prestamos.php

include 'php/conexion.php';

$sql = "SELECT prestamos.id, alumnos.nombre as alumno, libros.titulo as libro, prestamos.fecha_prestamo, prestamos.fecha_devolucion 
        FROM prestamos 
        INNER JOIN alumnos ON prestamos.alumno_id = alumnos.id 
        INNER JOIN libros ON prestamos.libro_id = libros.id";
$result = mysqli_query($conn, $sql);
$prestamos = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Préstamos</title>
    <link rel="stylesheet" href="css/prestamos.css">
</head>
<body>
    <header>
        <h1>Gestionar Préstamos</h1>
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
        <h2>Lista de Préstamos</h2>
        <a href="php/agregar_prestamo.php">Agregar Préstamo</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Alumno</th>
                <th>Libro</th>
                <th>Fecha de Préstamo</th>
                <th>Fecha de Devolución</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($prestamos as $prestamo): ?>
            <tr>
                <td><?php echo $prestamo['id']; ?></td>
                <td><?php echo $prestamo['alumno']; ?></td>
                <td><?php echo $prestamo['libro']; ?></td>
                <td><?php echo $prestamo['fecha_prestamo']; ?></td>
                <td><?php echo $prestamo['fecha_devolucion']; ?></td>
                <td>
                    <a href="php/modificar_prestamo.php?id=<?php echo $prestamo['id']; ?>">Modificar</a>
                    <a href="php/eliminar_prestamo.php?id=<?php echo $prestamo['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este préstamo?')">Eliminar</a>
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
