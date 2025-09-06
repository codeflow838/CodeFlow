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

    public function crear($conn) {
        $stmt = $conn->prepare(
            "INSERT INTO recintos (Nombre, Puntaje, Restricciones) VALUES (?, ?, ?)"
        );
        $stmt->bind_param("sis", $this->nombre, $this->puntaje, $this->restricciones);
        return $stmt->execute();
    }

    public static function asignarDinosaurio($conn, $id_recinto, $id_dinosaurio) {
        $stmt = $conn->prepare(
            "INSERT INTO hay (ID_Recinto, ID_Dinosaurio) VALUES (?, ?)
             ON DUPLICATE KEY UPDATE ID_Recinto = ID_Recinto"
        );
        $stmt->bind_param("ii", $id_recinto, $id_dinosaurio);
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
}
