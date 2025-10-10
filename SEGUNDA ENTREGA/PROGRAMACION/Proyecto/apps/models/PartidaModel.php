<?php
require_once 'Database.php';

class Partida
{
    private $id;
    private $id_usuario;
    private $modo;
    private $fecha;

    public function __construct($id_usuario, $modo, $fecha, $id = null)
    {
        $this->id = $id;
        $this->id_usuario = $id_usuario;
        $this->modo = $modo;
        $this->fecha = $fecha;
    }

    public function getId() { return $this->id; }
    public function getIdUsuario() { return $this->id_usuario; }
    public function getModo() { return $this->modo; }
    public function getFecha() { return $this->fecha; }
    public function setId($id) { $this->id = $id; }
    public function setIdUsuario($id_usuario) { $this->id_usuario = $id_usuario; }
    public function setModo($modo) { $this->modo = $modo; }
    public function setFecha($fecha) { $this->fecha = $fecha; }

    private function BosqueSemejanza($dinos)
    {
        $dinos = array_filter($dinos, fn($d) => !empty($d));
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
        $dinos = array_filter($dinos, fn($d) => !empty($d));
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
        $dinos = array_filter($dinos, fn($d) => !empty($d));
        if (empty($dinos)) return 0;
        $conteo = array_count_values($dinos);
        $puntos = 0;
        foreach ($conteo as $c) $puntos += intdiv($c,2)*5;
        return $puntos;
    }

    private function TrioFrondoso($d1, $d2, $d3)
    {
        $dinos = array_filter([$d1, $d2, $d3], fn($d) => !empty($d));
        if (count($dinos) === 3) 
        {
        return 7;
        } 
            else 
        {
        return 0;
        }
    }

    private function IslaSolitaria($dino, $parque)
    {
        if (empty($dino)) return 0;
        $conteo = 0;
        foreach ($parque as $d) if ($d === $dino) $conteo++;
        return ($conteo === 1) ? 7 : 0;
    }

    private function ReyDeLaSelva($dino, $parques)
    {
        if (empty($dino)) return 0;
        $miConteo = count(array_filter($parques[0], fn($d)=>$d===$dino));
        for ($i=1;$i<count($parques);$i++) {
            $conteoOponente = count(array_filter($parques[$i], fn($d)=>$d===$dino));
            if ($conteoOponente > $miConteo) return 0;
        }
        return 7;
    }

    private function Rio($dinos)
    {
        $dinos = array_filter($dinos, fn($d)=>!empty($d));
        return count($dinos);
    }

    public function PuntajeTotal($tablero)
    {
        $total = [];
        $total['TrioFrondoso'] = $this->TrioFrondoso(
            $tablero['TrioFrondoso'][0] ?? '',
            $tablero['TrioFrondoso'][1] ?? '',
            $tablero['TrioFrondoso'][2] ?? ''
        );
        $total['BosqueSemejanza'] = $this->BosqueSemejanza($tablero['BosqueSemejanza'] ?? []);
        $total['PradoDiferencia'] = $this->PradoDiferencia($tablero['PradoDiferencia'] ?? []);
        $total['PraderaAmor'] = $this->PraderaAmor($tablero['PraderaAmor'] ?? $tablero['PraderAmor'] ?? []);
        $total['IslaSolitaria'] = $this->IslaSolitaria($tablero['IslaSolitaria'][0] ?? '', $tablero['IslaSolitaria'] ?? []);
        $total['ReySelva'] = $this->ReyDeLaSelva($tablero['ReySelva'][0] ?? '', [$tablero['ReySelva'] ?? []]);
        $total['Rio'] = $this->Rio($tablero['Rio'] ?? []);
        $total['Total'] = array_sum($total);
        return $total;
    }
}
?>
