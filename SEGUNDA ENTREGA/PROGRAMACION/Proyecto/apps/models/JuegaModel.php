<?php
require_once 'Database.php';

class Juega {
    private $id_usuario;
    private $id_partida;
    private $puntaje;

    public function __construct($id_usuario, $id_partida, $puntaje = 0) {
        $this->id_usuario = $id_usuario;
        $this->id_partida = $id_partida;
        $this->puntaje = $puntaje;
    }

    public function getIdUsuario() { return $this->id_usuario; }
    public function getIdPartida() { return $this->id_partida; }
    public function getPuntaje() { return $this->puntaje; }
    public function setPuntaje($puntaje) { $this->puntaje = $puntaje; }

    // Funcionalidades
    public function registrarPuntaje($conn) {
        $stmt = $conn->prepare(
            "INSERT INTO Juega (ID_Usuario, ID_Partida, Puntaje) 
             VALUES (?, ?, ?) 
             ON DUPLICATE KEY UPDATE Puntaje = VALUES(Puntaje)"
        );
        $stmt->bind_param("iii", $this->id_usuario, $this->id_partida, $this->puntaje);
        return $stmt->execute();
    }

    public static function listarPorPartida($conn, $id_partida) {
        $stmt = $conn->prepare(
            "SELECT ID_Usuario, ID_Partida, Puntaje FROM Juega WHERE ID_Partida = ?"
        );
        $stmt->bind_param("i", $id_partida);
        $stmt->execute();
        $result = $stmt->get_result();

        $jugadas = [];
        while ($row = $result->fetch_assoc()) {
            $jugadas[] = new Juega($row['ID_Usuario'], $row['ID_Partida'], $row['Puntaje']);
        }
        return $jugadas;
    }
}
?>
