<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_rol'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

    <div class="container">
        <h2 class="center">Crear Nuevo Usuario</h2>

        <form action="procesar_create.php" method="POST" novalidate>
            <label>Nombre</label>
            <input type="text" name="nombre" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Contraseña</label>
            <input type="password" name="password" required>

            <label>Edad</label>
            <input type="number" name="edad" required>

            <label>Rol</label>
            <select name="rol">
                <option value="user">Usuario</option>
                <option value="admin">Administrador</option>
            </select>

            <button type="submit" class="btn full">Guardar</button>
            <a href="index.php" class="btn gray full">Cancelar</a>
        </form>
    </div>

    <script src="../js/validacion.js"></script>

</body>
</html>