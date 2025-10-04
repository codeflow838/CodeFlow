<?php
session_start();
require_once '../models/Database.php';
require_once '../models/Usermodel.php';

$db = new Database();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'signup') {
        $nombre = $_POST['usuario'];
        $edad = $_POST['edad'];
        $password = $_POST['password'];

        $user = new User($nombre, $edad, $password);

        if ($user->exists($conn)) {
            header("Location: ../views/usuarioyaexiste.html");
            exit;
        }

        if ($user->register($conn)) {
            header("Location: ../views/registradoexito.html");
            exit;
        } else {
            echo "Error al registrar el usuario.";
        }

    } elseif ($action === 'login') {
        $nombre = $_POST['usuario'];
        $password = $_POST['password'];
        
        $user = new User($nombre, 0, $password);

        $loginResult = $user->login($conn, $password);

        if ($loginResult instanceof User) {
            $_SESSION['user_id'] = $loginResult->getId();
            $_SESSION['nombre'] = $loginResult->getNombre();
            header("Location: ../views/inicioexitoso.html");
            exit;
        } elseif ($loginResult === "incorrecta") {
            header("Location: ../views/incorrecta.html");
            exit;
        } else {
            header("Location: ../views/noencontrado.html");
            exit;
        }

    } else {
        echo "Acción no válida.";
    }
} else {
    echo "Solicitud inválida.";
}
?>
