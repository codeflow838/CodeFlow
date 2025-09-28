<?php
session_start();
require_once '../models/Database.php';
require_once '../models/ColocanModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'colocar') {
        $id_usuario = $_POST['id_usuario'];
        $id_partida = $_POST['id_partida'];
        $id_recinto = $_POST['id_recinto'];
        $id_dino = $_POST['id_dino'];
        $ronda = $_POST['ronda'];

        $colocacion = new Colocan($id_usuario, $id_partida, $id_recinto, $id_dino, $ronda);
        $_SESSION['colocacion'] = $colocacion;
        header("Location: ../views/colocado.php");
        exit;

    } else {
        echo "Acción no válida en Colocan.";
    }
} else {
    echo "Solicitud inválida.";
}
