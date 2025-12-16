<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// admin/index.php
session_start();

// --- 1. BLOQUE DE SEGURIDAD (CRÍTICO) ---
// Verificamos dos cosas:
// A) Que el usuario esté logueado.
// B) Que su rol sea EXACTAMENTE 'admin'.
if (!isset($_SESSION['user_id']) || $_SESSION['user_rol'] !== 'admin') {
    // Si falla cualquiera de las dos, lo mandamos fuera (al login o al dashboard)
    header("Location: ../login.php");
    exit();
}

// --- 2. CONEXIÓN A LA BASE DE DATOS ---
// Usamos "../" para subir un nivel y encontrar el archivo db.php
require_once '../db.php';

// --- 3. OBTENER LOS USUARIOS ---
// Consulta para traer todos los usuarios
$stmt = $pdo->query("SELECT * FROM usuarios");
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administración de Usuarios</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

<div class="container">
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h1>Panel de Administración</h1>
        <a href="../dashboard.php" class="btn" style="background-color: #666;">Volver al Dashboard</a>
    </div>

    <h2>Listado de Usuarios</h2>
    
    <a href="create.php" class="btn" style="margin-bottom: 15px;">+ Nuevo Usuario</a>

    <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?php echo htmlspecialchars($u['id']); ?></td>
                <td><?php echo htmlspecialchars($u['nombre']); ?></td>
                <td><?php echo htmlspecialchars($u['email']); ?></td>
                
                <td style="<?php echo ($u['rol'] == 'admin') ? 'font-weight:bold; color:blue;' : ''; ?>">
                    <?php echo htmlspecialchars($u['rol']); ?>
                </td>
                
                <td>
                    <a href="edit.php?id=<?php echo $u['id']; ?>" class="btn-edit">Editar</a>

                    <a href="delete.php?id=<?php echo $u['id']; ?>" class="btn-delete" onclick="return confirm('¿Seguro que quieres eliminar este usuario?');">Eliminar</a></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>