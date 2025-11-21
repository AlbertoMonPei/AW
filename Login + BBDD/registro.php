<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta</title>
    
    <link rel="stylesheet" href="CSS/estilos.css">
</head>
<body>

    <div class="card">
        
        <h1>Crear Cuenta</h1>
        
        <form action="procesar_registro.php" method="post">
            
            <div class="input-group">
                <label>Usuario</label>
                <input type="text" name="usuario" placeholder="Elige un nombre de usuario" required>
            </div>

            <div class="input-group">
                <label>Contraseña</label>
                <input type="password" name="password" placeholder="Crea una contraseña segura" required>
            </div>

            <button type="submit">Registrarse</button>
            
            <p class="footer-text">
                ¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a>
            </p>
            
        </form>
    </div>

</body>
</html>