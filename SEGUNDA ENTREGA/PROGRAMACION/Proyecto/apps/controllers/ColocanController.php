<?php
require_once '../models/Database.php';
require_once '../models/ColocanModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' 
    && isset($_POST['id_usuario']) 
    && isset($_POST['id_partida']) 
    && isset($_POST['id_recinto']) 
    && isset($_POST['id_dino']) 
    && isset($_POST['ronda'])) 
{
    $colocan = new Colocan(
        $_POST['id_usuario'],
        $_POST['id_partida'],
        $_POST['id_recinto'],
        $_POST['id_dino'],
        $_POST['ronda']
    );

    $stmt = $conn->prepare("
        INSERT INTO colocan (id_usuario, id_partida, id_recinto, id_dino, ronda)
        VALUES (?, ?, ?, ?, ?)
    ");
    $stmt->bind_param(
        "iiiii",
        $colocan->getIdUsuario(),
        $colocan->getIdPartida(),
        $colocan->getIdRecinto(),
        $colocan->getIdDino(),
        $colocan->getRonda()
    );

    $stmt->execute();
}
?>
