<?php
session_start();
require_once '../models/Database.php';
require_once '../models/Usermodel.php';
require_once '../models/PartidaModel.php';

$db = new Database();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {

    $action = $_POST['action'];

    // =============================
    // CREAR PARTIDA
    // =============================
    if ($action === 'crear_partida') {

        if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
            include '../views/debesiniciarsesion.html';
            exit;
        }

        $modo = $_POST['modo'] ?? 'seguimiento';
        $fecha = date('Y-m-d');
        $cantidad_jugadores = intval($_POST['cantidad_jugadores'] ?? 2);

        // Contar usuarios registrados
        $totalUsuarios = User::contarUsuarios($conn);

        if ($totalUsuarios < $cantidad_jugadores) {
            include '../views/errorjugadoresregistrados.html';
            exit;
        }

        switch ($modo) {
            case 'digital':
            case 'seguimiento':
                $id_usuario = $_SESSION['user_id'];
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

    // =============================
    // CALCULAR PUNTOS
    // =============================
    elseif ($action === 'calcular_puntos') {

        $tablerosPOST = $_POST['tableros']; // Array de tableros por usuario
        $puntajes = [];

        foreach ($tablerosPOST as $id_usuario => $tablero) {
            // Crear instancia de Partida (solo para calcular puntaje)
            $partida = new Partida($id_usuario, 'seguimiento', date('Y-m-d'));

            // Puntaje total por usuario
            $puntajes[$id_usuario] = $partida->PuntajeTotal($tablero);
        }

        // Guardamos puntajes en sesión para enviarlos a la vista
        $_SESSION['puntajes'] = $puntajes;

        // Redirigimos a la vista de resultados
        header("Location: ../views/resultadospartida.php");
        exit;
    }

    // =============================
    // ACCIONES NO RECONOCIDAS
    // =============================
    else {
        echo "Acción no válida.";
        exit;
    }
}
?>
