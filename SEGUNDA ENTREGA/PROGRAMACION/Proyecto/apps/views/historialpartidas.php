<?php
require_once "../models/Database.php";

$db = new Database();
$conn = $db->getConnection();

$sql = "
SELECT u.Nombre, p.Modo, p.Fecha
FROM Partida p
JOIN Usuario u ON p.ID_usuario = u.ID
ORDER BY p.Fecha DESC
";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Partidas</title>
    <link rel="stylesheet" href="../../public/css/historialpartidas.css">
</head>
<body>

    <h1>Historial de Partidas</h1>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>Jugador</th>
                <th>Modo</th>
                <th>Fecha</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['Nombre']) ?></td>
                    <td><?= htmlspecialchars($row['Modo']) ?></td>
                    <td><?= htmlspecialchars($row['Fecha']) ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <div class="mensaje">No hay registros de partidas jugadas.</div>
    <?php endif; ?>

    <div class="volver-inicio">
        <a href="../../public/index.html"><button>Volver al inicio</button></a>
    </div>

</body>
</html>

<?php
$conn->close();
?>