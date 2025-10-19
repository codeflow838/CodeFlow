<?php
session_start();
$puntajes = $_SESSION['puntajes'] ?? [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de la Partida</title>
    <link rel="stylesheet" href="../../public/css/resultadospartida.css">
</head>
<body>

    <h1>Resultados de la Partida</h1>

    <?php if (!empty($puntajes)): ?>
        <table>
            <tr>
                <th>Jugador</th>
                <th>Puntaje Total</th>
            </tr>
            <?php foreach($puntajes as $id_usuario => $puntos): ?>
                <tr>
                    <td><?= htmlspecialchars($id_usuario) ?></td>
                    <td><?= htmlspecialchars($puntos) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <div class="mensaje">No hay puntajes disponibles. Parece que no se jugaron los tableros correctamente.</div>
    <?php endif; ?>
    <div class="volver-inicio">
        <a href="../../public/index.html"><button>Volver al inicio</button></a>
    </div>
</body>
</html>
