<?php
session_start(); // [cite: 82]
include "conexion.php"; // [cite: 83]

$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Variable para controlar qué alerta mostrar
$tipo_alerta = ""; 

// Consulta segura
$stmt = $conn->prepare("SELECT id, password FROM usuarios WHERE usuario = ?"); // [cite: 87]
$stmt->bind_param("s", $usuario); // [cite: 88]
$stmt->execute();
$stmt->store_result(); // [cite: 90]

if ($stmt->num_rows > 0) { // [cite: 91]
    $stmt->bind_result($id, $hash); // [cite: 92]
    $stmt->fetch(); // [cite: 93]
    
    if (password_verify($password, $hash)) { // [cite: 94]
        // SI ES CORRECTO: Inicia sesión y redirige inmediatamente
        $_SESSION['usuario'] = $usuario; // [cite: 95]
        header("Location: bienvenida.php"); // [cite: 96]
        exit;
    } else {
        // SI LA CONTRASEÑA ESTÁ MAL
        $tipo_alerta = "password_incorrecta"; 
    }
} else {
    // SI EL USUARIO NO EXISTE
    $tipo_alerta = "usuario_no_existe"; 
}

$stmt->close(); // [cite: 105]
$conn->close(); // [cite: 106]
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
        
        // --- CASO 1: CONTRASEÑA INCORRECTA ---
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

        // --- CASO 2: USUARIO NO ENCONTRADO ---
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
                // Si le da a Registrarse, lo manda al registro
                window.location.href = 'registro.php';
            } else {
                // Si le da a Probar otro, lo manda al login
                window.location.href = 'login.php';
            }
        });

    <?php } ?>
</script>

</body>
</html>