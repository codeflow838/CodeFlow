<?php
session_start();
require_once '../models/Database.php';
require_once '../models/JuegaModel.php';
require_once '../models/JugadorModel.php';
require_once '../models/PartidaModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'puntuar') {
        $id_usuario = $_POST['id_usuario'];
        $id_partida = $_POST['id_partida'];
        $puntaje = $_POST['puntaje'];
    }
}
?>
