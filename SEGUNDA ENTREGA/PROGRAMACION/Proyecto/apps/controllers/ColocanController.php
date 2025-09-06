<?php
session_start();
require_once '../models/Database.php';
require_once '../models/ColocanModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'registrar') {
        $id_usuario = $_POST['id_usuario'];
        $id_partida = $_POST['id_partida'];
        $id_recinto = $_POST['id_recinto'];
        $ronda = $_POST['ronda'];
    }
}
?>
