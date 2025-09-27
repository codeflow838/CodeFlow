<?php
require_once 'Database.php';
class Colocan 
{
    private $id_usuario;
    private $id_partida;
    private $id_recinto;
    private $id_dino;
    private $ronda;

    public function getIdUsuario() 
    { 
        return $this->id_usuario; 
    }
    public function getIdPartida() 
    { 
        return $this->id_partida; 
    }
    public function getIdRecinto() 
    { 
        return $this->id_recinto; 
    }
    public function getIdDino() 
    { 
        return $this->id_dino; 
    }
    public function getRonda() 
    { 
        return $this->ronda; 
    }

    public function setIdUsuario($id_usuario) 
    { 
        $this->id_usuario = $id_usuario; 
    }
    public function setIdPartida($id_partida) 
    { 
        $this->id_partida = $id_partida; 
    }
    public function setIdRecinto($id_recinto) 
    { 
        $this->id_recinto = $id_recinto; 
    }
    public function setIdDino($id_dino) 
    { 
        $this->id_dino = $id_dino; 
    }
    public function setRonda($ronda) 
    { 
        $this->ronda = $ronda; 
    }

    public function __construct($id_usuario, $id_partida, $id_recinto, $id_dino , $ronda) 
    {
        $this->id_usuario = $id_usuario;
        $this->id_partida = $id_partida;
        $this->id_recinto = $id_recinto;
        $this->id_dino = $id_dino;
        $this->ronda = $ronda;
    }
}
