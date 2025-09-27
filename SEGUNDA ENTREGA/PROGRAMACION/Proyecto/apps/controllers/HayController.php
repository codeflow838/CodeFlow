<?php
require_once '../models/Database.php';
require_once '../models/HayModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' 
    && isset($_POST['id_recinto']) 
    && isset($_POST['id_dinosaurio'])) 
{
    $hay = new Hay($_POST['id_recinto'], $_POST['id_dinosaurio']);

    $stmt = $conn->prepare("
        INSERT INTO hay (id_recinto, id_dinosaurio) 
        VALUES (?, ?)
    ");
    $stmt->bind_param(
        "ii",
        $hay->getIdRecinto(),
        $hay->getIdDinosaurio()
    );

    $stmt->execute();
}
?>
