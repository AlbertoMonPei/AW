<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    
    <link rel="stylesheet" href="CSS/estilos.css">
</head>
<body>

    <div class="card">
        <h1>¡Hola, <?php echo htmlspecialchars($_SESSION['usuario']); ?>! 👋</h1>
        <p>Has iniciado sesión correctamente.</p>
        
        <a href="logout.php" class="btn-logout">Cerrar sesión</a>
    </div>

</body>
</html>