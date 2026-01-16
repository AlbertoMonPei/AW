<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$nombre = $_SESSION['user_nombre'];
$rol = $_SESSION['user_rol'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <div class="container wide">
        <div class="box nav">
            <span>Hola, <strong><?php echo htmlspecialchars($nombre); ?></strong></span>
            <a href="logout.php" class="btn red">Cerrar Sesión</a>
        </div>

        <h1 class="center">Panel de Control</h1>
        <p class="center">Tu rol actual es: <strong><?php echo htmlspecialchars($rol); ?></strong></p>

        <?php if ($rol === 'admin'): ?>
            <div class="box center">
                <h3>Zona de Administración</h3>
                <p>Gestión de usuarios del sistema.</p>
                <a href="admin/index.php" class="btn">Ir al CRUD</a>
            </div>
        <?php else: ?> 
            <div class="box center">
                <h3>Zona de Usuario</h3>
                <p>Bienvenido a tu área privada.</p>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>