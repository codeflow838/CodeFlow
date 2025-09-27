<?php
require_once '../models/Database.php';
require_once '../models/DinosauriosModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['especie'])) 
{
    $dino = new Dinosaurios($_POST['especie']);
    $stmt = $conn->prepare("INSERT INTO dinosaurios (especie) VALUES (?)");
    $stmt->bind_param("s", $dino->getEspecie());
    $stmt->execute();
}
?>
