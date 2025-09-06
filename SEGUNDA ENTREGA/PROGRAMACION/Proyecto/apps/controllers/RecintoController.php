<?php
session_start();
require_once '../models/Database.php';
require_once '../models/RecintoModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'crear') {
        $nombre = $_POST['nombre'];
        $puntaje = $_POST['puntaje'] ?? 0;
        $restricciones = $_POST['restricciones'] ?? ""; 
    }
}
?>
