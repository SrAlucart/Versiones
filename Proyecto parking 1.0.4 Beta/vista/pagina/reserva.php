<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Reservas</title>
    <link rel="stylesheet" href="vista/css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    
    <style>
      /* Estilos para el modal */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: #fff; /* Fondo blanco */
    padding: 20px;
    border-radius: 8px;
    width: 400px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
   
}

.close-btn {
   
    float: right;
    font-size: 20px;
    font-weight: bold;
    cursor: pointer;
}

.close-btn:hover {
    color: red;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input, .form-group select {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    border-radius: 5px;
}

button {
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    opacity: 0.9;
}


    </style>
    <script>
        let reservaIdActual = null; // ID de la reserva que se está editando

        // Mostrar el modal con los datos actuales de la reserva
        function mostrarModal(id, usuario, placa, fecha, estado) {
            reservaIdActual = id;
            document.getElementById('usuario').value = usuario;
            document.getElementById('placa').value = placa;
            document.getElementById('fecha').value = fecha;
            document.getElementById('estado').value = estado;
            document.getElementById('modal').style.display = 'flex';
        }

        // Ocultar el modal
        function cerrarModal() {
            document.getElementById('modal').style.display = 'none';
        }

        // Guardar los cambios
        function guardarCambios(event) {
            event.preventDefault();

            const usuario = document.getElementById('usuario').value;
            const placa = document.getElementById('placa').value;
            const fecha = document.getElementById('fecha').value;
            const estado = document.getElementById('estado').value;

            // Enviar datos al servidor
            fetch('procesar_reserva.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    accion: 'editar',
                    id: reservaIdActual,
                    usuario: usuario,
                    placa: placa,
                    fecha: fecha,
                    estado: estado
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.exito) {
                    alert('Reserva actualizada con éxito.');
                    location.reload();
                } else {
                    alert('Error al actualizar la reserva.');
                }
            });

            cerrarModal();
        }
    </script>
</head>
<body>

    <!-- Barra lateral de navegación -->
    <div class="sidebar">
        <h2><i class="titulo-sidebar"></i> Refugio Rodante</h2>
        <hr>
        <a href="index.php?pagina=admin" ><i class="bi bi-house-door"></i> Inicio</a>
        <a href="index.php?pagina=usuario"><i class="bi bi-people"></i> Usuarios</a>
        <a href="index.php?pagina=reserva" class="active"><i class="bi bi-calendar-check"></i> Reservas</a>
        <a href="index.php?pagina=configuracion"><i class="bi bi-gear"></i> Configuración</a>
        <a href="index.php?pagina=cerrarsesion"><i class="bi bi-box-arrow-right"></i> Cerrar Sesión</a>
    
    <div class="bottom-divider"></div>
        
        <!-- Perfil de usuario -->
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
                    <td>
                        <button onclick="mostrarModal('R001', 'Juan Pérez', 'ABC123', '2024-10-28', 'Activa')">Editar</button>
                        <button onclick="cancelarReserva('R001')">Cancelar</button>
                    </td>
                </tr>
                <tr>
                    <td>R002</td>
                    <td>María López</td>
                    <td>XYZ789</td>
                    <td>2024-10-29</td>
                    <td>Pendiente</td>
                    <td>
                        <button onclick="mostrarModal('R002', 'María López', 'XYZ789', '2024-10-29', 'Pendiente')">Editar</button>
                        <button onclick="cancelarReserva('R002')">Cancelar</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Modal de edición -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="cerrarModal()">&times;</span>
            <h2>Editar Reserva</h2>
            <form id="form-edicion" onsubmit="guardarCambios(event)">
                <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" required>
                </div>
                <div class="form-group">
                    <label for="placa">Placa Vehículo:</label>
                    <input type="text" id="placa" name="placa" required>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha" name="fecha" required>
                </div>
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select id="estado" name="estado" required>
                        <option value="Activa">Activa</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Cancelada">Cancelada</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit">Guardar Cambios</button>
                </div>
            </form>
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
