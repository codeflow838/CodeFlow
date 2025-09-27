<?php
require_once '../models/Database.php';
require_once '../models/PartidaModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_usuario = $_POST['id_usuario'] ?? 1;
    $modo = $_POST['modo'] ?? "normal";
    $fecha = $_POST['fecha'] ?? date('Y-m-d');

    $bosqueSemejanza = $_POST['BosqueSemejanza'] ?? [];
    $reySelva = $_POST['ReySelva'] ?? "";
    $trioFrondoso = $_POST['TrioFrondoso'] ?? [];
    $pradoDiferencia = $_POST['PradoDiferencia'] ?? [];
    $praderaAmor = $_POST['PraderaAmor'] ?? [];
    $islaSolitaria = $_POST['IslaSolitaria'] ?? "";
    $rio = $_POST['Rio'] ?? [];

    $partida = new Partida($id_usuario, $modo, $fecha);

    $puntaje = $partida->PuntajeTotal(
        $trioFrondoso,
        $bosqueSemejanza,
        $pradoDiferencia,
        $praderaAmor,
        $islaSolitaria,
        [], 
        $reySelva,
        [],
        $rio
    );

    echo "<h2>Puntaje total: $puntaje</h2>";
}
?>
