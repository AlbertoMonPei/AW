<?php
$usuario=$_POST['usuario'];
$password=$_POST['password'];


$file=fopen("usuarios.txt","a");
fwrite($file, $usuario. ":".password_hash($password, PASSWORD_DEFAULT). "\n");
fclose($file);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro exitoso</title>
</head>
<body>
    <div class="contenedor-mensaje">
        <h1>¡Usuario registrado correctamente!</h1>
        <a href="login.php" class="boton-login">Iniciar sesión</a>
    </div>
</body>
</html>