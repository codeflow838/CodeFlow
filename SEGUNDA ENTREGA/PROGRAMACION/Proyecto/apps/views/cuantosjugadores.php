<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/cuantosjugadores.css">
    <title>Seleccionar jugadores</title>
</head>
<body>
    <main>
        <header class="titulo">
            <h1>¿Cuántos jugadores son?</h1>
        </header>

        <section class="opciones" aria-label="Cantidad de jugadores">
            <ul>
                <li>
                    <form action="../controllers/PartidaController.php" method="POST">
                        <input type="hidden" name="action" value="crear_partida">
                        <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['user_id']; ?>">
                        <input type="hidden" name="cantidad_jugadores" value="2">
                        <button type="submit" class="cuadrado">2</button>
                    </form>
                </li>
                <li>
                    <form action="../controllers/PartidaController.php" method="POST">
                        <input type="hidden" name="action" value="crear_partida">
                        <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['user_id']; ?>">
                        <input type="hidden" name="cantidad_jugadores" value="3">
                        <button type="submit" class="cuadrado">3</button>
                    </form>
                </li>
                <li>
                    <form action="../controllers/PartidaController.php" method="POST">
                        <input type="hidden" name="action" value="crear_partida">
                        <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['user_id']; ?>">
                        <input type="hidden" name="cantidad_jugadores" value="4">
                        <button type="submit" class="cuadrado">4</button>
                    </form>
                </li>
                <li>
                    <form action="../controllers/PartidaController.php" method="POST">
                        <input type="hidden" name="action" value="crear_partida">
                        <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['user_id']; ?>">
                        <input type="hidden" name="cantidad_jugadores" value="5">
                        <button type="submit" class="cuadrado">5</button>
                    </form>
                </li>
            </ul>
        </section>
    </main>
</body>
</html>
