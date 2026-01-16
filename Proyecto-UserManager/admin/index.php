<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_rol'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

require '../db.php'; 
$stmt = $pdo->query("SELECT * FROM usuarios"); 
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administración</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

    <div class="container wide">
        <div class="box nav">
            <h2>Listado de Usuarios</h2>
            <a href="../dashboard.php" class="btn gray">Volver</a>
        </div>
        
        <div style="margin-top: 20px;">
            <a href="create.php" class="btn">+ Nuevo Usuario</a>
        </div>
        
        <table>
            <thead>
                <tr>
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
                    <td><?= $u['id'] ?></td>
                    <td><?= htmlspecialchars($u['nombre']) ?></td>
                    <td><?= htmlspecialchars($u['email']) ?></td>
                    <td><?= htmlspecialchars($u['rol']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $u['id'] ?>" class="btn" style="padding: 5px 10px; font-size: 0.9em;">Editar</a>
                        <a href="delete.php?id=<?= $u['id'] ?>" class="btn red" style="padding: 5px 10px; font-size: 0.9em;" onclick="return confirm('¿Seguro?')">Borrar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>