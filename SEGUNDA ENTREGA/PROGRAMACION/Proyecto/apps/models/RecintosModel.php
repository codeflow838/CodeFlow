<?php
require_once 'Database.php';

class Recintos 
{
    private $id;
    private $nombre;
    private $puntaje;
    private $restricciones;

    public function getId() 
    { 
        return $this->id; 
    }
    public function getNombre() 
    { 
        return $this->nombre; 
    }
    public function getPuntaje() 
    { 
        return $this->puntaje; 
    }
    public function getRestricciones() 
    { 
        return $this->restricciones; 
    }

    public function setId($id) 
    { 
        $this->id = $id;
    }
    public function setNombre($nombre) 
    { 
        $this->nombre = $nombre; 
    }
    public function setPuntaje($puntaje) 
    { 
        $this->puntaje = $puntaje; 
    }
    public function setRestricciones($restricciones) 
    { 
        $this->restricciones = $restricciones; 
    }

    public function __construct($nombre, $puntaje, $restricciones, $id = null) 
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->puntaje = $puntaje;
        $this->restricciones = $restricciones;
    }
}
