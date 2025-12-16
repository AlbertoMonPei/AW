<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Iniciar Sesión</h2>

        <?php if(isset($_GET['error'])): ?>
            <p style="color: red;">Email o contraseña incorrectos.</p>
        <?php endif; ?>

        <form action="procesar_login.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <br>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <br>
                <input type="password" id="password" name="password" required>
            </div>

            <br>

            <button type="submit" class="btn">Entrar</button>
        </form>

        <p>¿No tienes cuenta? <a href="register.php">Registrate aquí</a></p>
    </div>
    
</body>
</html>