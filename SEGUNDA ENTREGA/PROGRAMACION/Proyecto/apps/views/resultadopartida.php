<?php
session_start();
$puntajesTotales = $_SESSION['puntajesTotales'] ?? [];
?>

<h1>Resultados de la partida</h1>

<?php foreach ($puntajesTotales as $jugador => $total): ?>
    <p><?= htmlspecialchars($jugador) ?>: <?= $total ?></p>
<?php endforeach; ?>
