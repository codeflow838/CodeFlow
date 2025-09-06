<?php
session_start();
require_once '../models/Database.php';
require_once '../models/Colocan.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'registrar') {
        $id_usuario = $_POST['id_usuario'];
        $id_partida = $_POST['id_partida'];
        $id_recinto = $_POST['id_recinto'];
        $ronda = $_POST['ronda'];

        $colocan = new Colocan($id_usuario, $id_partida, $id_recinto, $ronda);
        if ($colocan->registrar($conn)) {
            header("Location: ../views/colocacionRegistrada.html");
            exit;
        } else {
            echo "Error al registrar colocación.";
        }

    } elseif ($action === 'listar') {
        $id_partida = $_POST['id_partida'];
        $colocaciones = Colocan::listarPorPartida($conn, $id_partida);
        $_SESSION['colocaciones'] = $colocaciones;
        header("Location: ../views/listaColocaciones.html");
        exit;

    } else {
        echo "Acción no válida.";
    }
} else {
    echo "Solicitud inválida.";
}
?>
