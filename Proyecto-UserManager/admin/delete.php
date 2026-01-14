<?php

session_start();
require_once '../db.php';


if (!isset($_SESSION['user_id']) || $_SESSION['user_rol'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

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