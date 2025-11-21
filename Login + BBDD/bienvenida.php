<?php
session_start();

if (!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido,</title>
    <link rel="stylesheet" href="CSS/Bienvenida_estilo.css">
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['usuario'];?></h1>
    <p>Has iniciado sesión correctamente.</p>
    <p><a href="logout.php">Cerrar sesión</a></p>   
</body>
</html>