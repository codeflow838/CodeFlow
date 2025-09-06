<?php
require_once 'Database.php';

class Jugador {
    private $id_usuario;
    private $id_partida;
    private $turno;

    public function __construct($id_usuario, $id_partida, $turno) {
        $this->id_usuario = $id_usuario;
        $this->id_partida = $id_partida;
        $this->turno = $turno;
    }

    public function getIdUsuario() 
    { 
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
    public function setTurno($turno) 
    { 
        $this->turno = $turno; 
    }
}
?>
