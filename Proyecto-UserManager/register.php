<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - UseManager</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <div class="form-container">
        <h2>Crear Cuenta</h2>

        <form action="procesar_register.php" method="POST">
            
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required placeholder="Tu nombre completo">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required placeholder="ejemplo@correo.com">
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required placeholder="Elige una contraseña segura">
            </div>

            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" id="edad" name="edad" required min="1" max="120">
            </div>

            <button type="submit" class="btn">Registrarse</button>
        </form>

        <div style="margin-top: 20px;">
            <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a></p>
        </div>
    </div>
    <script src="js/validacion.js"></script>

</body>
</html>