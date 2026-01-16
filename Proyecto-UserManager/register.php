<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <div class="container">
        <h2 class="center">Crear Cuenta</h2>

        <?php
        if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'error_email') {
            echo '<div style="color: #721c24; background-color: #f8d7da; padding: 10px; border: 1px solid #f5c6cb; margin-bottom: 15px; border-radius: 5px; text-align: center;">Ese correo electrónico ya está registrado.</div>';
        }
        ?>

        <form action="procesar_register.php" method="POST" novalidate>
            <label>Nombre</label>
            <input type="text" name="nombre" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Contraseña</label>
            <input type="password" name="password" required>

            <label>Edad</label>
            <input type="number" name="edad" required>

            <button type="submit" class="btn full">Registrarse</button>
        </form>

        <p class="center" style="margin-top: 20px;">
            ¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a>
        </p>
    </div>

    <script src="js/validacion.js"></script>

</body>
</html>