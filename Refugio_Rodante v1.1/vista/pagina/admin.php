<?php
session_start(); // Asegurarte de que la sesión está iniciada

// Verificar si el usuario está autenticado y tiene el rol de "admin"
if (!isset($_SESSION["usuario"]) || $_SESSION["usuario"]["Rol"] !== "admin") {
    echo '<script>
        alert("No tienes permisos para acceder aquí.");
        window.location = "index.php?pagina=login";
    </script>';
    exit(); // Salir del script si no tiene acceso
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador - Reserva de Parqueadero</title>
    <link rel="stylesheet" href="vista/css/admin.css">

</head>
<body>

    <!-- Barra lateral de navegación -->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="index.php?pagina=admin">Inicio</a>
        <a href="index.php?pagina=usuario">Usuarios</a>
        <a href="index.php?pagina=reserva">Reservas</a>
        <a href="index.php?pagina=configuracion">Configuración</a>
        <a href="index.php?pagina=cerrarsesion">Cerrar Sesión</a>
    </div>

    <div class="main-content">
        <h1>Bienvenido, Administrador</h1>

        <!-- Inicio -->
        <div class="card" id="inicio">
            <h2>Inicio</h2>
            <p>Resumen general del sistema de parqueaderos, estadísticas y notificaciones importantes.</p>
            <table>
                <tr>
                    <th>Métrica</th>
                    <th>Valor</th>
                </tr>
                <tr>
                    <td>Reservas Activas</td>
                    <td>45</td>
                </tr>
                <tr>
                    <td>Usuarios Registrados</td>
                    <td>120</td>
                </tr>
            </table>
        </div>


      

</body>
</html>
