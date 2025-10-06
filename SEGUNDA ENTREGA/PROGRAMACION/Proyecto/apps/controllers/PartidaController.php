<?php
session_start();
require_once '../models/Database.php';
require_once '../models/PartidaModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tablero = [
        "BosqueSemejanza" => $_POST['BosqueSemejanza'] ?? [],
        "ReySelva" => $_POST['ReySelva'] ?? [],
        "TrioFrondoso" => $_POST['TrioFrondoso'] ?? [],
        "PradoDiferencia" => $_POST['PradoDiferencia'] ?? [],
        "PraderaAmor" => $_POST['PraderaAmor'] ?? $_POST['PraderAmor'] ?? [],
        "IslaSolitaria" => $_POST['IslaSolitaria'] ?? [],
        "Rio" => $_POST['rio'] ?? []
    ];

    $user_id = $_SESSION['user_id'] ?? null;
    if (!$user_id) { echo "Usuario no identificado"; exit; }

    $partida = new Partida($user_id, "seguimiento", date("Y-m-d H:i:s"));
    $_SESSION['tablero'] = $tablero;
    $_SESSION['puntaje'] = $partida->PuntajeTotal($tablero);

    header("Location: ../views/resultadopartida.php");
    exit;
} else {
    echo "Solicitud inválida.";
}
