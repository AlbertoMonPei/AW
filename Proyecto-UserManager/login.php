<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <div class="container">
        <h2 class="center">Iniciar Sesión</h2>
        
        <?php if(isset($_GET['error'])): ?>
            <p style="color: red; text-align: center;">Email o contraseña incorrecta</p>
        <?php endif; ?>

        <form action="procesar_login.php" method="POST">
            <label>Email</label>
            <input type="email" name="email" required>

            <label>Contraseña</label>
            <input type="password" name="password" required>

            <button type="submit" class="btn full">Entrar</button>
        </form>

        <p class="center" style="margin-top: 20px;">
            ¿No tienes cuenta? <a href="register.php">Regístrate aquí</a>
        </p>
    </div>

</body>
</html>