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

    <style>
        .modal-overlay {
            position: fixed; /* Se queda fijo en la pantalla */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            
            /* Centra la ventana */
            display: flex;
            justify-content: center;
            align-items: center;
            
            /* Oculto por defecto */
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease;
            z-index: 1000; /* Asegura que esté por encima de todo */
        }

        /* Clase para MOSTRAR el modal */
        .modal-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        /* Estilo ventana */
        .modal-content {
            background-image: 
        /* Capa 1: Un velo oscuro semitransparente */
        linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
        
        /* Capa 2: Imagen de fondo */
        url('Imagenes/ventana-error-exito.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.3);
            max-width: 400px;
            width: 90%;
            box-sizing: border-box;
            text-align: center;
            color: #333;
        }
        /*Estilo titulo menaje*/
        .modal-content h3 {
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 1.1rem;
            color: #ffffffff;
        }
        /*Estilo texto mensaje*/
        .modal-content p {
            color: #ffffffff;
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 1rem;
        }

        /* Contenedor para alinear el botón en el centro */
        .modal-actions {
            text-align: center;
        }

        /* Botón "OK" */
        #modal-close-btn {
            background-color: #ff00c8;
            color: white;
            font-size: 0.9rem;
            font-weight: bold;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        #modal-close-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <form action="procesar_login.php" method="post">
        <h1>Login</h1>
        
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