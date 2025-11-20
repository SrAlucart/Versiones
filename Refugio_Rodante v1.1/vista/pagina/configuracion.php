<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>configuracion</title>
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

       <!-- Configuración -->
       <div class="card" id="configuracion">
        <h2>Configuración</h2>
        <p>Ajustes generales del sistema de parqueadero.</p>
        <table>
            <tr>
                <th>Ajuste</th>
                <th>Valor</th>
                <th>Acción</th>
            </tr>
            <tr>
                <td>Tarifa por Hora</td>
                <td>$5.00</td>
                <td><button>Editar</button></td>
            </tr>
            <tr>
                <td>Horario de Atención</td>
                <td>7:00 AM - 9:00 PM</td>
                <td><button>Editar</button></td>
            </tr>
        </table>
    </div>
</div>
    
</body>
</html>