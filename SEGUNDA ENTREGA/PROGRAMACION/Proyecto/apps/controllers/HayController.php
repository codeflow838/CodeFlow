<?php
session_start();
require_once '../models/Database.php';
require_once '../models/HayModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'asignar') {
        $id_recinto = $_POST['id_recinto'];
        $id_dino = $_POST['id_dino'];

        $hay = new Hay($id_recinto, $id_dino);
        $_SESSION['hay'] = $hay;
        header("Location: ../views/hayAsignado.php");
        exit;

    } else {
        echo "Acción no válida en Hay.";
    }
} else {
    echo "Solicitud inválida.";
}
