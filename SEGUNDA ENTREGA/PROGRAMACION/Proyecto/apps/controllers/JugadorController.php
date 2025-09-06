<?php
session_start();
require_once '../models/Database.php';
require_once '../models/Jugador.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'agregar') {
        $id_usuario = $_POST['id_usuario'];
        $id_partida = $_POST['id_partida'];
        $turno = $_POST['turno'];

        $jugador = new Jugador($id_usuario, $id_partida, $turno);
        if ($jugador->agregar($conn)) {
            header("Location: ../views/jugadorAgregado.html");
            exit;
        } else {
            echo "Error al agregar jugador.";
        }

    } elseif ($action === 'listar') {
        $id_partida = $_POST['id_partida'];
        $jugadores = Jugador::listarPorPartida($conn, $id_partida);
        $_SESSION['jugadores'] = $jugadores;
        header("Location: ../views/listaJugadores.html");
        exit;

    } else {
        echo "Acción no válida.";
    }
} else {
    echo "Solicitud inválida.";
}
?>
