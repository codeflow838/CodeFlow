<?php
session_start();
$puntaje = $_SESSION['puntaje'] ?? [];
?>

Puntaje en TrioFrondoso: <?= $puntaje['TrioFrondoso'] ?? 0 ?><br>
Puntaje en BosqueSemejanza: <?= $puntaje['BosqueSemejanza'] ?? 0 ?><br>
Puntaje en PradoDiferencia: <?= $puntaje['PradoDiferencia'] ?? 0 ?><br>
Puntaje en PraderaAmor: <?= $puntaje['PraderaAmor'] ?? 0 ?><br>
Puntaje en IslaSolitaria: <?= $puntaje['IslaSolitaria'] ?? 0 ?><br>
Puntaje en ReySelva: <?= $puntaje['ReySelva'] ?? 0 ?><br>
Puntaje en Rio: <?= $puntaje['Rio'] ?? 0 ?><br>
Puntaje total: <?= $puntaje['Total'] ?? 0 ?>
