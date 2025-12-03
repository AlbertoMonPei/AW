<?php
session_start();
include "conexion.php";

$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Variable para controlar qué alerta mostrar
$tipo_alerta = ""; 

// Consulta segura
$stmt = $conn->prepare("SELECT id, password FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $usuario); 
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {  
    $stmt->bind_result($id, $hash);
    $stmt->fetch();
    
    if (password_verify($password, $hash)) { 
        //si es correcto inicia sesion
        $_SESSION['usuario'] = $usuario;
        header("Location: bienvenida.php");
        exit;
    } else {
        // contraseña incorrecta
        $tipo_alerta = "password_incorrecta"; 
    }
} else {
    // usuario no existe
    $tipo_alerta = "usuario_no_existe"; 
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesando Login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
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
    // Tu color morado
    const colorBoton = '#a547a8'; 

    <?php if ($tipo_alerta == "password_incorrecta") { ?>
        
        //contraseña incorrecta
        Swal.fire({
            title: 'Contraseña Incorrecta',
            text: 'La contraseña que ingresaste no coincide.',
            icon: 'error',
            background: '#ffffffff',
            confirmButtonText: 'Intentar de nuevo',
            confirmButtonColor: colorBoton,
            borderRadius: '15px',
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'login.php';
            }
        });

    <?php } elseif ($tipo_alerta == "usuario_no_existe") { ?>

        // usuario no encontrado
        Swal.fire({
            title: 'Usuario no encontrado',
            text: 'Ese nombre de usuario no existe en nuestra base de datos.',
            icon: 'warning',
            background: '#7fd86d',
            confirmButtonText: 'Registrarse',
            showCancelButton: true,
            cancelButtonText: 'Probar otro usuario',
            confirmButtonColor: colorBoton,
            cancelButtonColor: '#ffffffff',
            borderRadius: '15px'
        }).then((result) => {
            if (result.isConfirmed) {
                //redirige al registro
                window.location.href = 'registro.php';
            } else {
                //redirige al login
                window.location.href = 'login.php';
            }
        });

    <?php } ?>
</script>

</body>
</html>