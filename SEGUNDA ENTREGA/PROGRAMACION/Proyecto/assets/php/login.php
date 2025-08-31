<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "draftosaurus_bd";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$user = $_POST['username'];
$pass = $_POST['password'];

$stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($pass === $row['password']) {

        header("Location: ../../pages/inicioexitoso.html");
        exit();
    } else {
        header("Location: ../../pages/incorrecta.html");
    }
} else {
    header("Location: ../../pages/noencontrado.html");
    exit();
}

$stmt->close();
$conn->close();
?>
