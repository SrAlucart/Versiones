<?php
session_start();
require_once "controlador/controlador.formulario.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
   
    <link rel="stylesheet" href="vista/css/login.css">



</head>

<body>
    <header>
    <div class="logo-container"> 
        <div class="left-side">
            <a href=""> <img src="img/refugiorodante2.png" alt="Logo"> </a>
        </div>
        <div class="right-side"> 
            <h1>REFUGIO RODANTE</h1>
        </div>
        </div>
        
        <div class="right-side">
            <div class="nav-link-wrapper"> <a href="index.php?pagina=inde">Inicio</a> </div>
            <div class="nav-link-wrapper"> <a href="index.php?pagina=informacion">Más información</a> </div>
            <div class="nav-link-wrapper"> <a href="index.php?pagina=quienessomos">Quienes Somos</a> </div>
            <div class="nav-link-wrapper"> <a href="index.php?pagina=login">Iniciar Sesión</a> </div>
        </div>
    </header>

    <div class="container">
        <!-- Formulario de Inicio de Sesión -->
        <div class="form-container sign-in">
        <form method="post" action="" class="login-form">
        <h1>Iniciar Sesión</h1>
        <span>Ingresa tus credenciales para acceder</span>

        <input type="email" name="Email" placeholder="Email" required>
        <input type="password" name="Contrasena" placeholder="Contraseña" required>

        <a href="#" class="fp">¿Olvidaste tu contraseña?</a>
        <button type="submit" name="btnLogin">Iniciar Sesión</button>
    </form>

    <?php
if (isset($_POST['btnLogin'])) {
    // Verificar que los datos llegan correctamente
    $email = isset($_POST["Email"]) ? trim($_POST["Email"]) : "";
    $password = isset($_POST["Contrasena"]) ? $_POST["Contrasena"] : "";

    // TEMPORAL: Muestra los valores en consola para depuración
    echo "<script>console.log('Email: " . $email . "');</script>";
    echo "<script>console.log('Contraseña: " . $password . "');</script>";

    // Llamar al controlador
    $resultado = controladorformularios::ctrIniciarSesion();

    if ($resultado === "error") {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Email o contraseña incorrectos'
                
            });
        </script>";
    }
}
?>


  
        </div>


        <!-- Formulario de Registro -->
        <div class="form-container sign-up">
            <form method="POST" class="registro-form">
                <h1>Crear Cuenta</h1>
                <span>Completa tus datos para registrarte</span>

                <div class="tipo-usuario-container">
                    <label for="tipoUsuario">Tipo de Usuario:</label>
                    <select id="tipoUsuario" name="tipoUsuario">
                        <option value="usuario">Usuario</option>
                        <option value="admin">Administrador</option>
                    </select>
                </div>
                <input type="text" name="Nombre" placeholder="Nombre" required>
                <input type="text" name="Apellido" placeholder="Apellido" required>
                <input type="email" name="Email" placeholder="Email" required>
                <input type="password" name="Contrasena" placeholder="Contraseña" required>

                <button type="submit" name="btnregistro">Registrarse</button>



                <?php
                if (isset($_POST['btnregistro'])) {
                    $resultado = controladorformularios::ctrRegistro();



                    if ($resultado === "campos_vacios") {
                        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Todos los campos son obligatorios'
            });
        </script>";
                    } elseif ($resultado === "email_invalido") {
                        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El email no es válido'
            });
        </script>";
                    } elseif ($resultado === "error_permisos") {
                        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Error al crear permisos de administrador'
            });
        </script>";
                    } else {
                        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Registro exitoso',
                text: 'Te has registrado correctamente',
                showConfirmButton: false,
                timer: 2000
            });
        </script>";
                    }
                }
                ?>



            </form>
        </div>
        <!-- Panel de Alternancia -->
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>¡Bienvenido de nuevo!</h1>
                    <p>Ingresa tus datos para acceder a tu cuenta</p>
                    <button class="hidden" id="login">Iniciar Sesión</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>¡Hola, amigo!</h1>
                    <p>Regístrate para comenzar tu experiencia</p>
                    <button class="hidden" id="register">Registrarse</button>
                </div>
            </div>
        </div>
    </div>




    <script src="js/script.js"></script>
</body>

</html>