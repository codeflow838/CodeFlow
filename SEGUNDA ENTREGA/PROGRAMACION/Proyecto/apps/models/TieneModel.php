<?php
require_once 'Database.php';

class Tiene 
{
    private $id_partida;
    private $id_recinto;

    public function getIdPartida() 
    { 
        return $this->id_partida; 
    }
    public function getIdRecinto() 
    { 
        return $this->id_recinto; 
    }

    public function setIdPartida($id_partida) 
    { 
        $this->id_partida = $id_partida; 
    }
    public function setIdRecinto($id_recinto) 
    { 
        $this->id_recinto = $id_recinto; 
    }

    public function __construct($id_partida, $id_recinto) 
    {
        $this->id_partida = $id_partida;
        $this->id_recinto = $id_recinto;
    }
}
