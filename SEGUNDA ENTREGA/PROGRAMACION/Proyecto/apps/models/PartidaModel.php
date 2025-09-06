<?php
require_once 'Database.php';

class Partida {
    private $id;
    private $id_usuario;
    private $fecha;
    private $modo;

    public function __construct($id_usuario, $fecha, $modo, $id = null) {
        $this->id = $id;
        $this->id_usuario = $id_usuario;
        $this->fecha = $fecha;
        $this->modo = $modo;
    }

    public function getId() { return $this->id; }
    public function getIdUsuario() { return $this->id_usuario; }
    public function setIdUsuario($id_usuario) { $this->id_usuario = $id_usuario; }
    public function getFecha() { return $this->fecha; }
    public function setFecha($fecha) { $this->fecha = $fecha; }
    public function getModo() { return $this->modo; }
    public function setModo($modo) { $this->modo = $modo; }

    // Funcionalidades
    public function crear($conn) {
        $stmt = $conn->prepare("INSERT INTO partida (ID_Usuario, Fecha, Modo) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $this->id_usuario, $this->fecha, $this->modo);
        return $stmt->execute();
    }

    public static function listarPorUsuario($conn, $id_usuario) {
        $stmt = $conn->prepare("SELECT ID, ID_Usuario, Fecha, Modo FROM partida WHERE ID_Usuario = ?");
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        $partidas = [];
        while ($row = $result->fetch_assoc()) {
            $partidas[] = new Partida($row['ID_Usuario'], $row['Fecha'], $row['Modo'], $row['ID']);
        }
        return $partidas;
    }
}
?>
