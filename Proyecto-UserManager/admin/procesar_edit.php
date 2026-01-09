<?php
session_start();
require_once '../db.php';

//seguridad, si no detecta una sesión con rol admin, nos redirije al login
if (!isset($_SESSION['user_id']) || $_SESSION['user_rol'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];
    $rol = $_POST['rol'];
    $password = $_POST['password']; //se puede dejar vacío en caso de no querer modificar la contraseña

    try {
        //comprueba si hemos escrito una nueva contraseña
        if (!empty($password)) {
            //si detecta que la hemos escrito, la modifica y encripta
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            
            $sql = "UPDATE usuarios SET nombre=?, email=?, edad=?, rol=?, password=? WHERE id=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nombre, $email, $edad, $rol, $passwordHash, $id]);
            
        } else {
            //si no detecta, mantiene la contraseña que tenía
            $sql = "UPDATE usuarios SET nombre=?, email=?, edad=?, rol=? WHERE id=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nombre, $email, $edad, $rol, $id]);
        }

        //volvemos al index del admin
        header("Location: index.php");
        exit();

    } catch (PDOException $e) {
        die("Error al actualizar: " . $e->getMessage());
    }
}
?>