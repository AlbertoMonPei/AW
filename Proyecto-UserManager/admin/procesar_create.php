<?php
session_start();
require_once '../db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_rol'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $edad = $_POST['edad'];
    $rol = $_POST['rol'];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO usuarios (nombre, email, password, edad, rol) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nombre, $email, $passwordHash, $edad, $rol]);

        header("Location: index.php");
        exit();

    } catch (PDOException $e) {
        die("Error al crear usuario: " . $e->getMessage());
    }
}
?>