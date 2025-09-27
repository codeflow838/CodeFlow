<?php
require_once 'Database.php';

class Jugadores 
{
    private $id_usuario;
    private $id_partida;
    private $turno;

    public function getIdUsuario() {
        
        return $this->id_usuario; 
    }
    public function getIdPartida() 
    {
        return $this->id_partida; 
    }
    public function getTurno() 
    { 
        return $this->turno; 
    }

    public function setIdUsuario($id_usuario) 
    { 
        $this->id_usuario = $id_usuario; 
    }
    public function setIdPartida($id_partida) { 
        $this->id_partida = $id_partida; 
    }
    public function setTurno($turno) { 
        $this->turno = $turno; 
    }

    public function __construct($id_usuario, $id_partida, $turno) 
    {
        $this->id_usuario = $id_usuario;
        $this->id_partida = $id_partida;
        $this->turno = $turno;
    }
}
