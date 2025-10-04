<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "bd_codeflow";

    public function getConnection() {
        $conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }
        return $conn;
    }
}
?>
