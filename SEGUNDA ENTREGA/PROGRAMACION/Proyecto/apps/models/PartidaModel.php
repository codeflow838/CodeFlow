<?php
require_once 'Database.php';

class Partida
{
    private $id;
    private $id_usuario;
    private $modo;
    private $fecha;
    private $tableros = [];

    public function __construct($id_usuario, $modo, $fecha, $cantidad_jugadores = 2, $id = null)
    {
        $this->id = $id;
        $this->id_usuario = $id_usuario;
        $this->modo = $modo;
        $this->fecha = $fecha;
        $this->inicializarTableros($cantidad_jugadores);
    }

    public function getId() 
    { 
        return $this->id; 
    }
    public function getIdUsuario() 
    { 
        return $this->id_usuario; 
    }
    public function getModo() 
    { 
        return $this->modo; 
    }
    public function getFecha() 
    { 
        return $this->fecha; 
    }
    public function getTableros() 
    { 
        return $this->tableros; 
    }

    public function setId($id) 
    { 
        $this->id = $id; 
    }
    public function setIdUsuario($id_usuario) 
    { 
        $this->id_usuario = $id_usuario; 
    }
    public function setModo($modo) 
    { 
        $this->modo = $modo; 
    }
    public function setFecha($fecha) 
    { 
        $this->fecha = $fecha; 
    }

    private function inicializarTableros($cantidad_jugadores)
    {
        for ($i = 0; $i < $cantidad_jugadores; $i++) {
            $this->tableros[$i] = [
                'TrioFrondoso'     => array_fill(0, 3, ''),
                'BosqueSemejanza'  => array_fill(0, 6, ''),
                'PradoDiferencia'  => array_fill(0, 6, ''),
                'PraderaAmor'      => array_fill(0, 6, ''),
                'IslaSolitaria'    => array_fill(0, 6, ''),
                'ReySelva'         => array_fill(0, 6, ''),
                'Rio'              => array_fill(0, 6, '')
            ];
        }
    }

    private function TrioFrondoso($dinos)
    {
        $dinos = array_filter($dinos, fn($d)=>!empty($d));
        return (count($dinos) === 3) ? 7 : 0;
    }

    private function BosqueSemejanza($dinos)
    {
        $dinos = array_filter($dinos, fn($d)=>!empty($d));
        if (empty($dinos)) return 0;
        $primera = $dinos[0];
        foreach ($dinos as $dino) if ($dino !== $primera) return 0;
        switch (count($dinos)) {
            case 1: return 2;
            case 2: return 4;
            case 3: return 8;
            case 4: return 12;
            case 5: return 18;
            case 6: return 24;
        }
        return 0;
    }

    private function PradoDiferencia($dinos)
    {
        $dinos = array_filter($dinos, fn($d)=>!empty($d));
        if (empty($dinos)) return 0;
        if (count($dinos) !== count(array_unique($dinos))) return 0;
        switch (count($dinos)) {
            case 1: return 1;
            case 2: return 3;
            case 3: return 6;
            case 4: return 10;
            case 5: return 15;
            case 6: return 21;
        }
        return 0;
    }

    private function PraderaAmor($dinos)
    {
        $dinos = array_filter($dinos, fn($d)=>!empty($d));
        if (empty($dinos)) return 0;
        $conteo = array_count_values($dinos);
        $puntos = 0;
        foreach ($conteo as $c) $puntos += intdiv($c,2)*5;
        return $puntos;
    }

    private function IslaSolitaria($dinos)
    {
        $dinos = array_filter($dinos, fn($d)=>!empty($d));
        $conteo = array_count_values($dinos);
        $puntos = 0;
        foreach ($conteo as $c) if ($c === 1) $puntos += 7;
        return $puntos;
    }

    private function ReyDeLaSelva($dinos, $parques)
    {
        if (empty($dinos)) return 0;
        $miConteo = count(array_filter($parques[0], fn($d)=>in_array($d,$dinos)));
        for ($i=1;$i<count($parques);$i++) {
            $conteoOponente = count(array_filter($parques[$i], fn($d)=>in_array($d,$dinos)));
            if ($conteoOponente > $miConteo) return 0;
        }
        return 7;
    }

    private function Rio($dinos)
    {
        return count(array_filter($dinos, fn($d)=>!empty($d)));
    }

    public function PuntajeTotal($tablero)
    {
        $total = 0;
        $total += $this->TrioFrondoso($tablero['TrioFrondoso'] ?? []);
        $total += $this->BosqueSemejanza($tablero['BosqueSemejanza'] ?? []);
        $total += $this->PradoDiferencia($tablero['PradoDiferencia'] ?? []);
        $total += $this->PraderaAmor($tablero['PraderaAmor'] ?? []);
        $total += $this->IslaSolitaria($tablero['IslaSolitaria'] ?? []);
        $total += $this->ReyDeLaSelva($tablero['ReySelva'] ?? [], [$tablero['ReySelva'] ?? []]);
        $total += $this->Rio($tablero['Rio'] ?? []);
        return $total;
    }

    public function save($conn)
    {
        $stmt = $conn->prepare("INSERT INTO Partida (ID_usuario, Modo, Fecha) VALUES (?, ?, ?)");
        if (!$stmt) return false;

        $stmt->bind_param("iss", $this->id_usuario, $this->modo, $this->fecha);

        if ($stmt->execute()) {
            $this->id = $stmt->insert_id;
            return true;
        }
        return false;
    }
}
?>
