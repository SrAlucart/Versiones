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

</head>

<body>
    <!-- Verifica si el usuario está logueado -->
    <?php if ($isLoggedIn): ?>
        <div class="logout">
            <form method="POST" id="logoutForm">
                <input type="hidden" name="cerrarSesion" value="1">
                <input type="button" value="Cerrar Sesión" class="btn-logout"
                    onclick="confirmarCerrarSesion()"
                    style="background-color: rgb(168, 228, 252); font-size: 17px; color: black; margin-top: 30px; border-radius: 15px; padding: 8px; margin-left: 1230px;">
            </form>
        </div>
    <?php else: ?>
        <div class="login">
            <a href="index.php?pagina=login" class="btn-login">Iniciar Sesión</a>
        </div>
    <?php endif; ?>

    <!-- Incluir SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmarCerrarSesion() {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "Se cerrará tu sesión actual.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, cerrar sesión",
                cancelButtonText: "No, cancelar",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("logoutForm").submit(); // Enviar el formulario
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: "Cancelado",
                        text: "Tu sesión sigue activa.",
                        icon: "error"
                    });
                }
            });
        }
    </script>


    <main>
        <section class="parqueadero-disponible">
            <h1>Zona de Parqueaderos Disponibles</h1>

            <div class="grid-parqueaderos">
                <div class="parqueadero">
                    <img src="img/logo park.jfif" alt="Parqueadero 1">
                    <p>Parqueadero la bomba - Ubicación: Calle 81 </p>
                    <p>Espacios disponibles: 10</p>
                    <button class="ver-mas1">Ver mas</button>
                </div>
                <div class="parqueadero">
                    <img src="img/logo park.jfif" alt="Parqueadero 2">
                    <p>Parqueadero la loma - Ubicación: Calle 72</p>
                    <p>Espacios disponibles: 5</p>
                    <button class="ver-mas2">Ver mas</button>
                </div>
                <div class="parqueadero">
                    <img src="img/logo park.jfif" alt="Parqueadero 3">
                    <p>Parqueadero star - Ubicación: Plaza mayor</p>
                    <p>Espacios disponibles: 7 </p>
                    <button class="ver-mas3">Ver mas</button>
                </div>
            </div>
        </section>
    </main>


    <style>
        .ver-mas1 {
            background-color: #33595e;
            padding: 10px;
            border-radius: 5px;
            color: white;
            font-size: 15px;
            margin-left: 300px;
            margin-top: 30px;
        }

        .ver-mas2 {
            background-color: #33595e;
            padding: 10px;
            border-radius: 5px;
            color: white;
            font-size: 15px;
            margin-left: 300px;
            margin-top: 30px;
        }
        .ver-mas3 {
            background-color: #33595e;
            padding: 10px;
            border-radius: 5px;
            color: white;
            font-size: 15px;
            margin-left: 300px;
            margin-top: 30px;
        }

    </style>
</body>

</html>








<?php
// Llamar a la función de cierre de sesión del controlador si se ha presionado el botón
if (isset($_POST['cerrarSesion'])) {
    controladorformularios::ctrCerrarSesion();
}
?>

<style>




</style>