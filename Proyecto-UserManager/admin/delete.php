<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_rol'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

require_once '../db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($id == $_SESSION['user_id']) {
        header("Location: index.php?error=no_te_borres");
        exit();
    }

    try {
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        
    } catch (PDOException $e) {
        die("Error al eliminar: " . $e->getMessage());
    }
}

header("Location: index.php");
exit();
?>