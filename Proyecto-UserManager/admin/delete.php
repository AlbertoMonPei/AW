<?php
// admin/delete.php
session_start();
require_once '../db.php'; // Subimos un nivel para buscar la conexión

// 1. Seguridad: Solo admin puede borrar
if (!isset($_SESSION['user_id']) || $_SESSION['user_rol'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // 2. BORRADO: Usamos la tabla 'usuarios' (tu nombre real)
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        
    } catch (PDOException $e) {
        die("Error al eliminar: " . $e->getMessage());
    }
}

// 3. Redirección: Volvemos al índice DE LA CARPETA ADMIN
header("Location: index.php");
exit();
?>