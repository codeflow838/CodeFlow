<?php
require_once '../models/PartidaController.php';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comprobar'])) {

    $trio = $_POST['TrioFrondoso'] ?? [];
    $bosque = $_POST['BosqueSemejanza'] ?? [];
    $prado = $_POST['PradoDiferencia'] ?? [];
    $amor = $_POST['PraderaAmor'] ?? [];
    $isla = $_POST['IslaSolitaria'] ?? "";
    $rey = $_POST['ReySelva'] ?? "";
    $rio = $_POST['Rio'] ?? [];
}
?>
