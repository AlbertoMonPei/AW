<?php
session_start();

/*Si no detecta sesion, nos manda al login */
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - UseManager</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    
    <nav style="background: #eee; padding: 10px; display: flex; justify-content: space-between;">
        <span>Bienvenido, <strong><?php echo htmlspecialchars($_SESSION['user_nombre']); ?></strong></span>
        <a href="logout.php" style="color: red;">Cerrar Sesión</a>
    </nav> 

    <div class="container" style="margin-top: 50px; text-align: center;">
        <h1>Panel de Control</h1>
        <p>Has iniciado sesión correctamente.</p>
        <p>Tu rol es: <strong><?php echo htmlspecialchars($_SESSION['user_rol']); ?></strong></p>

        <?php if ($_SESSION['user_rol'] === 'admin'): /*Esta parte de código indica si la sesion es igual a admin, nos da la psoibilidad de ir al crud*/?>
            <div style="margin-top: 20px; padding: 20px; border: 1px solid #ccc; background: #f9f9f9;">
                <h3>Zona de Administración</h3>
                <p>Tienes permisos para gestionar usuarios.</p>
                <a href="admin/index.php" class="btn">Ir al CRUD de Usuarios</a>
            </div>
        <?php else: /*Si no detecta que nuestro rol es admin, nos lleva a nuestra zona privada*/?> 
            <div style="margin-top: 20px;">
                <p>Bienvenido a tu zona privada de usuario.</p>
            </div>
        <?php endif; ?>

    </div>

</body>
</html>