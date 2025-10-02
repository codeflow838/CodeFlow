<?php
require_once 'Database.php';

class Partida 
{
    private $id;
    private $id_usuario;
    private $modo;
    private $fecha;

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
    
    public function __construct($id_usuario, $modo, $fecha, $id = null)
    {
        $this->id = $id;
        $this->id_usuario = $id_usuario;
        $this->modo = $modo;
        $this->fecha = $fecha;
    }

    private function BosqueSemejanza($dinos) 
    {
        $puntos = 0;
        if (count($dinos) > 6) $dinos = array_slice($dinos, 0, 6);
        if (empty($dinos)) return $puntos;
        foreach ($dinos as $dino) if (empty($dino)) return 0;
        $primera = $dinos[0];
        foreach ($dinos as $dino) if ($dino !== $primera) return 0;
        switch (count($dinos)) {
            case 1: $puntos = 2; break;
            case 2: $puntos = 4; break;
            case 3: $puntos = 8; break;
            case 4: $puntos = 12; break;
            case 5: $puntos = 18; break;
            case 6: $puntos = 24; break;
        }
        return $puntos;
    }

    private function PradoDiferencia($dinos) 
    {
        $puntos = 0;
        if (count($dinos) > 6) $dinos = array_slice($dinos, 0, 6);
        if (empty($dinos)) return $puntos;
        foreach($dinos as $dino) if (empty($dino)) return 0;
        $vistos = [];
        foreach ($dinos as $dino) {
            if (in_array($dino, $vistos)) return 0;
            $vistos[] = $dino;
        }
        switch (count($dinos)) {
            case 1: $puntos = 1; break;
            case 2: $puntos = 3; break;
            case 3: $puntos = 6; break;
            case 4: $puntos = 10; break;
            case 5: $puntos = 15; break;
            case 6: $puntos = 21; break;
        }
        return $puntos;
    }

    private function PraderaAmor($dinos) 
    {
        $puntos = 0;
        if (empty($dinos)) return $puntos;
        $conteo = array_count_values($dinos);
        foreach ($conteo as $cantidad) {
            $parejas = intdiv($cantidad, 2);
            $puntos += $parejas * 5;
        }
        return $puntos;
    }

    private function IslaSolitaria($dinos, $parque) 
    {
        if (empty($dinos)) return 0;
        $dino = $dinos[0];
        $conteo = 0;
        foreach ($parque as $d) if ($d === $dino) $conteo++;
        return ($conteo === 1) ? 7 : 0;
    }

    private function ReyDeLaSelva($dinos, $parques) 
    {
        if (empty($dinos)) return 0;
        $dino = $dinos[0];
        $miConteo = 0;
        foreach ($parques[0] as $d) if ($d === $dino) $miConteo++;
        for ($i = 1; $i < count($parques); $i++) {
            $conteoOponente = 0;
            foreach ($parques[$i] as $d) if ($d === $dino) $conteoOponente++;
            if ($conteoOponente > $miConteo) return 0;
        }
        return 7;
    }

    private function TrioFrondoso($dinos) 
    {
        if (count($dinos) < 3) return 0;
        if ($dinos[0] === $dinos[1] && $dinos[1] === $dinos[2]) return 10;
        return 0;
    }

    private function Rio($dinos) 
    {
        if (empty($dinos)) return 0;
        return count($dinos);
    }

    public function PuntajeTotal($tablero) 
    {
        $total = 0;
        $total += $this->TrioFrondoso($tablero["TrioFrondoso"]);
        $total += $this->BosqueSemejanza($tablero["BosqueSemejanza"]);
        $total += $this->PradoDiferencia($tablero["PradoDiferencia"]);
        $total += $this->PraderaAmor($tablero["PraderaAmor"]);
        $total += $this->IslaSolitaria($tablero["IslaSolitaria"], $tablero["IslaSolitaria"]);
        $total += $this->ReyDeLaSelva($tablero["ReySelva"], [$tablero["ReySelva"]]);
        $total += $this->Rio($tablero["Rio"]);
        return $total;
    }
}
