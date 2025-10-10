<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/juegocalculadora.css">
    <title>PARTIDA</title>
</head>
<body>
    <section id="contenedor">
        <header class="cuadradito">Tablero de: ""</header>
        <nav class="cuadradito">
            <button class="izq" type="button"><</button>
            <div>1/5</div>
            <button class="der" type="button">></button>
        </nav>
        <main class="cuadradito">

            <section class="tablero activo">
                <form action="../controllers/PartidaController.php" method="POST">
                    <div id="BosqueSemejanza" class="bosque">
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                    </div>
                    <div id="ReySelva" class="bosque">
                        <div class="celda"><input type="button" name="ReySelva[]"></div>
                    </div>
                    <div id="TrioFrondoso" class="bosque">
                        <div class="celda"><input type="button" name="TrioFrondoso[]"></div>
                        <div class="celda"><input type="button" name="TrioFrondoso[]"></div>
                        <div class="celda"><input type="button" name="TrioFrondoso[]"></div>
                    </div>
                    <div id="PradoDiferencia" class="piedra">
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                    </div>
                    <div id="PraderaAmor" class="piedra">
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                    </div>
                    <div id="IslaSolitaria" class="piedra">
                        <div class="celda"><input type="button" name="IslaSolitaria[]"></div>
                    </div>
                    <div id="rio" class="piedra bosque">
                        <div class="celda"><input type="button" name="rio[]"></div>
                        <div class="celda"><input type="button" name="rio[]"></div>
                        <div class="celda"><input type="button" name="rio[]"></div>
                        <div class="celda"><input type="button" name="rio[]"></div>
                        <div class="celda"><input type="button" name="rio[]"></div>
                    </div>
                </form>
            </section>

            <section class="tablero">
                <form action="../controllers/PartidaController.php" method="POST">
                    <div id="BosqueSemejanza" class="bosque">
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                    </div>
                    <div id="ReySelva" class="bosque">
                        <div class="celda"><input type="button" name="ReySelva[]"></div>
                    </div>
                    <div id="TrioFrondoso" class="bosque">
                        <div class="celda"><input type="button" name="TrioFrondoso[]"></div>
                        <div class="celda"><input type="button" name="TrioFrondoso[]"></div>
                        <div class="celda"><input type="button" name="TrioFrondoso[]"></div>
                    </div>
                    <div id="PradoDiferencia" class="piedra">
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                    </div>
                    <div id="PraderaAmor" class="piedra">
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                    </div>
                    <div id="IslaSolitaria" class="piedra">
                        <div class="celda"><input type="button" name="IslaSolitaria[]"></div>
                    </div>
                    <div id="rio" class="piedra bosque">
                        <div class="celda"><input type="button" name="rio[]"></div>
                        <div class="celda"><input type="button" name="rio[]"></div>
                        <div class="celda"><input type="button" name="rio[]"></div>
                        <div class="celda"><input type="button" name="rio[]"></div>
                        <div class="celda"><input type="button" name="rio[]"></div>
                    </div>
                </form>
            </section>

            <section class="tablero">
                <form action="../controllers/PartidaController.php" method="POST">
                    <div id="BosqueSemejanza" class="bosque">
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                    </div>
                    <div id="ReySelva" class="bosque">
                        <div class="celda"><input type="button" name="ReySelva[]"></div>
                    </div>
                    <div id="TrioFrondoso" class="bosque">
                        <div class="celda"><input type="button" name="TrioFrondoso[]"></div>
                        <div class="celda"><input type="button" name="TrioFrondoso[]"></div>
                        <div class="celda"><input type="button" name="TrioFrondoso[]"></div>
                    </div>
                    <div id="PradoDiferencia" class="piedra">
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                    </div>
                    <div id="PraderaAmor" class="piedra">
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                    </div>
                    <div id="IslaSolitaria" class="piedra">
                        <div class="celda"><input type="button" name="IslaSolitaria[]"></div>
                    </div>
                    <div id="rio" class="piedra bosque">
                        <div class="celda"><input type="button" name="rio[]"></div>
                        <div class="celda"><input type="button" name="rio[]"></div>
                        <div class="celda"><input type="button" name="rio[]"></div>
                        <div class="celda"><input type="button" name="rio[]"></div>
                        <div class="celda"><input type="button" name="rio[]"></div>
                    </div>
                </form>
            </section>

            <section class="tablero">
                <form action="../controllers/PartidaController.php" method="POST">
                    <div id="BosqueSemejanza" class="bosque">
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                    </div>
                    <div id="ReySelva" class="bosque">
                        <div class="celda"><input type="button" name="ReySelva[]"></div>
                    </div>
                    <div id="TrioFrondoso" class="bosque">
                        <div class="celda"><input type="button" name="TrioFrondoso[]"></div>
                        <div class="celda"><input type="button" name="TrioFrondoso[]"></div>
                        <div class="celda"><input type="button" name="TrioFrondoso[]"></div>
                    </div>
                    <div id="PradoDiferencia" class="piedra">
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                    </div>
                    <div id="PraderaAmor" class="piedra">
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                    </div>
                    <div id="IslaSolitaria" class="piedra">
                        <div class="celda"><input type="button" name="IslaSolitaria[]"></div>
                    </div>
                    <div id="rio" class="piedra bosque">
                        <div class="celda"><input type="button" name="rio[]"></div>
                        <div class="celda"><input type="button" name="rio[]"></div>
                        <div class="celda"><input type="button" name="rio[]"></div>
                        <div class="celda"><input type="button" name="rio[]"></div>
                        <div class="celda"><input type="button" name="rio[]"></div>
                    </div>
                </form>
            </section>

            <section class="tablero">
                <form action="../controllers/PartidaController.php" method="POST">
                    <div id="BosqueSemejanza" class="bosque">
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                        <div class="celda"><input type="button" name="BosqueSemejanza[]"></div>
                    </div>
                    <div id="ReySelva" class="bosque">
                        <div class="celda"><input type="button" name="ReySelva[]"></div>
                    </div>
                    <div id="TrioFrondoso" class="bosque">
                        <div class="celda"><input type="button" name="TrioFrondoso[]"></div>
                        <div class="celda"><input type="button" name="TrioFrondoso[]"></div>
                        <div class="celda"><input type="button" name="TrioFrondoso[]"></div>
                    </div>
                    <div id="PradoDiferencia" class="piedra">
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                        <div class="celda"><input type="button" name="PradoDiferencia[]"></div>
                    </div>
                    <div id="PraderaAmor" class="piedra">
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                        <div class="celda"><input type="button" name="PraderAmor[]"></div>
                    </div>
                    <div id="IslaSolitaria" class="piedra">
                        <div class="celda"><input type="button" name="IslaSolitaria[]"></div>
                    </div>
                    <div id="rio" class="piedra bosque">
                        <div class="celda"><input type="button" name="rio[]"></div>
                        <div class="celda"><input type="button" name="rio[]"></div>
                        <div class="celda"><input type="button" name="rio[]"></div>
                        <div class="celda"><input type="button" name="rio[]"></div>
                        <div class="celda"><input type="button" name="rio[]"></div>
                    </div>
                </form>
            </section>
        </main>
            <footer class="cuadradito">
                    <form action="../controllers/PartidaController.php" method="POST" id="formPartida">
                    <button type="submit" class="calcularpuntos">CALCULAR PUNTOS</button>
            </form>
</footer>
    </section>
    <script>
    const usuarios = <?= json_encode($_SESSION['usuarios'] ?? []) ?>;
    </script>
    <script src="../../public/js/juegocalculadora.js"></script>
</body>
</html>
