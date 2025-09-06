<?php
require_once 'Database.php';

class Juega {
    private $id_usuario;
    private $id_partida;
    private $puntaje;

    public function getIdUsuario() 
    { 
        return $this->id_usuario; 
    }
    public function getIdPartida() 
    { 
        return $this->id_partida; 
    }
    public function getPuntaje() 
    { 
        return $this->puntaje; 
    }
    public function setPuntaje($puntaje) 
    { 
        $this->puntaje = $puntaje; 
    }
        public function __construct($id_usuario, $id_partida, $puntaje = 0) {
        $this->id_usuario = $id_usuario;
        $this->id_partida = $id_partida;
        $this->puntaje = $puntaje;
    }
}
?>
