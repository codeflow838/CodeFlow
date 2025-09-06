<?php
session_start();
require_once '../models/Database.php';
require_once '../models/PartidaModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'crear') {
        $id_usuario = $_POST['id_usuario'];
        $fecha = $_POST['fecha'];
        $modo = $_POST['modo'];
    }
}
?>