<?php
require_once 'Database.php';
require_once 'User.php';

class UserModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function userExists($nombre) {
        $stmt = $this->conn->prepare("SELECT id FROM usuario WHERE nombre = ?");
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }

    public function register(User $user) {
        $stmt = $this->conn->prepare("INSERT INTO usuario (nombre, edad, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $user->getNombre(), $user->getEdad(), $user->getPassword());
        return $stmt->execute();
    }

    public function login($nombre, $password) {
        $stmt = $this->conn->prepare("SELECT id, nombre, edad, password FROM usuario WHERE nombre = ?");
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($data = $result->fetch_assoc()) {
            if ($data['password'] === $password) {
                return new User($data['nombre'], $data['edad'], $data['password'], $data['id']);
            } else {
                return "incorrecta";
            }
        }
        return false;
    }
}
?>