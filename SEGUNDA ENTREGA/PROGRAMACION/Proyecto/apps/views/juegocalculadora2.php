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
    <form action="../controllers/PartidaController.php" method="POST" id="formPartida">

    <section class="tablero">

        <div id="BosqueSemejanza" class="bosque">
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][BosqueSemejanza][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][BosqueSemejanza][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][BosqueSemejanza][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][BosqueSemejanza][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][BosqueSemejanza][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][BosqueSemejanza][]" value="">
            </div>
        </div>

        <div id="ReySelva" class="bosque">
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][ReySelva][]" value="">
            </div>
        </div>

        <div id="TrioFrondoso" class="bosque">
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][TrioFrondoso][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][TrioFrondoso][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][TrioFrondoso][]" value="">
            </div>
        </div>

        <div id="PradoDiferencia" class="piedra">
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][PradoDiferencia][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][PradoDiferencia][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][PradoDiferencia][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][PradoDiferencia][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][PradoDiferencia][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][PradoDiferencia][]" value="">
            </div>
        </div>

        <div id="PraderaAmor" class="piedra">
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][PraderaAmor][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][PraderaAmor][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][PraderaAmor][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][PraderaAmor][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][PraderaAmor][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][PraderaAmor][]" value="">
            </div>
        </div>

        <div id="IslaSolitaria" class="piedra">
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][IslaSolitaria][]" value="">
            </div>
        </div>

        <div id="Rio" class="piedra bosque">
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][Rio][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][Rio][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][Rio][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][Rio][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][Rio][]" value="">
            </div>
        </div>
</section>


    <section class="tablero">

        <div id="BosqueSemejanza" class="bosque">
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][BosqueSemejanza][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][BosqueSemejanza][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][BosqueSemejanza][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][BosqueSemejanza][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][BosqueSemejanza][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][BosqueSemejanza][]" value="">
            </div>
        </div>

        <div id="ReySelva" class="bosque">
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][ReySelva][]" value="">
            </div>
        </div>

        <div id="TrioFrondoso" class="bosque">
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][TrioFrondoso][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][TrioFrondoso][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][TrioFrondoso][]" value="">
            </div>
        </div>

        <div id="PradoDiferencia" class="piedra">
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][PradoDiferencia][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][PradoDiferencia][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][PradoDiferencia][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][PradoDiferencia][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][PradoDiferencia][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][PradoDiferencia][]" value="">
            </div>
        </div>

        <div id="PraderaAmor" class="piedra">
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][PraderaAmor][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][PraderaAmor][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][PraderaAmor][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][PraderaAmor][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][PraderaAmor][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][PraderaAmor][]" value="">
            </div>
        </div>

        <div id="IslaSolitaria" class="piedra">
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][IslaSolitaria][]" value="">
            </div>
        </div>

        <div id="Rio" class="piedra bosque">
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][Rio][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][Rio][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][Rio][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][Rio][]" value="">
            </div>
            <div class="celda">
                <input type="button" class="btn-dino">
                <input type="hidden" name="tableros[<?= $id_usuario ?>][Rio][]" value="">
            </div>
        </div>
</section>

        </main>
            <footer class="cuadradito">
                        <input type="hidden" name="action" value="calcular_puntos">
                        <button type="submit" class="calcularpuntos">CALCULAR PUNTOS</button>
            </footer>
    </section>
    </form>
    <script src="../../public/js/juegocalculadora.js"></script>
</body>
</html>
