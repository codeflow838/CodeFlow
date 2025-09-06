<?php
class Recinto {
    private $id;
    private $nombre;
    private $puntaje;
    private $restricciones;

    public function __construct($nombre, $puntaje = 0, $restricciones = "", $id = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->puntaje = $puntaje;
        $this->restricciones = $restricciones;
    }

    // Getters y setters
    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function getPuntaje() { return $this->puntaje; }
    public function setPuntaje($puntaje) { $this->puntaje = $puntaje; }
    public function getRestricciones() { return $this->restricciones; }
    public function setRestricciones($restricciones) { $this->restricciones = $restricciones; }

    // Métodos para la base de datos
    public function crear($conn) {
        $stmt = $conn->prepare("INSERT INTO recintos (Nombre, Puntaje, Restricciones) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $this->nombre, $this->puntaje, $this->restricciones);
        return $stmt->execute();
    }

    public static function listar($conn) {
        $stmt = $conn->prepare("SELECT ID, Nombre, Puntaje, Restricciones FROM recintos");
        $stmt->execute();
        $result = $stmt->get_result();

        $recintos = [];
        while ($row = $result->fetch_assoc()) {
            $recintos[] = new Recinto($row['Nombre'], $row['Puntaje'], $row['Restricciones'], $row['ID']);
        }
        return $recintos;
    }

    public static function asignarDinosaurio($conn, $id_recinto, $id_dinosaurio) {
        $stmt = $conn->prepare(
            "INSERT INTO hay (ID_Recinto, ID_Dinosaurio) VALUES (?, ?)
             ON DUPLICATE KEY UPDATE ID_Recinto = ID_Recinto"
        );
        $stmt->bind_param("ii", $id_recinto, $id_dinosaurio);
        return $stmt->execute();
    }

    public static function listarDinosaurios($conn, $id_recinto) {
        $stmt = $conn->prepare(
            "SELECT d.ID, d.Especie
             FROM dinosaurios d
             INNER JOIN hay h ON d.ID = h.ID_Dinosaurio
             WHERE h.ID_Recinto = ?"
        );
        $stmt->bind_param("i", $id_recinto);
        $stmt->execute();
        $result = $stmt->get_result();

        $dinosaurios = [];
        while ($row = $result->fetch_assoc()) {
            $dinosaurios[] = [
                'id' => $row['ID'],
                'especie' => $row['Especie']
            ];
        }
        return $dinosaurios;
    }
}
?>
