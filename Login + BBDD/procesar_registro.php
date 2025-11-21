<?php
include "conexion.php";

$usuario = $_POST['usuario'];
$password = $_POST['password'];

// --- PASO 1: COMPROBACIÓN (El Chequeo) ---

// Preparamos una consulta para buscar si ese nombre ya existe
$check = $conn->prepare("SELECT id FROM usuarios WHERE usuario = ?");
$check->bind_param("s", $usuario);
$check->execute();
$check->store_result();

// Si el número de filas encontradas es mayor a 0, es que ya existe
if ($check->num_rows > 0) {
    echo "<h1>Error: El usuario '$usuario' ya está registrado </h1>";
    echo "<p>Por favor, elige otro nombre o inicia sesión.</p>";
    echo "<p><a href='registro.php'>Volver a intentar</a> | <a href='login.php'>Iniciar Sesión</a></p>";
    
    // Cerramos y detenemos el script para que no intente registrarlo
    $check->close();
    $conn->close();
    exit; 
}

// Cerramos la consulta del chequeo para liberar memoria
$check->close();


// --- PASO 2: EL REGISTRO (Si pasó el chequeo) ---

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO usuarios (usuario, password) VALUES (?, ?)");
$stmt->bind_param("ss", $usuario, $hash);

if ($stmt->execute()) {
    // Si sale bien, lo mandamos directo al login
    header("Location: login.php");
    exit;
} else {
    echo "<h1>Error inesperado en la base de datos</h1>";
    echo "<p><a href='registro.php'>Volver a intentar</a></p>";
}

$stmt->close();
$conn->close();
?>