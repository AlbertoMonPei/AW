<?php
session_start();

$error_message = '';
if (isset($_SESSION['error_login'])) {
    $error_message = $_SESSION['error_login'];

    unset($_SESSION['error_login']);
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="CSS/estilos.css">
</head>
<body>
     <form action="procesar_login.php" method="post">
    <h1>LOGIN</h1>
    <?php
    if (!empty($error_message)):
    ?>
        <script type="text/javascript">
           alert("<?php echo $error_message; ?>");
        </script>
        <?php
        endif;
        ?>
    <label>Usuario</label>
    <input type="text" name="usuario" required><br><br>
    <label>Contraseña</label>
    <input type="password" name="password" required><br><br>
    <button type="submit">Entrar</button>
    </form>
    <p>¿No tienes cuenta? <a href="registro.php">Registrate aquí</p>

    
    

</body>
</html>