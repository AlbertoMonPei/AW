<?php 
$host = "localhost";
$user = "alberto"; 
$pass = "alberto"; 
$db = "proyecto_login";

// Desactivar reporte de errores visuales de PHP para que no rompa el diseño
mysqli_report(MYSQLI_REPORT_OFF);

$conn = @new mysqli($host, $user, $pass, $db); // El @ oculta errores feos de PHP

if ($conn->connect_error) {
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <style>body { background-color: #000; }</style>
    </head>
    <body>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error de Conexión',
            text: 'No se pudo conectar a la base de datos.',
            footer: '<?php echo $conn->connect_error; ?>', // Muestra el error técnico abajo
            background: '#1a1a1a',
            color: '#fff',
            confirmButtonColor: '#d33'
        });
    </script>
    </body>
    </html>
    <?php
    die(); // Detiene todo
}
?>