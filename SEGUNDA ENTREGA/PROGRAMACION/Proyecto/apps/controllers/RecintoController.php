<?php
session_start();
require_once '../models/Database.php';
require_once '../models/Recinto.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'crear') {
        $nombre = $_POST['nombre'];
        $puntaje = $_POST['puntaje'] ?? 0;
        $restricciones = $_POST['restricciones'] ?? "";

        $recinto = new Recinto($nombre, $puntaje, $restricciones);
        if ($recinto->crear($conn)) {
            header("Location: ../views/recintoCreado.html");
            exit;
        } else {
            echo "Error al crear el recinto.";
        }

    } elseif ($action === 'asignarDino') {
        $id_recinto = $_POST['id_recinto'];
        $id_dinosaurio = $_POST['id_dinosaurio'];

        if (Recinto::asignarDinosaurio($conn, $id_recinto, $id_dinosaurio)) {
            header("Location: ../views/asignacionExitosa.html");
            exit;
        } else {
            echo "Error al asignar dinosaurio al recinto.";
        }

    } elseif ($action === 'listar') {
        $recintos = Recinto::listar($conn);
        $_SESSION['recintos'] = $recintos;
        header("Location: ../views/listaRecintos.html");
        exit;

    } else {
        echo "Acción no válida.";
    }
} else {
    echo "Solicitud inválida.";
}
?>
