
<?php

require "conexion.php";

$resultado = $conexion->query(
    "SELECT * FROM reservas ORDER BY id_reserva DESC"
);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Reservaciones</title>
</head>
<body>

    <h1>Reservaciones registradas</h1>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Personas</th>
            <th>Entrada</th>
            <th>Salida</th>
            <th>Habitación</th>
            <th>Comentarios</th>
        </tr>

        <?php while ($fila = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?= (int) $fila["id_reserva"] ?></td>
            <td><?= htmlspecialchars($fila["nombre"]) ?></td>
            <td><?= htmlspecialchars($fila["correo"]) ?></td>
            <td><?= (int) $fila["personas"] ?></td>
            <td><?= htmlspecialchars($fila["fecha_entrada"]) ?></td>
            <td><?= htmlspecialchars($fila["fecha_salida"]) ?></td>
            <td><?= htmlspecialchars($fila["tipo_habitacion"]) ?></td>
            <td><?= htmlspecialchars($fila["comentarios"] ?? "") ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <p><a href="Rerserva.html">Nueva reservación</a></p>

</body>
</html>
