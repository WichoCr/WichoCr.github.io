<?php
include 'conexion.php';

// Obtener libros desde la base de datos
$query_libros = "SELECT id, titulo FROM libros"; 
$result_libros = mysqli_query($conn, $query_libros);

// Obtener alumnos desde la base de datos
$query_alumnos = "SELECT id, nombre FROM alumnos"; 
$result_alumnos = mysqli_query($conn, $query_alumnos);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $libro_id = $_POST['libro_id'];
    $alumno_id = $_POST['alumno_id'];
    $fecha_prestamo = $_POST['fecha_prestamo'];
    $fecha_devolucion = $_POST['fecha_devolucion'];

    // Obtener la fecha actual en formato YYYY-MM-DD
    $fecha_actual = date('Y-m-d');

    // Validar que las fechas no sean anteriores a hoy
    if ($fecha_prestamo < $fecha_actual) {
        echo "<script>alert('La fecha de préstamo no puede ser anterior a hoy.'); window.history.back();</script>";
        exit();
    }

    if ($fecha_devolucion < $fecha_prestamo) {
        echo "<script>alert('La fecha de devolución no puede ser anterior a la fecha de préstamo.'); window.history.back();</script>";
        exit();
    }

    // Insertar en la base de datos si pasa la validación
    $sql = "INSERT INTO prestamos (libro_id, alumno_id, fecha_prestamo, fecha_devolucion) 
            VALUES ('$libro_id', '$alumno_id', '$fecha_prestamo', '$fecha_devolucion')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Préstamo agregado exitosamente.'); window.location.href = '../prestamos.php';</script>";
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Préstamo</title>
    <link rel="stylesheet" href="css/crud-prestamos.css">
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Obtener la fecha actual en formato YYYY-MM-DD
            let today = new Date().toISOString().split("T")[0];

            // Asignar la fecha mínima a los inputs de fecha
            document.getElementById("fecha_prestamo").setAttribute("min", today);
            document.getElementById("fecha_devolucion").setAttribute("min", today);

            // Validación en el lado del cliente
            document.getElementById("form-prestamo").addEventListener("submit", function (event) {
                let fechaPrestamo = document.getElementById("fecha_prestamo").value;
                let fechaDevolucion = document.getElementById("fecha_devolucion").value;

                if (fechaPrestamo < today) {
                    alert("La fecha de préstamo no puede ser anterior a hoy.");
                    event.preventDefault();
                }

                if (fechaDevolucion < fechaPrestamo) {
                    alert("La fecha de devolución no puede ser anterior a la fecha de préstamo.");
                    event.preventDefault();
                }
            });
        });
    </script>
</head>
<body>
    <h2>Agregar Nuevo Préstamo</h2>
    <form id="form-prestamo" action="agregar_prestamo.php" method="POST">
        
        <label for="libro_id">Libro</label>
        <select id="libro_id" name="libro_id" required>
            <option value="">Seleccione un libro</option>
            <?php while ($libro = mysqli_fetch_assoc($result_libros)) { ?>
                <option value="<?php echo $libro['id']; ?>">
                    <?php echo htmlspecialchars($libro['titulo']); ?>
                </option>
            <?php } ?>
        </select>

        <label for="alumno_id">Alumno</label>
        <select id="alumno_id" name="alumno_id" required>
            <option value="">Seleccione un alumno</option>
            <?php while ($alumno = mysqli_fetch_assoc($result_alumnos)) { ?>
                <option value="<?php echo $alumno['id']; ?>">
                    <?php echo htmlspecialchars($alumno['nombre']); ?>
                </option>
            <?php } ?>
        </select>

        <label for="fecha_prestamo">Fecha de Préstamo</label>
        <input type="date" id="fecha_prestamo" name="fecha_prestamo" required>

        <label for="fecha_devolucion">Fecha de Devolución</label>
        <input type="date" id="fecha_devolucion" name="fecha_devolucion" required>

        <input type="submit" value="Agregar Préstamo">
    </form>
</body>
</html>
