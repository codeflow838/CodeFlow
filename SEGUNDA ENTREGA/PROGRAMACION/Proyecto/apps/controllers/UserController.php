<?php
session_start();
require_once '../models/Usermodel.php';

$db = new Database();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) 
{
    $action = $_POST['action'];
// REQUERIMIENTO FUNCIONAL "EL USUARIO DEBE PODER REGISTRARSE CON NOMBRE CONTRASEÑA Y EDAD"
    if ($action === 'signup') { //NODO 1
        $nombre = $_POST['usuario'];
        $edad = $_POST['edad'];
        $password = $_POST['password'];

        $user = new User($nombre, $edad, $password);

        if ($user->exists($conn)) /*NODO 2 */{
            header("Location: ../views/usuarioyaexiste.html"); //NODO 3
            exit;
        }

        if ($user->register($conn))/*NODO 4 */ {
            header("Location: ../views/registradoexito.html"); //NODO 5
            exit;
        } else {
            echo "Error al registrar el usuario."; //NODO 6
        }
// REQUERIMIENTO FUNCIONAL "EL USUARIO DEBE PODER INICIAR SESION CON USUARIO Y CONTRASEÑA"
    } elseif ($action === 'login') { //NODO 1
        $nombre = $_POST['usuario'];
        $password = $_POST['password'];
        
        $user = new User($nombre, 0, $password);

        $loginResult = $user->login($conn, $password);

        if ($loginResult instanceof User)/*NODO 2 */ {
            $_SESSION['user_id'] = $loginResult->getId();
            $_SESSION['nombre'] = $loginResult->getNombre();
            header("Location: ../views/inicioexitoso.html"); /*NODO 3 */
            exit;
        } elseif ($loginResult === "incorrecta")/*NODO 4 */ {
            header("Location: ../views/incorrecta.html");
            exit; /*NODO 5 */
        } else {
            header("Location: ../views/noencontrado.html");
            exit; /*NODO 6 */
        }

    } else {
        echo "Acción no válida.";
    }
} else {
    echo "Solicitud inválida.";
}
?>
