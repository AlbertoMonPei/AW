<?php
session_start(); // IMPORTANTE: Inicia el sistema de sesiones
include "conexion.php";

$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Buscamos solo el usuario para ver si existe y sacar su hash
$stmt = $conn->prepare("SELECT id, password FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$stmt->store_result();

// Si encontramos al usuario...
if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $hash);
    $stmt->fetch();

    // Verificamos la contraseña mágica (compara texto normal con encriptado)
    if (password_verify($password, $hash)) {
        // ¡Login correcto! Guardamos el nombre en la sesión
        $_SESSION['usuario'] = $usuario;
        
        // Redirigimos a la página privada
        header("Location: bienvenida.php");
        exit;
    } else {
        echo "<h1>Contraseña incorrecta ❌</h1>";
        echo "<p><a href='login.php'>Volver a intentar</a></p>";
    }
} else {
    echo "<h1>Usuario no encontrado ❌</h1>";
    echo "<p><a href='registro.php'>Registrarse</a></p>";
}

$stmt->close();
$conn->close();
?>