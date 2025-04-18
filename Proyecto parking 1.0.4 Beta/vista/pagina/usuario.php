<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .close-btn {
            color: #aaa;
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
let usuarioActual; // Variable para almacenar el ID del usuario actual

function mostrarModal(id) {
    usuarioActual = id;

    // Obtener los valores actuales del usuario
    const nombre = document.getElementById(`nombre-${id}`).innerText;
    const email = document.getElementById(`email-${id}`).innerText;
    const estado = document.getElementById(`estado-${id}`).innerText;

    // Rellenar el formulario del modal con los valores actuales
    document.getElementById("nombre").value = nombre;
    document.getElementById("email").value = email;
    document.getElementById("estado").value = estado;

    // Mostrar el modal
    document.getElementById("modal").style.display = "flex";
}

function cerrarModal() {
    document.getElementById("modal").style.display = "none";
}

function guardarCambios(event) {
    event.preventDefault(); // Prevenir la recarga de la página

    // Obtener los valores actualizados del formulario
    const nuevoNombre = document.getElementById("nombre").value;
    const nuevoEmail = document.getElementById("email").value;
    const nuevoEstado = document.getElementById("estado").value;

    // Validar el formulario antes de proceder
    if (!document.getElementById("form-edicion").checkValidity()) {
        alert("Por favor, completa correctamente los campos.");
        return;
    }

    // Actualizar los valores en la tabla
    document.getElementById(`nombre-${usuarioActual}`).innerText = nuevoNombre;
    document.getElementById(`email-${usuarioActual}`).innerText = nuevoEmail;
    document.getElementById(`estado-${usuarioActual}`).innerText = nuevoEstado;

    // Cerrar el modal
    cerrarModal();
}

// Función para eliminar un usuario
function eliminarUsuario(id) {
    // Confirmación antes de eliminar
    if (confirm(`¿Estás seguro de que quieres eliminar al usuario con ID ${id}?`)) {
        // Seleccionar la fila correspondiente y eliminarla
        const fila = document.getElementById(`fila-${id}`);
        if (fila) {
            fila.remove();
            alert(`Usuario con ID ${id} eliminado.`);
        } else {
            alert("Error: No se pudo encontrar la fila para eliminar.");
        }
    }
}

</script>

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

</head>
<body>
    
    <!-- Barra lateral de navegación -->
    <div class="sidebar">
        <h2><i class="titulo-sidebar"></i> Refugio Rodante</h2>
        <hr>
        <a href="index.php?pagina=admin" ><i class="bi bi-house-door"></i> Inicio</a>
        <a href="index.php?pagina=usuario" class="active"><i class="bi bi-people"></i> Usuarios</a>
        <a href="index.php?pagina=reserva"><i class="bi bi-calendar-check"></i> Reservas</a>
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

        <!-- Usuarios -->
        <div class="card" id="usuarios">
            <h2>Gestión de Usuarios</h2>
            <p>Administra los usuarios registrados en el sistema.</p>
            <table border="1">
                <tr>
                    <th>ID Usuario</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                <tr id="fila-001">
                    <td>001</td>
                    <td id="nombre-001">Juan Pérez</td>
                    <td id="email-001">juan@example.com</td>
                    <td id="estado-001">Activo</td>
                    <td>
                        <button onclick="mostrarModal('001')">Editar</button>
                        <button onclick="eliminarUsuario('001')">Eliminar</button>
                    </td>
                </tr>
                <tr id="fila-002">
                    <td>002</td>
                    <td id="nombre-002">Jose Campillo</td>
                    <td id="email-002">josecampi@example.com</td>
                    <td id="estado-002">Inactivo</td>
                    <td>
                        <button onclick="mostrarModal('002')">Editar</button>
                        <button onclick="eliminarUsuario('002')">Eliminar</button>
                    </td>
                </tr>
                <tr id="fila-003">
                    <td>003</td>
                    <td id="nombre-003">María López</td>
                    <td id="email-003">maria@example.com</td>
                    <td id="estado-003">Inactivo</td>
                    <td>
                        <button onclick="mostrarModal('003')">Editar</button>
                        <button onclick="eliminarUsuario('003')">Eliminar</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>

<!-- Modal de edición -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="cerrarModal()">&times;</span>
        <h2>Editar Usuario</h2>
        <form id="form-edicion" onsubmit="guardarCambios(event)">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$" title="Por favor, introduce un email válido.">
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <select id="estado" name="estado" required>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>
            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</div>



</body>
</html>
