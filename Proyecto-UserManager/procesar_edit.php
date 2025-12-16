<?php
include "db.php";


$id = $_GET["id"];
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id=?");
$stmt->execute([$id]);
$usuario = $stmt->fetch();

if($_POST){
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $edad = $_POST["edad"];
    $rol = $_POST["rol"];

    $update = $pdo->prepare("UPDATE usuarios SET nombre=?, email=?, edad=?, rol=? WHERE id=?");
    $update->execute([$nombre, $email, $edad, $rol, $id]);

    header("Location: list.php");
    exit;
}
/*SEPARAR GESTION DE EDICION DEL FORMULARIO*/
?>