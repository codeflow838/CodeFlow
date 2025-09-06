<?php
class Colocan {
    private $id_usuario;
    private $id_partida;
    private $id_recinto;
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
    public function getRonda() 
    { 
        return $this->ronda; 
    }
    public function setRonda($ronda) 
    { 
        $this->ronda = $ronda; 
    }
    
        public function __construct($id_usuario, $id_partida, $id_recinto, $ronda) {
        $this->id_usuario = $id_usuario;
        $this->id_partida = $id_partida;
        $this->id_recinto = $id_recinto;
        $this->ronda = $ronda;
    }
}
?>
