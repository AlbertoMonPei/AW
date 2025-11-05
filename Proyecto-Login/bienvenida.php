<?php
session_start();

if (!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    <link rel="stylesheet" href="Bienvenida_estilo.css">
</head>
<body>
    <div class="contenedor_bienvenida">
    <h1>Bienvenido, <?php echo $_SESSION['usuario'];?></h1>
    <a href="logout.php" class="boton-logout">Cerrar Sesión</a>    
</div>

</body>
</html>