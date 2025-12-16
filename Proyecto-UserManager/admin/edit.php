<?php
// admin/edit.php
session_start();
require_once '../db.php';

// 1. Seguridad: Solo admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_rol'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

// 2. Verificar que nos pasan un ID
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

// 3. Obtener los datos actuales del usuario
// USAMOS LA TABLA 'usuarios'
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([$id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Si no existe el usuario, volvemos a la lista
if (!$usuario) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

    <div class="form-container">
        <h2>Editar Usuario</h2>

        <form action="procesar_edit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
            </div>

            <div class="form-group">
                <label>Edad:</label>
                <input type="number" name="edad" value="<?php echo htmlspecialchars($usuario['edad']); ?>" required>
            </div>

            <div class="form-group">
                <label>Rol:</label>
                <select name="rol">
                    <option value="user" <?php if($usuario['rol'] == 'user') echo 'selected'; ?>>Usuario Normal</option>
                    <option value="admin" <?php if($usuario['rol'] == 'admin') echo 'selected'; ?>>Administrador</option>
                </select>
            </div>

            <div class="form-group" style="background: #f9f9f9; padding: 10px; border: 1px dashed #ccc;">
                <label>Nueva Contraseña (Opcional):</label>
                <input type="password" name="password" placeholder="Dejar en blanco para mantener la actual">
                <small>Solo escribe aquí si quieres cambiarle la clave al usuario.</small>
            </div>

            <button type="submit" class="btn">Actualizar Usuario</button>
            <a href="index.php" style="display:block; text-align:center; margin-top:10px;">Cancelar</a>
        </form>
    </div>
    <script src="../js/validacion.js"></script>

</body>
</html>