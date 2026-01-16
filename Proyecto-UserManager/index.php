<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido - UserManager</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <div class="container" style="text-align: center; margin-top: 50px;">
        <h1>Bienvenido al Proyecto UserManager</h1>
        <hr>

        <?php if(isset($_SESSION['user_id'])): ?>
            <div style="margin-top: 30px;">
                <p>Hola de nuevo, <strong><?php echo htmlspecialchars($_SESSION['user_nombre']); ?></strong>.</p>
                <p>Ya tienes una sesión activa.</p>
                <br>
                <a href="dashboard.php" class="btn">Ir a mi Panel de Control</a>
                <br><br>
                <a href="logout.php" style="color: red; font-size: 0.9em;">Cerrar sesión</a>
            </div>

        <?php else: ?>
            <div style="margin-top: 30px;">

                <br>
                <a href="login.php" class="btn">Iniciar Sesión</a>
                
                <a href="register.php" class="btn" style="background-color: #666;">Registrarse</a>
            </div>
        <?php endif; ?>

    </div>

</body>
</html>