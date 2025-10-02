<?php
session_start();
require_once '../models/Database.php';
require_once '../models/PartidaModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tablero = [
        "BosqueSemejanza" => isset($_POST['BosqueSemejanza']) ? $_POST['BosqueSemejanza'] : [],
        "ReySelva" => isset($_POST['ReySelva']) ? $_POST['ReySelva'] : [],
        "TrioFrondoso" => isset($_POST['TrioFrondoso']) ? $_POST['TrioFrondoso'] : [],
        "PradoDiferencia" => isset($_POST['PradoDiferencia']) ? $_POST['PradoDiferencia'] : [],
        "PraderaAmor" => isset($_POST['PraderAmor']) ? $_POST['PraderAmor'] : [],
        "IslaSolitaria" => isset($_POST['IslaSolitaria']) ? $_POST['IslaSolitaria'] : [],
        "Rio" => isset($_POST['rio']) ? $_POST['rio'] : []
    ];

    $partida = new Partida($_SESSION['user_id'], "seguimiento", date("Y-m-d H:i:s"));
    $total = $partida->PuntajeTotal($tablero);

    $_SESSION['puntaje'] = $total;
    $_SESSION['tablero'] = $tablero;

    header("Location: ../views/resultadopartida.php");
    exit;
} else {
    echo "Solicitud inválida.";
}
