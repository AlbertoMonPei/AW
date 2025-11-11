<?php
// 1. INICIA LA SESIÓN Y PREPARA LAS VARIABLES DEL MODAL
session_start();

$show_modal = false;
$modal_title = '';
$modal_body = '';
$modal_button_text = '';

// Revisa si hay un ERROR DE LOGIN
if (isset($_SESSION['error_login'])) {
    $show_modal = true;
    $modal_title = "Error de acceso";
    $modal_body = $_SESSION['error_login'];
    $modal_button_text = "OK";
    unset($_SESSION['error_login']); // Limpia el mensaje
} 
// Revisa si hay un ÉXITO DE REGISTRO
else if (isset($_SESSION['registro_exitoso'])) {
    $show_modal = true;
    $modal_title = "¡Registro Exitoso!";
    $modal_body = $_SESSION['registro_exitoso'];
    $modal_button_text = "Iniciar Sesión";
    unset($_SESSION['registro_exitoso']);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="CSS/estilos.css"> 

</head>

<body>

    <h1>Login</h1>
    <form action="procesar_login.php" method="post">
    <label>Usuario:</label>
    <input type="text" name="usuario" required>

    <label>Contraseña:</label>
    <input type="password" name="password" required>
        
    <button type="submit">Entrar</button>

    <p>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
    </form>


    <div id="modal-popup" class="modal-overlay <?php echo $show_modal ? 'show' : ''; ?>">
        
        <div class="modal-content">
            <h3><?php echo htmlspecialchars($modal_title); ?></h3> 
            
            <p><?php echo htmlspecialchars($modal_body); ?></p>
            
            <div class="modal-actions">
                <button id="modal-close-btn"><?php echo htmlspecialchars($modal_button_text); ?></button>
            </div>
        </div>
        
    </div>

    <script>
        // Espera a que la página cargue
        document.addEventListener("DOMContentLoaded", function() {
            var closeBtn = document.getElementById("modal-close-btn");
            var modal = document.getElementById("modal-popup");

            // Si el botón existe...
            if (closeBtn) {
                // ...añádele un 'click'
                closeBtn.onclick = function() {
                    // Al hacer click, quita la clase 'show' para ocultar el modal
                    modal.classList.remove("show");
                }
            }
        });
    </script>

</body>
</html>