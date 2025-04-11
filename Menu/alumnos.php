<?php
// alumnos.php

include 'php/conexion.php';

$sql = "SELECT * FROM alumnos";
$result = mysqli_query($conn, $sql);
$alumnos = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Alumnos</title>
    <link rel="stylesheet" href="css/alumnos.css">
</head>
<body>
    <header>
        <h1>Gestionar Alumnos</h1>
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
        <h2>Lista de Alumnos</h2>
        <a href="php/agregar_alumno.php">Agregar Alumno</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($alumnos as $alumno): ?>
            <tr>
                <td><?php echo $alumno['id']; ?></td>
                <td><?php echo $alumno['nombre']; ?></td>
                <td><?php echo $alumno['email']; ?></td>
                <td><?php echo $alumno['telefono']; ?></td>
                <td>
                    <a href="php/modificar_alumno.php?id=<?php echo $alumno['id']; ?>">Modificar</a>
                    <a href="php/eliminar_alumno.php?id=<?php echo $alumno['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este alumno?')">Eliminar</a>
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
