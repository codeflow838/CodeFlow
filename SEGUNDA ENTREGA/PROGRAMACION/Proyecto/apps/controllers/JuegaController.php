<?php
session_start();
require_once '../models/Database.php';
require_once '../models/Juega.php';
require_once '../models/Jugador.php';
require_once '../models/Partida.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'puntuar') {
        $id_usuario = $_POST['id_usuario'];
        $id_partida = $_POST['id_partida'];
        $puntaje = $_POST['puntaje'];

        $jugador = new Jugador($id_usuario, $id_partida, null);
        $partida = new Partida($id_usuario, null, null, $id_partida);
        $juega = new Juega($jugador, $partida, $puntaje);

        if ($juega->registrar($conn)) {
            header("Location: ../views/puntajeRegistrado.html");
            exit;
        } else {
            echo "Error al registrar puntaje.";
        }

    } else {
        echo "Acción no válida.";
    }
} else {
    echo "Solicitud inválida.";
}
?>
