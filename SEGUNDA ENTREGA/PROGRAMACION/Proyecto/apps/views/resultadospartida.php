<?php
session_start();

// Obtener puntajes de la sesión
$puntajes = $_SESSION['puntajes'] ?? [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de la Partida</title>
    <link rel="stylesheet" href="../../public/css/resultadospartida.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 60%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        td {
            font-weight: bold;
        }
        .mensaje {
            text-align: center;
            margin-top: 50px;
            font-size: 1.2rem;
            color: #555;
        }
    </style>
</head>
<body>

    <h1>Resultados de la Partida</h1>

    <?php if (!empty($puntajes)): ?>
        <table>
            <tr>
                <th>Jugador (ID)</th>
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

    <div style="text-align:center; margin-top:30px;">
        <a href="../views/inicio.html"><button>Volver al inicio</button></a>
    </div>

</body>
</html>
