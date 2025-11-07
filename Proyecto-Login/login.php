<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="CSS/estilos.css">
</head>
<body>
    <h1>LOGIN</h1>
    <form action="procesar_login.php" method="post">
    <label>Usuario</label>
    <input type="text" name="usuario" required><br><br>
    <label>Contraseña</label>
    <input type="password" name="password" required><br><br>
    <button type="submit">Entrar</button>
    </form>
    <p>¿No tienes cuenta? <a href="registro.php">Registrate aquí</p>
    

</body>
</html>