<?php
// admin/procesar_create.php
session_start();
require_once '../db.php';

// 1. Seguridad: Solo admins
if (!isset($_SESSION['user_id']) || $_SESSION['user_rol'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 2. Recoger datos
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $edad = $_POST['edad'];
    $rol = $_POST['rol'];

    // 3. Encriptar contraseña (OBLIGATORIO)
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    try {
        // 4. Insertar en la base de datos
        // ¡OJO! Aquí uso 'usuarios' porque me dijiste que así se llama tu tabla
        $sql = "INSERT INTO usuarios (nombre, email, password, edad, rol) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nombre, $email, $passwordHash, $edad, $rol]);

        // 5. Redirigir al listado si todo salió bien
        header("Location: index.php");
        exit();

    } catch (PDOException $e) {
        die("Error al crear usuario: " . $e->getMessage());
    }
}
?>