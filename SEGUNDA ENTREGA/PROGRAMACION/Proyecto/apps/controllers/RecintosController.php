<?php
session_start();
require_once '../models/Database.php';
require_once '../models/RecintosModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'crear') {
        $nombre = $_POST['nombre'];
        $puntaje = $_POST['puntaje'];
        $restricciones = $_POST['restricciones'];

        $recinto = new Recintos($nombre, $puntaje, $restricciones);

        $_SESSION['recinto'] = $recinto;
        header("Location: ../views/recintoCreado.php");
        exit;

    } elseif ($action === 'editar') {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $puntaje = $_POST['puntaje'];
        $restricciones = $_POST['restricciones'];

        $recinto = new Recintos($nombre, $puntaje, $restricciones, $id);

        $_SESSION['recinto_editado'] = $recinto;
        header("Location: ../views/recintoEditado.php");
        exit;

    } else {
        echo "Acción no válida en Recintos.";
    }
} else {
    echo "Solicitud inválida.";
}
