<?php
require_once 'Database.php';

class Jugador {
    private $id_usuario;
    private $id_partida;
    private $turno;

    public function __construct($id_usuario, $id_partida, $turno) {
        $this->id_usuario = $id_usuario;
        $this->id_partida = $id_partida;
        $this->turno = $turno;
    }

    public function getIdUsuario() { return $this->id_usuario; }
    public function getIdPartida() { return $this->id_partida; }
    public function getTurno() { return $this->turno; }
    public function setTurno($turno) { $this->turno = $turno; }

    // Funcionalidades
    public function agregar($conn) {
        $stmt = $conn->prepare("INSERT INTO jugadores (ID_Usuario, ID_Partida, Turno) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $this->id_usuario, $this->id_partida, $this->turno);
        return $stmt->execute();
    }

    public static function listarPorPartida($conn, $id_partida) {
        $stmt = $conn->prepare("SELECT ID_Usuario, ID_Partida, Turno FROM jugadores WHERE ID_Partida = ?");
        $stmt->bind_param("i", $id_partida);
        $stmt->execute();
        $result = $stmt->get_result();

        $jugadores = [];
        while ($row = $result->fetch_assoc()) {
            $jugadores[] = new Jugador($row['ID_Usuario'], $row['ID_Partida'], $row['Turno']);
        }
        return $jugadores;
    }
}
?>
