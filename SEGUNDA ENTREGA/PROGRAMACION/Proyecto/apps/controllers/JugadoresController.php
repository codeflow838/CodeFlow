<?php
session_start();
require_once '../models/Database.php';
require_once '../models/JugadoresModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'agregar') {
        $id_usuario = $_POST['id_usuario'];
        $id_partida = $_POST['id_partida'];
        $turno = $_POST['turno'];

        $jugador = new Jugadores($id_usuario, $id_partida, $turno);
        $_SESSION['jugador'] = $jugador;
        header("Location: ../views/jugadorAgregado.php");
        exit;

    } elseif ($action === 'editar') {
        $id_usuario = $_POST['id_usuario'];
        $id_partida = $_POST['id_partida'];
        $turno = $_POST['turno'];

        $jugador = new Jugadores($id_usuario, $id_partida, $turno);
        $_SESSION['jugador_editado'] = $jugador;
        header("Location: ../views/jugadorEditado.php");
        exit;

    } else {
        echo "Acción no válida en Jugadores.";
    }
} else {
    echo "Solicitud inválida.";
}
