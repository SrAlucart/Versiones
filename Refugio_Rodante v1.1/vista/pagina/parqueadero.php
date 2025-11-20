<?php
session_start(); // Asegurarse de iniciar la sesión

// Incluir el controlador
include_once "controlador/controlador.formulario.php";

// Verificar si el usuario está logueado
$isLoggedIn = isset($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parqueaderos Disponibles</title>
    <link rel="stylesheet" href="vista/css/parqueadero.css">
    <link rel="stylesheet" href="vista/css/index.css">
</head>
<body>
    <!-- Verifica si el usuario está logueado -->
    <?php if ($isLoggedIn): ?>
        <div class="logout">
            <form method="POST">
                <input type="submit" name="cerrarSesion" value="Cerrar Sesión" 
                       class="btn-logout" style="background-color: rgb(168, 228, 252); font-size: 17px; color: black; margin-top: 30px; border-radius: 15px; padding: 8px;">
            </form>
        </div>
    <?php else: ?>
        <div class="login">
            <a href="index.php?pagina=inde" class="btn-login">Cerrar sesion </a>
        </div>
    <?php endif; ?>

    <main>
        <section class="parqueadero-disponible">
            <h1>Zona de Parqueaderos Disponibles</h1>

            <div class="grid-parqueaderos">
                <div class="parqueadero">
                    <img src="logo park.jfif" alt="Parqueadero 1">
                    <p>Parqueadero la bomba - Ubicación: Calle 81 </p>
                    <p>Espacios disponibles: 10</p>
                </div>
                <div class="parqueadero">
                    <img src="logo park.jfif" alt="Parqueadero 2">
                    <p>Parqueadero la loma - Ubicación: Avenida regional</p>
                    <p>Espacios disponibles: 5</p>
                </div>
                <div class="parqueadero">
                    <img src="logo park.jfif" alt="Parqueadero 3">
                    <p>Parqueadero star  - Ubicación: Plaza mayor</p>
                    <p>Espacios disponibles: 7</p>
                </div>
            </div>
        </section>
    </main>
</body>
</html>

<?php
// Llamar a la función de cierre de sesión del controlador si se ha presionado el botón
if (isset($_POST['cerrarSesion'])) {
    controladorformularios::ctrCerrarSesion();
}
?>
