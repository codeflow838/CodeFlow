<?php
session_start();
require_once '../models/Database.php';
require_once '../models/DinosauriosModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'crear') {
        $especie = $_POST['especie'];
        $dino = new Dinosaurios($especie);

        $_SESSION['dino'] = $dino;
        header("Location: ../views/dinoCreado.php");
        exit;

    } elseif ($action === 'editar') {
        $id = $_POST['id'];
        $especie = $_POST['especie'];

        $dino = new Dinosaurios($especie, $id);
        $_SESSION['dino_editado'] = $dino;
        header("Location: ../views/dinoEditado.php");
        exit;

    } else {
        echo "Acción no válida en Dinosaurios.";
    }
} else {
    echo "Solicitud inválida.";
}
