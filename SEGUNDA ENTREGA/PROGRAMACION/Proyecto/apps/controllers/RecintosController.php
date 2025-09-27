<?php
require_once '../models/Database.php';
require_once '../models/RecintosModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' 
    && isset($_POST['nombre']) 
    && isset($_POST['puntaje']) 
    && isset($_POST['restricciones'])) 
{
    $recinto = new Recintos(
        $_POST['nombre'],
        $_POST['puntaje'],
        $_POST['restricciones']
    );

    $stmt = $conn->prepare("
        INSERT INTO recintos (nombre, puntaje, restricciones)
        VALUES (?, ?, ?)
    ");
    $stmt->bind_param(
        "sis",
        $recinto->getNombre(),
        $recinto->getPuntaje(),
        $recinto->getRestricciones()
    );

    $stmt->execute();
}
?>
