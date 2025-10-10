<?php
session_start();
require_once '../models/Database.php';
require_once '../models/PartidaModel.php';

// Conexión a la base de datos
$db = new Database();
$conn = $db->getConnection();

// Obtener todos los usuarios registrados
$stmt = $conn->prepare("SELECT nombre FROM usuario");
$stmt->execute();
$result = $stmt->get_result();
$usuarios = [];
while ($row = $result->fetch_assoc()) {
    $usuarios[] = $row['nombre'];
}
$_SESSION['usuarios'] = $usuarios;

// Comprobar que hay al menos 5 usuarios para poder iniciar la partida
if (count($usuarios) < 5) {
    die("Se necesitan al menos 5 usuarios registrados para crear la partida.");
}

// Comprobar que hay un usuario logueado
$user_id = $_SESSION['user_id'] ?? null;
if (!$user_id) {
    header("Location: ../views/noencontrado.html");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recintos
    $recintos = [
        "BosqueSemejanza",
        "ReySelva",
        "TrioFrondoso",
        "PradoDiferencia",
        "PraderaAmor",
        "IslaSolitaria",
        "Rio"
    ];

    $puntajesTotales = [];

    // Recorremos cada jugador (cada formulario enviado)
    foreach ($usuarios as $jugadorIndex => $nombreJugador) {

        $tableroJugador = [];

        // Recorremos cada recinto
        foreach ($recintos as $recinto) {
            if (isset($_POST[$recinto][$jugadorIndex])) {
                // Los valores vienen como string separados por comas, los convertimos en array
                $tableroJugador[$recinto] = explode(',', $_POST[$recinto][$jugadorIndex]);
            } else {
                $tableroJugador[$recinto] = [];
            }
        }

        // Guardamos el tablero del jugador en sesión (opcional)
        $_SESSION['tablero'][$jugadorIndex] = $tableroJugador;

        // Calculamos el puntaje total del jugador
        $partida = new Partida($user_id, "seguimiento", date("Y-m-d H:i:s"));
        $puntajeTotal = $partida->PuntajeTotal($tableroJugador);

        // Solo nos interesa el total
        $puntajesTotales[$nombreJugador] = $puntajeTotal['Total'] ?? 0;
    }

    // Guardamos los puntajes totales en sesión
    $_SESSION['puntajesTotales'] = $puntajesTotales;

    // Redirigimos a la vista de resultados
    header("Location: ../views/resultadopartida.php");
    exit;
}

// Incluir la vista del juego si no es POST
include '../views/juegocalculadora.php';
