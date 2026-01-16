<?php
session_start();
require_once '../db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_rol'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([$id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

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

    <div class="container">
        <h2 class="center">Editar Usuario</h2>

        <form action="procesar_edit.php" method="POST" novalidate>
            <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

            <label>Nombre</label>
            <input type="text" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>

            <label>Email</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>

            <label>Edad</label>
            <input type="number" name="edad" value="<?php echo htmlspecialchars($usuario['edad']); ?>" required>

            <label>Rol</label>
            <select name="rol">
                <option value="user" <?php if($usuario['rol'] == 'user') echo 'selected'; ?>>Usuario</option>
                <option value="admin" <?php if($usuario['rol'] == 'admin') echo 'selected'; ?>>Administrador</option>
            </select>

            <div class="box">
                <label>Nueva Contraseña (Opcional)</label>
                <input type="password" name="password" placeholder="Dejar en blanco para mantener la actual">
            </div>

            <div class="form-actions">
                <a href="index.php" class="btn gray">Cancelar</a>
                <button type="submit" class="btn">Actualizar</button>
            </div>
            
        </form>
    </div>

    <script src="../js/validacion.js"></script>

</body>
</html>