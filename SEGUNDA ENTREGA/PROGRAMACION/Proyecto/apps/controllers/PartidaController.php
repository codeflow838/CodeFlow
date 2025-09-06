<?php
session_start();
require_once '../models/Database.php';
require_once '../models/Partida.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'crear') {
        $id_usuario = $_POST['id_usuario'];
        $fecha = $_POST['fecha'];
        $modo = $_POST['modo'];

        $partida = new Partida($id_usuario, $fecha, $modo);
        if ($partida->crear($conn)) {
            header("Location: ../views/partidaCreada.html");
            exit;
        } else {
            echo "Error al crear la partida.";
        }

    } elseif ($action === 'listar') {
        $id_usuario = $_POST['id_usuario'];
        $partidas = Partida::listarPorUsuario($conn, $id_usuario);
        $_SESSION['partidas'] = $partidas;
        header("Location: ../views/juego.html");
        exit;

    } else {
        echo "Acción no válida.";
    }
} else {
    echo "Solicitud inválida.";
}
?>
