<?php
session_start();
require_once '../models/Database.php';
require_once '../models/JugadorModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'agregar') {
        $id_usuario = $_POST['id_usuario'];
        $id_partida = $_POST['id_partida'];
        $turno = $_POST['turno'];
    }
}
?>
