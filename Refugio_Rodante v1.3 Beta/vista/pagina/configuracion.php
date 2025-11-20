<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración</title>
    <link rel="stylesheet" href="vista/css/admin.css">
    <style>
        /* Estilos generales de la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
        }

        th {
            
            color: black;
        }

        tr:nth-child(even) {
            background-color:rgb(0, 0, 0);
        }

        tr:hover {
            background-color: #ddd;
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

        

        /* Estilos del modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
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

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
    </style>
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

    <!-- Contenido principal -->
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
                    <td contenteditable="false">$5.00</td>
                    <td><button onclick="editarFila(this)">Editar</button></td>
                </tr>
                <tr>
                    <td>Horario de Atención</td>
                    <td contenteditable="false">7:00 AM - 9:00 PM</td>
                    <td><button onclick="editarFila(this)">Editar</button></td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="cerrarModal()">&times;</span>
            <h2>Editar Configuración</h2>
            <form id="form-edicion" onsubmit="guardarCambios(event)">
                <div class="form-group">
                    <label for="valor">Nuevo Valor:</label>
                    <input type="text" id="valor" name="valor" required>
                </div>
                <div class="form-group">
                    <button type="submit">Guardar Cambio </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let celdaActual = null;

        function editarFila(boton) {
            // Encuentra la celda que se va a editar
            let fila = boton.parentElement.parentElement;
            celdaActual = fila.cells[1];
            document.getElementById('valor').value = celdaActual.textContent;

            // Mostrar el modal
            document.getElementById('modal').style.display = 'flex';
        }

        function cerrarModal() {
            document.getElementById('modal').style.display = 'none';
        }

        function guardarCambios(event) {
            event.preventDefault();
            let nuevoValor = document.getElementById('valor').value;
            celdaActual.textContent = nuevoValor;
            alert("Valor actualizado: " + nuevoValor);
            cerrarModal();
        }
    </script>

</body>
</html>
