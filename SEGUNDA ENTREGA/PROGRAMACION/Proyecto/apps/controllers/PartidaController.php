<?php
session_start();
require_once '../models/Database.php';
require_once '../models/PartidaModel.php';

$db = new Database();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'crear_partida') {
    
    $id_usuario = $_SESSION['user_id'];
    $modo = $_POST['modo'] ?? 'seguimiento';
    $fecha = date('Y-m-d');
    $cantidad_jugadores = intval($_POST['cantidad_jugadores'] ?? 2);

    switch ($modo) {
        case 'digital':
        case 'seguimiento':
            $partida = new Partida($id_usuario, $modo, $fecha, $cantidad_jugadores);
            if ($partida->save($conn)) {
                switch ($cantidad_jugadores) {
                    case 2:
                        include '../views/juegocalculadora2.php';
                        break;
                    case 3:
                        include '../views/juegocalculadora3.php';
                        break;
                    case 4:
                        include '../views/juegocalculadora4.php';
                        break;
                    case 5:
                        include '../views/juegocalculadora5.php';
                        break;
                }
            }
            break;
    }
}
?>
