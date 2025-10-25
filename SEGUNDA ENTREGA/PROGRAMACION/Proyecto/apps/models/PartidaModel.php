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
                'IslaSolitaria'    => array_fill(0, 1, ''),
                'ReySelva'         => array_fill(0, 1, ''),
                'Rio'              => array_fill(0, 6, '')
            ];
        }
    }
//REQUERIMIENTO FUNCIONAL "El sistema debe aplicar automáticamente las reglas impuestas por los recintos (TrioFrondoso)"
    private function TrioFrondoso($dinos)
    {
        $dinos = array_filter($dinos, fn($d)=>!empty($d)); //NODO1
    /*NODO2*/return (count($dinos) === 3) ? /*NODO3*/7 : /*NODO4*/ 0;
    }
//REQUERIMIENTO FUNCIONAL "El sistema debe aplicar automáticamente las reglas impuestas por los recintos (BosqueSemejanza)"
    private function BosqueSemejanza($dinos)
    {
    /* NODO 1*/if (empty($dinos) || empty($dinos[0])) /* NODO 2*/return 0; 
    $primera = $dinos[0]; /* NODO 3*/
    $cantidad = 0;
    foreach ($dinos as $dino)/* NODO 4*/ {
        if (empty($dino)) break; /* NODO 5*/
        if ($dino !== $primera) break; /* NODO 6*/
        $cantidad++; /* NODO 7*/
    }

    switch ($cantidad) { /* NODO 8*/
        case 1:
            return 2; /* NODO 9*/
        case 2:
            return 4; /* NODO 10*/
        case 3:
            return 8; /* NODO 11*/
        case 4:
            return 12; /* NODO 12*/
        case 5:
            return 18; /* NODO 13*/
        case 6:
            return 24; /* NODO 14*/
        default:
            return 0; /* NODO 15*/
        }
    }
//REQUERIMIENTO FUNCIONAL "El sistema debe aplicar automáticamente las reglas impuestas por los recintos (PradoDiferencia)"
    private function PradoDiferencia($dinos)
    {
    if (empty($dinos) || empty($dinos[0])) return 0;
    $vistos = [];
    $cantidad = 0;
    foreach ($dinos as $dino) {
        if (empty($dino)) break;
        if (in_array($dino, $vistos)) break;
        $vistos[] = $dino;
        $cantidad++;
    }

        switch ($cantidad)  {
        case 0:
        case 1:
            return 1;
        case 2:
            return 3;
        case 3:
            return 6;
        case 4:
            return 10;
        case 5:
            return 15;
        case 6:
            return 21;
        default:
            return 0;
        }
    }
    //REQUERIMIENTO FUNCIONAL "El sistema debe aplicar automáticamente las reglas impuestas por los recintos (PraderaAmor)"
    private function PraderaAmor($dinos)
    {
        $dinos = array_filter($dinos, fn($d)=>!empty($d));
        if (empty($dinos)) return 0;
        $conteo = array_count_values($dinos);
        $puntos = 0;
        foreach ($conteo as $c) $puntos += intdiv($c,2)*5;
        return $puntos;
    }
    //REQUERIMIENTO FUNCIONAL "El sistema debe aplicar automáticamente las reglas impuestas por los recintos (IslaSolitaria)"
    private function IslaSolitaria($dino = "", $tablero = [])
    {
        if (empty($dino) || empty($tablero)) return 0;
        $conteo = 0;
        foreach ($tablero as $recinto) {
            foreach ($recinto as $d) {
                if ($d === $dino) $conteo++;
            }
        }
        return ($conteo === 1) ? 7 : 0;
    }
    //REQUERIMIENTO FUNCIONAL "El sistema debe aplicar automáticamente las reglas impuestas por los recintos (ReyDeLaSelva)"
    private function ReyDeLaSelva($dino = "", $parques = [])
    {
    if (empty($dino) || empty($parques)) return 0;

    $miParque = $parques[0];
    $miConteo = 0;

    foreach ($miParque as $recinto) {
        foreach ($recinto as $d) {
            if ($d === $dino) $miConteo++;
        }
    }

    for ($i = 1; $i < count($parques); $i++) {
        $otroConteo = 0;
        foreach ($parques[$i] as $recinto) {
            foreach ($recinto as $d) {
                if ($d === $dino) $otroConteo++;
            }
        }
        if ($otroConteo > $miConteo) return 0;
    }

        return 7;
    }
    //REQUERIMIENTO FUNCIONAL "El sistema debe aplicar automáticamente las reglas impuestas por los recintos (rio)"
    private function Rio($dinos)
    {
        $dinos = array_filter($dinos, fn($d) => !empty($d));
        return count($dinos);
    }
//REQUERIMIENTO FUNCIONAL "El sistema debe calcular el puntaje total de cada jugador al finalizar la partida"
    public function PuntajeTotal($tablero = null)
    {
        if ($tablero === null) { //NODO1
            $tablero = $this->tableros[0]; //NODO2
        }

        $total = 0; //NODO3

        $total += $this->TrioFrondoso($tablero['TrioFrondoso'] ?? []); //NODO4
        $total += $this->BosqueSemejanza($tablero['BosqueSemejanza'] ?? []); //NODO5
        $total += $this->PradoDiferencia($tablero['PradoDiferencia'] ?? []); //NODO6
        $total += $this->PraderaAmor($tablero['PraderaAmor'] ?? []); //NODO7

        $total += $this->IslaSolitaria($tablero['IslaSolitaria'][0] ?? "", $tablero); //NODO8

        $total += $this->ReyDeLaSelva($tablero['ReySelva'][0] ?? "", $this->tableros); //NODO9

        $total += $this->Rio($tablero['Rio'] ?? []); //NODO10

        return $total; //NODO11
    }


    public function save($conn)
    {
        $stmt = $conn->prepare("INSERT INTO partida (id_usuario, modo, fecha) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $this->id_usuario, $this->modo, $this->fecha);

        if ($stmt->execute()) {
            $this->id = $stmt->insert_id;
            return true;
        }
        return false;
    }
}
?>
