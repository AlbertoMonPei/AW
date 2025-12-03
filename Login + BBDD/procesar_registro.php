<?php

include "conexion.php";

$usuario = $_POST['usuario'];
$password = $_POST['password'];

/*encriptar contraseña*/
$hash = password_hash($password, PASSWORD_DEFAULT);

/*preparar consulta segura*/
$stmt = $conn->prepare("INSERT INTO usuarios (usuario, password) VALUES (?, ?)");
$stmt->bind_param("ss", $usuario, $hash);

$resultado = $stmt->execute();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /*degradado */
            background: linear-gradient(135deg, #a8c0b0 0%, #a0669d 100%);
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify_content: center;
        }
    </style>
</head>
<body>

<script>
    /*color botón Entrar*/
    const colorBoton = '#a03598'; 

    <?php if ($resultado) { ?>
        /*registro exitoso*/
        Swal.fire({
            title: '¡Registro Exitoso!',
            text: 'Tu cuenta ha sido creada correctamente',
            icon: 'success',
            /*estilo*/
            background: '#ffffff',
            color: '#333333',           
            confirmButtonText: 'Iniciar Sesión',
            confirmButtonColor: colorBoton,
            borderRadius: '15px',
            iconColor: colorBoton,
            allowOutsideClick: false,
            customClass: {
                popup: 'mis-bordes-redondos'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'login.php';
            }
        });

    <?php } else { ?>
        /*error*/
        Swal.fire({
            title: 'Ups...',
            text: 'El usuario ya existe o hubo un error',
            icon: 'error',
            background: '#ffffff',
            color: '#333333',
            confirmButtonText: 'Intentar de nuevo',
            confirmButtonColor: '#d33',
            borderRadius: '15px'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'registro.php';
            }
        });
    <?php } ?>
</script>

</body>
</html>