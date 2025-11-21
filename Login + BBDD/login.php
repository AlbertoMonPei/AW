<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    
    <link rel="stylesheet" href="CSS/estilos.css">
</head>
<body>

    <div class="card">
        
        <h1>Iniciar sesión</h1>
        
        <form action="procesar_login.php" method="post">
            
            <div class="input-group">
                <label>Usuario</label>
                <input type="text" name="usuario" placeholder="Ingresa tu usuario" required>
            </div>

            <div class="input-group">
                <label>Contraseña</label>
                <input type="password" name="password" placeholder="Ingresa tu contraseña" required>
            </div>

            <button type="submit">Entrar</button>
            
            <p class="footer-text">
                ¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a>
            </p>
            
        </form>
    </div>

</body>
</html>