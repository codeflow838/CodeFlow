<?php
session_start();
require_once '../models/Database.php';
require_once '../models/TieneModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'asignar') {
        $id_partida = $_POST['id_partida'];
        $id_recinto = $_POST['id_recinto'];

        $tiene = new Tiene($id_partida, $id_recinto);
        $_SESSION['tiene'] = $tiene;
        header("Location: ../views/tieneAsignado.php");
        exit;

    } else {
        echo "Acción no válida en Tiene.";
    }
} else {
    echo "Solicitud inválida.";
}
