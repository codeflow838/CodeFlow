<?php
require_once 'Database.php';

class Dinosaurios 
{
    private $id;
    private $especie;

    public function getId() 
    { 
        return $this->id; 
    }
    public function getEspecie() 
    { 
        return $this->especie; 
    }

    public function setId($id) 
    { 
        $this->id = $id; 
    }
    public function setEspecie($especie) 
    { 
        $this->especie = $especie; 
    }

    public function __construct($especie, $id = null) 
    {
        $this->id = $id;
        $this->especie = $especie;
    }
}
