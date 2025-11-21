<?php
include "conexion.php"; // Trae tu puente de conexión que ya funciona

// Recibir los datos del formulario
$usuario = $_POST['usuario'];
$password = $_POST['password'];

// 1. Encriptar contraseña: Esto convierte "1234" en un código indescifrable
$hash = password_hash($password, PASSWORD_DEFAULT);

// 2. Preparar la consulta SQL de forma segura
// Los signos de interrogación (?) son marcadores para evitar que te hackeen (SQL Injection)
$stmt = $conn->prepare("INSERT INTO usuarios (usuario, password) VALUES (?, ?)");

// 3. Vincular los datos: "ss" significa que mandamos dos Strings (texto)
$stmt->bind_param("ss", $usuario, $hash);

// 4. Ejecutar y verificar
if ($stmt->execute()) {
    // Si sale bien
    echo "<h1>Usuario registrado correctamente</h1>";
    echo "<p><a href='login.php'>Iniciar sesión</a></p>";
} else {
    // Si falla (normalmente porque el usuario ya existe, ya que pusimos UNIQUE en la base de datos)
    echo "<h1>Error: el usuario ya existe o hubo un problema</h1>";
    echo "<p><a href='registro.php'>Volver al registro</a></p>";
}

// Cerrar conexiones para liberar memoria
$stmt->close();
$conn->close();
?>