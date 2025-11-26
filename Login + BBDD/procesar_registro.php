<?php
// Incluimos la conexión
include "conexion.php";

$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Encriptar contraseña
$hash = password_hash($password, PASSWORD_DEFAULT);

// Preparar consulta segura
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
            /* Este degradado imita el de tu imagen (Verde grisáceo a Morado) */
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
    // Color morado extraído de tu botón "Entrar": #9c3395 (aprox)
    const colorBoton = '#a03598'; 

    <?php if ($resultado) { ?>
        // --- CASO EXITOSO (Estilo acorde a tu diseño) ---
        Swal.fire({
            title: '¡Registro Exitoso!',
            text: 'Tu cuenta ha sido creada correctamente',
            icon: 'success',
            // Estilos visuales:
            background: '#ffffff',       // Fondo blanco como tu tarjeta
            color: '#333333',            // Texto gris oscuro
            confirmButtonText: 'Iniciar Sesión',
            confirmButtonColor: colorBoton, // El morado de tu diseño
            borderRadius: '15px',         // Bordes redondeados
            iconColor: colorBoton,        // El icono también morado
            allowOutsideClick: false,
            customClass: {
                popup: 'mis-bordes-redondos' // Para asegurar redondeado
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'login.php';
            }
        });

    <?php } else { ?>
        // --- CASO ERROR ---
        Swal.fire({
            title: 'Ups...',
            text: 'El usuario ya existe o hubo un error',
            icon: 'error',
            background: '#ffffff',
            color: '#333333',
            confirmButtonText: 'Intentar de nuevo',
            confirmButtonColor: '#d33', // Rojo para error (o puedes usar el morado también)
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