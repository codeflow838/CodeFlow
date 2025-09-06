<?php
require_once 'Database.php';

class Dinosaurio {
    private $id;
    private $especie;

    public function __construct($especie, $id = null) {
        $this->id = $id;
        $this->especie = $especie;
    }

    public function getId() { return $this->id; }
    public function getEspecie() { return $this->especie; }
    public function setEspecie($especie) { $this->especie = $especie; }

    // Funcionalidades
    public function crear($conn) {
        $stmt = $conn->prepare("INSERT INTO dinosaurios (Especie) VALUES (?)");
        $stmt->bind_param("s", $this->especie);
        return $stmt->execute();
    }

    public static function listar($conn) {
        $stmt = $conn->prepare("SELECT ID, Especie FROM dinosaurios");
        $stmt->execute();
        $result = $stmt->get_result();

        $dinos = [];
        while ($row = $result->fetch_assoc()) {
            $dinos[] = new Dinosaurio($row['Especie'], $row['ID']);
        }
        return $dinos;
    }
}
?>
