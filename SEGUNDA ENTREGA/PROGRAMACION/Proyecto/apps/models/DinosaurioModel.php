<?php
require_once 'Database.php';

class Dinosaurio {
    private $id;
    private $especie;

    public function __construct($especie, $id = null) {
        $this->id = $id;
        $this->especie = $especie;
    }

    public function getId() 
    { 
        return $this->id; 
    }
    public function getEspecie() 
    { 
        return $this->especie; 
    }
    public function setEspecie($especie) 
    { 
        $this->especie = $especie; 
    }
}
?>
