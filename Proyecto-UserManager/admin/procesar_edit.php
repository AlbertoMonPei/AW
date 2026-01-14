<?php
session_start();
require_once '../db.php';


if (!isset($_SESSION['user_id']) || $_SESSION['user_rol'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];
    $rol = $_POST['rol'];
    $password = $_POST['password']; 

    try {
       
        if (!empty($password)) {
           
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            
            $sql = "UPDATE usuarios SET nombre=?, email=?, edad=?, rol=?, password=? WHERE id=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nombre, $email, $edad, $rol, $passwordHash, $id]);
            
        } else {
            $sql = "UPDATE usuarios SET nombre=?, email=?, edad=?, rol=? WHERE id=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nombre, $email, $edad, $rol, $id]);
        }

        header("Location: index.php");
        exit();

    } catch (PDOException $e) {
        die("Error al actualizar: " . $e->getMessage());
    }
}
?>