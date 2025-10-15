<?php
session_start();
require_once '../models/Database.php';
require_once '../models/Usermodel.php';
require_once '../models/PartidaModel.php';

$db = new Database();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {

    $action = $_POST['action'];

    if ($action === 'crear_partida') {

        if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
            include '../views/debesiniciarsesion.html';
            exit;
        }

        $modo = $_POST['modo'] ?? 'seguimiento';
        $fecha = date('Y-m-d');
        $cantidad_jugadores = intval($_POST['cantidad_jugadores'] ?? 2);

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
                            $jugador_logueado = $_SESSION['user_id'];

                            $stmt = $conn->prepare("SELECT id FROM usuario WHERE id != ? LIMIT 1");
                            $stmt->bind_param("i", $jugador_logueado);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $otro_jugador = $result->fetch_assoc()['id'] ?? null;

                            $jugadores = [$jugador_logueado];
                            if ($otro_jugador) {
                                $jugadores[] = $otro_jugador;
                            }

                            include '../views/juegocalculadora2.php';
                            break;

                        case 3:
                            $jugador_logueado = $_SESSION['user_id'];

                            $stmt = $conn->prepare("SELECT id FROM usuario WHERE id != ? LIMIT 2");
                            $stmt->bind_param("i", $jugador_logueado);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $otros_jugadores = [];
                            while ($row = $result->fetch_assoc()) {
                                $otros_jugadores[] = $row['id'];
                            }

                            $jugadores = array_merge([$jugador_logueado], $otros_jugadores);
                            include '../views/juegocalculadora3.php';
                            break;

                        case 4:
                            $jugador_logueado = $_SESSION['user_id'];

                            $stmt = $conn->prepare("SELECT id FROM usuario WHERE id != ? LIMIT 3");
                            $stmt->bind_param("i", $jugador_logueado);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $otros_jugadores = [];
                            while ($row = $result->fetch_assoc()) {
                                $otros_jugadores[] = $row['id'];
                            }

                            $jugadores = array_merge([$jugador_logueado], $otros_jugadores);
                            include '../views/juegocalculadora4.php';
                            break;

                        case 5:
                            $jugador_logueado = $_SESSION['user_id'];

                            $stmt = $conn->prepare("SELECT id FROM usuario WHERE id != ? LIMIT 4");
                            $stmt->bind_param("i", $jugador_logueado);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $otros_jugadores = [];
                            while ($row = $result->fetch_assoc()) {
                                $otros_jugadores[] = $row['id'];
                            }

                            $jugadores = array_merge([$jugador_logueado], $otros_jugadores);
                            include '../views/juegocalculadora5.php';
                            break;

                    }

                }
                break;

        }

    } elseif ($action === 'calcular_puntos') {

        $tablerosPOST = $_POST['tableros'];
        $puntajes = [];

        foreach ($tablerosPOST as $id_usuario => $tablero) {

            $partida = new Partida($id_usuario, 'seguimiento', date('Y-m-d'));
            $puntaje_total = $partida->PuntajeTotal($tablero);

            $usuario = User::obtenerPorId($conn, $id_usuario);
            $nombre_usuario = $usuario ? $usuario->getNombre() : "Jugador $id_usuario";

            $puntajes[$nombre_usuario] = $puntaje_total;

        }

        $_SESSION['puntajes'] = $puntajes;
        header("Location: ../views/resultadospartida.php");
        exit;

    } else {
        echo "Acción no válida.";
        exit;
    }

}
?>
