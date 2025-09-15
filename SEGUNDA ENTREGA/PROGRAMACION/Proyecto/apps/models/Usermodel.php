<?php
require_once 'Database.php';

class User {
    private $id;
    private $nombre;
    private $edad;
    private $password;

    public function __construct($nombre, $edad, $password, $id = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->password = $password;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public static function userExists($conn, $nombre) {
        $stmt = $conn->prepare("SELECT id FROM usuario WHERE nombre = ?");
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }

    public function register($conn) {
        $stmt = $conn->prepare("INSERT INTO usuario (nombre, edad, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $this->nombre, $this->edad, $this->password);
        return $stmt->execute();
    }

    public static function login($conn, $nombre, $password) {
        $stmt = $conn->prepare("SELECT id, nombre, edad, password FROM usuario WHERE nombre = ?");
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
