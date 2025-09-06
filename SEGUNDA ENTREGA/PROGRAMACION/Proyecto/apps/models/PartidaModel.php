<?php
require_once 'Database.php';

class Partida {
    private $id;
    private $id_usuario;
    private $fecha;
    private $modo;

    public function getId() 
    { 
        return $this->id; 
    }
    public function getIdUsuario() 
    { 
        return $this->id_usuario; 
    }
    public function setIdUsuario($id_usuario) 
    { 
        $this->id_usuario = $id_usuario; 
    }
    public function getFecha() 
    { 
        return $this->fecha; 
    }
    public function setFecha($fecha) 
    { 
        $this->fecha = $fecha; 
    }
    public function getModo() 
    { 
        return $this->modo; 
    }
    public function setModo($modo) 
    { 
        $this->modo = $modo; 
    }

        public function __construct($id_usuario, $fecha, $modo, $id = null) {
        $this->id = $id;
        $this->id_usuario = $id_usuario;
        $this->fecha = $fecha;
        $this->modo = $modo;
    }
}
?>
