<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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


     <!-- Reservas -->
     <div class="card" id="reservas">
        <h2>Gestión de Reservas</h2>
        <p>Administra todas las reservas de parqueadero activas y pendientes.</p>
        <table>
            <tr>
                <th>ID Reserva</th>
                <th>Usuario</th>
                <th>Placa Vehículo</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            <tr>
                <td>R001</td>
                <td>Juan Pérez</td>
                <td>ABC123</td>
                <td>2024-10-28</td>
                <td>Activa</td>
                <td><button>Editar</button> <button>Cancelar</button></td>
            </tr>
            <tr>
                <td>R002</td>
                <td>María López</td>
                <td>XYZ789</td>
                <td>2024-10-29</td>
                <td>Pendiente</td>
                <td><button>Editar</button> <button>Cancelar</button></td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>