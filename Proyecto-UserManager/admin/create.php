<?php
session_start();

//verificar si el usuario es admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_rol'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario - Admin</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

    <div class="form-container">
        <h2>Crear Nuevo Usuario</h2>

        <form action="procesar_create.php" method="POST">
            
            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" name="nombre" required>
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Contraseña:</label>
                <input type="password" name="password" required>
            </div>

            <div class="form-group">
                <label>Edad:</label>
                <input type="number" name="edad" required>
            </div>

            <div class="form-group">
                <label>Rol:</label>
                <select name="rol">
                    <option value="user">Usuario</option>
                    <option value="admin">Administrador</option>
                </select>
            </div>

            <button type="submit" class="btn">Guardar Usuario</button>
            <a href="index.php" style="display:block; text-align:center; margin-top:10px;">Cancelar</a>
        </form>
    </div>
    <script src="../js/validacion.js"></script>

</body>
</html>