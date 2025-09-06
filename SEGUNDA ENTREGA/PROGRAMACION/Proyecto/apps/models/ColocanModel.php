<?php
require_once 'Database.php';

class Colocan {
    private $id_usuario;
    private $id_partida;
    private $id_recinto;
    private $ronda;

    public function __construct($id_usuario, $id_partida, $id_recinto, $ronda) {
        $this->id_usuario = $id_usuario;
        $this->id_partida = $id_partida;
        $this->id_recinto = $id_recinto;
        $this->ronda = $ronda;
    }

    public function getIdUsuario() { return $this->id_usuario; }
    public function getIdPartida() { return $this->id_partida; }
    public function getIdRecinto() { return $this->id_recinto; }
    public function getRonda() { return $this->ronda; }
    public function setRonda($ronda) { $this->ronda = $ronda; }

    // Funcionalidades
    public function registrar($conn) {
        $stmt = $conn->prepare(
            "INSERT INTO colocan (ID_Usuario, ID_Partida, ID_Recinto, Ronda) 
             VALUES (?, ?, ?, ?) 
             ON DUPLICATE KEY UPDATE Ronda = VALUES(Ronda)"
        );
        $stmt->bind_param("iiii", $this->id_usuario, $this->id_partida, $this->id_recinto, $this->ronda);
        return $stmt->execute();
    }

    public static function listarPorPartida($conn, $id_partida) {
        $stmt = $conn->prepare(
            "SELECT ID_Usuario, ID_Partida, ID_Recinto, Ronda FROM colocan WHERE ID_Partida = ?"
        );
        $stmt->bind_param("i", $id_partida);
        $stmt->execute();
        $result = $stmt->get_result();

        $colocaciones = [];
        while ($row = $result->fetch_assoc()) {
            $colocaciones[] = new Colocan($row['ID_Usuario'], $row['ID_Partida'], $row['ID_Recinto'], $row['Ronda']);
        }
        return $colocaciones;
    }
}
?>
