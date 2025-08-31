<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "draftosaurus_bd";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$user = $_POST['username'];
$pass = $_POST['password'];

$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$stmt->bind_param("s", $user);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    header("Location: ../../pages/usuarioyaexiste.html");
    exit();
} else {
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $user, $pass);
    if ($stmt->execute()) {
        header("Location: ../../pages/registradoexito.html");
    exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}

$stmt->close();
$conn->close();
?>
