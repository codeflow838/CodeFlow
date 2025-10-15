<?php
require_once 'Database.php';

class User 
{
    private $id;
    private $nombre;
    private $password;
    private $edad;

    public function getId() 
    {
        return $this->id;
    }

    public function getNombre() 
    {
        return $this->nombre;
    }

    public function getPassword() 
    { 
        return $this->password; 
    }

    public function getEdad() 
    { 
        return $this->edad; 
    }

    public function setId($id) 
    { 
        $this->id = $id; 
    }

    public function setNombre($nombre) 
    { 
        $this->nombre = $nombre; 
    }

    public function setPassword($password) 
    { 
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function setEdad($edad) 
    { 
        $this->edad = $edad; 
    }

    public function __construct($nombre, $edad, $password, $id = null) 
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function exists($conn) 
    {
        $stmt = $conn->prepare("SELECT id FROM usuario WHERE nombre = ?");
        $stmt->bind_param("s", $this->nombre);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }

    public function register($conn) 
    {
        $stmt = $conn->prepare("INSERT INTO usuario (nombre, edad, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $this->nombre, $this->edad, $this->password);
        return $stmt->execute();
    }

    public function login($conn, $passwordInput) 
    {
        $stmt = $conn->prepare("SELECT id, nombre, edad, password FROM usuario WHERE nombre = ?");
        $stmt->bind_param("s", $this->nombre);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($data = $result->fetch_assoc()) 
        {

            if (password_verify($passwordInput, $data['password'])) 
            {
                $this->id = $data['id'];
                $this->nombre = $data['nombre'];
                $this->edad = $data['edad'];
                $this->password = $data['password'];
                return $this;
            } 
                else 
            {
                return "incorrecta";
            }
        }
        return false;
    }

    public static function contarUsuarios($conn)
    {
    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM usuario");
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return intval($row['total']);
    }
}
?>
