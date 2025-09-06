<?php
class User {
    private $id;
    private $nombre;
    private $edad;
    private $password;

    public function __construct($nombre, $edad, $password, $id = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->password = $password;
    }

    public function getId() 
    {
    return $this->id; 
    }
    public function getNombre() 
    { 
        return $this->nombre; 
    }
    public function setNombre($nombre) 
    { 
        $this->nombre = $nombre; 
    }
    public function getEdad() 
    { 
        return $this->edad; 
    }
    public function setEdad($edad) 
    { 
        $this->edad = $edad; 
    }
    public function getPassword() 
    { 
        return $this->password; 
    }
    public function setPassword($password)
    { 
        $this->password = $password; 
    }
}
?>
