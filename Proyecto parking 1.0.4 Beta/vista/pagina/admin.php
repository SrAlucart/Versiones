<?php
session_start(); // Asegurar que la sesión está iniciada

// Verificar si el usuario está autenticado y tiene el rol de "admin"
if (!isset($_SESSION["usuario"]) || $_SESSION["usuario"]["Rol"] !== "admin") {
    echo '<script>
        alert("No tienes permisos para acceder aquí.");
        window.location = "index.php?pagina=login";
    </script>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador - Reserva de Parqueadero</title>
    <link rel="stylesheet" href="vista/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="sidebar">
        <h2>Refugio Rodante</h2>
        <hr>
        <a href="index.php?pagina=admin"><i class="bi bi-house-door"></i> Inicio</a>
        <a href="index.php?pagina=usuario"><i class="bi bi-people"></i> Usuarios</a>
        <a href="index.php?pagina=reserva"><i class="bi bi-calendar-check"></i> Reservas</a>
        <a href="index.php?pagina=configuracion"><i class="bi bi-gear"></i> Configuración</a>
        <a href="index.php?pagina=cerrarsesion"><i class="bi bi-box-arrow-right"></i> Cerrar Sesión</a>

        <div class="bottom-divider"></div>

        <div class="user-profile" onclick="toggleDropdown()">
            <img src="img/logo-polica.png" alt="Usuario">
            <span>Admin</span>
            <i class="bi bi-caret-down-fill"></i>
        </div>
        <div id="dropdown-menu" class="dropdown-menu">
            <a href="#">Nuevo Proyecto</a>
            <a href="#">Configuración</a>
            <a href="#">Perfil</a>
            <a href="index.php?pagina=cerrarsesion">Cerrar Sesión</a>
        </div>
    </div>
    </div>
    <div class="main-content">
        <h1>Bienvenido, Administrador</h1>
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
    </div>

    <script>
        function toggleDropdown() {
            document.getElementById("dropdown-menu").classList.toggle("show");
        }
        window.onclick = function(event) {
            if (!event.target.closest('.user-profile')) {
                document.getElementById("dropdown-menu").classList.remove("show");
            }
        }
    </script>
</body>

</html>