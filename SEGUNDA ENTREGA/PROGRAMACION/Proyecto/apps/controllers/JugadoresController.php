<?php
require_once '../models/Database.php';
require_once '../models/JugadoresModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' 
    && isset($_POST['id_usuario']) 
    && isset($_POST['id_partida']) 
    && isset($_POST['turno'])) 
{
    $jugador = new Jugadores(
        $_POST['id_usuario'],
        $_POST['id_partida'],
        $_POST['turno']
    );

    $stmt = $conn->prepare("
        INSERT INTO jugadores (id_usuario, id_partida, turno)
        VALUES (?, ?, ?)
    ");
    $stmt->bind_param(
        "iii",
        $jugador->getIdUsuario(),
        $jugador->getIdPartida(),
        $jugador->getTurno()
    );

    $stmt->execute();
}
?>
