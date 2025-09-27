<?php
require_once 'Database.php';
class Hay 
{
    private $id_recinto;
    private $id_dinosaurio;

    public function getIdRecinto() 
    { 
        return $this->id_recinto; 
    }
    public function getIdDinosaurio() 
    { 
        return $this->id_dinosaurio; 
    }

    public function setIdRecinto($id_recinto) 
    { 
        $this->id_recinto = $id_recinto; 
    }
    public function setIdDinosaurio($id_dinosaurio) 
    { 
        $this->id_dinosaurio = $id_dinosaurio; 
    }

    public function __construct($id_recinto, $id_dinosaurio) 
    {
        $this->id_recinto = $id_recinto;
        $this->id_dinosaurio = $id_dinosaurio;
    }
}
