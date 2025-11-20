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

     <!-- Usuarios -->
     <div class="card" id="usuarios">
        <h2>Gestión de Usuarios</h2>
        <p>Administra los usuarios registrados en el sistema.</p>
        <table>
            <tr>
                <th>ID Usuario</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            <tr>
                <td>001</td>
                <td>Juan Pérez</td>
                <td>juan@example.com</td>
                <td>Activo</td>
                <td><button>Editar</button> <button>Eliminar</button></td>
            </tr>
            <tr>
                <td>002</td>
                <td>María López</td>
                <td>maria@example.com</td>
                <td>Inactivo</td>
                <td><button>Editar</button> <button>Eliminar</button></td>
            </tr>
        </table>
    </div>
</div>
    
</body>
</html>