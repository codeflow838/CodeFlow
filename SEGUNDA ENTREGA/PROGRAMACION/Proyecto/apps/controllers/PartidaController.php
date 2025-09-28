<?php
session_start();
require_once '../models/Database.php';
require_once '../models/PartidaModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bosque = isset($_POST['BosqueSemejanza']) ? $_POST['BosqueSemejanza'] : [];
    $prado = isset($_POST['PradoDiferencia']) ? $_POST['PradoDiferencia'] : [];
    $pradera = isset($_POST['PraderAmor']) ? $_POST['PraderAmor'] : [];
    $isla = isset($_POST['IslaSolitaria'][0]) ? $_POST['IslaSolitaria'][0] : "";
    $rey = isset($_POST['ReySelva'][0]) ? $_POST['ReySelva'][0] : "";
    $trio = isset($_POST['TrioFrondoso']) ? $_POST['TrioFrondoso'] : [];
    $rio = isset($_POST['rio']) ? $_POST['rio'] : [];

    $partida = new Partida($_SESSION['user_id'], "seguimiento", date("Y-m-d H:i:s"));

    $total = $partida->PuntajeTotal(
        $trio,
        $bosque,
        $prado,
        $pradera,
        $isla,
        [$isla],
        $rey,
        [[$rey]],
        $rio
    );

    $_SESSION['puntaje'] = $total;

    header("Location: ../views/resultadopartida.php");
    exit;
} else {
    echo "Solicitud inválida.";
}
