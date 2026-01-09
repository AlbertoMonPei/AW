<?php
include "db.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $edad = $_POST["edad"];
    

    $pass_hash = password_hash($password, PASSWORD_DEFAULT);
    
    $rol = 'user';

    try {
        $sql = "INSERT INTO usuarios (nombre,email,password,edad,rol) VALUES (?,?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nombre, $email, $pass_hash, $edad, $rol]);
        header("Location: login.php");
        exit;

    } catch (PDOException $e) {
        if ($e->getCode()== 23000) {
            echo "Error: Ese email ya está registrado.";
        } else {
            die("Error en la base de datos." . $e->getMessage());
        }
    }
} else {
    header("Location: register.php");
    exit;
}
?>