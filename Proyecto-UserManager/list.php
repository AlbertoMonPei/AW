<?php
include "db.php";


$stmt = $pdo->query("SELECT * FROM usuarios");
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html> 
<html> 
<head> 
    <meta charset="UTF-8"> 
    <title>Listado de Usuarios</title> 
    <link rel="stylesheet" href="css/styles.css"> 
</head> 
<body> 
<div class="container"> 
    <h1>Usuarios</h1> 
    <a class="btn" href="create.php">+ Crear Usuario</a> 
 
    <table> 
        <tr> 
            <th>ID</th><th>Nombre</th><th>Email</th><th>Edad</th><th>Rol</th><th>Acciones</th> 
        </tr> 
        <?php foreach ($usuarios as $u): ?> 
        <tr> 
            <td><?= $u['id'] ?></td> 
            <td><?= $u['nombre'] ?></td> 
            <td><?= $u['email'] ?></td> 
            <td><?= $u['edad'] ?></td> 
            <td><?= $u['rol'] ?></td> 
            <td> 
                <a class="btn-edit" href="edit.php?id=<?= $u['id'] ?>">Editar</a> 
                <a class="btn-delete" href="delete.php?id=<?= $u['id'] ?>">Eliminar</a> 
            </td> 
        </tr> 
        <?php endforeach; ?> 
    </table> 
</div> 
</body> 
</html> 
