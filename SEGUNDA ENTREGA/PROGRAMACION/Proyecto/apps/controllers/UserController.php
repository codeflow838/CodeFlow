<?php
session_start();
require_once '../models/Database.php';
require_once '../models/Usermodel.php';

$userModel = new UserModel($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {

    $action = $_POST['action'];

    if ($action === 'signup') {
        // Datos del formulario de signup
        $usuario = $_POST['usuario'];
        $edad = $_POST['edad'];
        $password = $_POST['password'];

        // Verificar si el usuario ya existe
        if ($userModel->userExists($usuario)) {
            header("Location: ../views/usuarioyaexiste.html");
            exit;
        }

        // Registrar usuario
        if ($userModel->register($usuario, $edad, $password)) {
            header("Location: ../views/registradoexito.html");
            exit;
        } else {
            echo "Error al registrar el usuario.";
        }

    } elseif ($action === 'login') {
        // Datos del formulario de login
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        // Intentar login
        $user = $userModel->login($usuario, $password);

        if ($user === false) {
            // Usuario no encontrado
            header("Location: ../views/noencontrado.html");
            exit;
        } elseif ($user === "incorrecta") {
            // Contraseña incorrecta
            header("Location: ../views/incorrecta.html");
            exit;
        } else {
            // Login exitoso
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nombre'] = $user['nombre'];
            header("Location: ../views/inicioexitoso.html");
            exit;
        }

    } else {
        echo "Acción no válida.";
    }

} else {
    echo "Solicitud inválida.";
}
?>
