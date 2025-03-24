<?php
// Iniciar la sesión si no se ha iniciado
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Destruir todas las variables de sesión
session_unset(); 

// Destruir la sesión
session_destroy(); 

// Redirigir al usuario al inicio o página de login
header("Location: index.php?pagina=login");
exit;


