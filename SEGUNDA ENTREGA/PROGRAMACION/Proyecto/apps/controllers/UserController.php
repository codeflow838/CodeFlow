<?php
session_start();
require_once '../models/Database.php';
require_once '../models/User.php';
require_once '../models/UserModel.php';

$userModel = new UserModel($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'signup') {
        $nombre = $_POST['usuario'];
        $edad = $_POST['edad'];
        $password = $_POST['password'];

        if ($userModel->userExists($nombre)) {
            header("Location: ../views/usuarioyaexiste.html");
            exit;
        }

        $user = new User($nombre, $edad, $password);
        if ($userModel->register($user)) {
            header("Location: ../views/registradoexito.html");
            exit;
        } else {
            echo "Error al registrar el usuario.";
        }

    } elseif ($action === 'login') {
        $nombre = $_POST['usuario'];
        $password = $_POST['password'];

        $user = $userModel->login($nombre, $password);

        if ($user instanceof User) {
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['nombre'] = $user->getNombre();
            header("Location: ../views/inicioexitoso.html");
            exit;
        } elseif ($user === "incorrecta") {
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