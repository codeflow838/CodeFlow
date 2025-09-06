<?php
require_once 'Database.php';

class UserModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function userExists($usuario) {
        $stmt = $this->conn->prepare("SELECT id FROM usuario WHERE nombre = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }

    public function register($usuario, $edad, $password) {
        $stmt = $this->conn->prepare("INSERT INTO usuario (nombre, edad, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $usuario, $edad, $password);
        return $stmt->execute();
    }

    public function login($usuario, $password) {
        $stmt = $this->conn->prepare("SELECT id, nombre, password FROM usuario WHERE nombre = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($user = $result->fetch_assoc()) {
            if ($user['password'] === $password) {
                return $user;
            } else {
                return "incorrecta"; 
            }
        }
        return false;
    }
}
?>

