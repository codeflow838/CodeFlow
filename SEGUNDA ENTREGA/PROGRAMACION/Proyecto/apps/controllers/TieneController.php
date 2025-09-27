<?php
require_once '../models/PartidaController.php';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comprobar'])) {

    // Recoger arrays
    $trio = $_POST['TrioFrondoso'] ?? [];
    $bosque = $_POST['BosqueSemejanza'] ?? [];
    $prado = $_POST['PradoDiferencia'] ?? [];
    $amor = $_POST['PraderaAmor'] ?? [];
    $isla = $_POST['IslaSolitaria'] ?? "";
    $rey = $_POST['ReySelva'] ?? "";
    $rio = $_POST['Rio'] ?? [];

    // Instanciar modelo (sin guardar)
    $partida = new Partida(null, null, null);

    // Calcular puntos
    $puntajeTrio = $partida->TrioFrondoso(...$trio);
    $puntajeBosque = $partida->BosqueSemejanza($bosque);
    $puntajePrado = $partida->PradoDiferencia($prado);
    $puntajeAmor = $partida->PraderaAmor($amor);
    $puntajeIsla = $partida->IslaSolitaria($isla, []);
    $puntajeRey = $partida->ReyDeLaSelva($rey, []);
    $puntajeRio = $partida->Rio($rio);

    $total = $puntajeTrio + $puntajeBosque + $puntajePrado + $puntajeAmor + $puntajeIsla + $puntajeRey + $puntajeRio;

    // Mostrar resultados
    echo "<h1>Resultados de la Partida (Borrador)</h1>";
    echo "<p>Trío Frondoso: $puntajeTrio puntos</p>";
    echo "<p>Bosque de la Semejanza: $puntajeBosque puntos</p>";
    echo "<p>Prado de la Diferencia: $puntajePrado puntos</p>";
    echo "<p>Pradera del Amor: $puntajeAmor puntos</p>";
    echo "<p>Isla Solitaria: $puntajeIsla puntos</p>";
    echo "<p>Rey de la Selva: $puntajeRey puntos</p>";
    echo "<p>Río: $puntajeRio puntos</p>";
    echo "<h2>Total: $total puntos</h2>";
    echo '<a href="../views/partida.php">Volver a editar</a>';
}
?>
