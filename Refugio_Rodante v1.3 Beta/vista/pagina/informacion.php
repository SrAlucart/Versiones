<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Más Información - Refugio Rodante</title>
    <link rel="stylesheet" href="vista/css/informacion.css">
    <link rel="stylesheet" href="vista/css/index.css">

    <title>Información</title>
</head>

<body>
    <header>
        <div class="left-side">
            <a href=""> <img src="logo park.jfif" alt="Logo"> </a>
        </div>
        <div class="right-side">
            <div class="nav-link-wrapper"> <a href="index.php?pagina=inde">Inicio</a> </div>
            <div class="nav-link-wrapper"> <a href="index.php?pagina=informacion">Más información</a> </div>
            <div class="nav-link-wrapper"> <a href="index.php?pagina=quienessomos">Quienes Somos</a> </div>
            <div class="nav-link-wrapper"> <a href="index.php?pagina=login">Iniciar Sesión</a> </div>
        </div>
    </header>





    <style>
        h1 {
            text-align: center;
            margin-top: 50px;
            color: black;
            font-size: 36px;
        }
    </style>

    <div class="informacion">
        <div class="info">
            <h2>¿Necesitas algo?</h2>
            <p>Mantengamos el contacto.<br> Escríbenos y te responderemos tan pronto como sea posible.</p>
            <img src="soporte.png" alt="Soporte">
        </div>

        <div class="formulario">
            <form action="#">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" placeholder="Escribe tu nombre">

                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" placeholder="Escribe tu teléfono">

                <label for="correo">Correo electrónico</label>
                <input type="email" id="correo" placeholder="Escribe tu correo electrónico">

                <label for="categoria">Categoría</label>
                <select id="categoria">
                    <option value="">Select...</option>
                    <option value="soporte">Soporte</option>
                    <option value="consulta">Consulta</option>
                    <option value="otro">Otro</option>
                </select>

                <label for="mensaje">Tu mensaje</label>
                <textarea id="mensaje" placeholder="Escribe tu mensaje"></textarea>

                <div class="checkbox-container">
                    <input type="checkbox" id="politicas">
                    <label for="politicas">
                        Acepta nuestras <a href="#">políticas de tratamiento de datos</a>
                    </label>
                </div>
                <br>

                <button type="submit">Enviar mensaje</button>
            </form>
        </div>
    </div>




    <!-- ==============================================FOOTER============================================0 -->

    <style>
        .logo img {
            transform: scale(1.5);
            /* 1.5 veces el tamaño original */
            margin-bottom: 20px;
            margin: 20px;
        }
    </style>

    <footer class="footer">
        <div class="container">
            <div class="logo">
                <img src="logo park.jfif" alt="Parking Logo">
            </div>
            <div class="content">
                <div class="ubicacion">
                    <h3>Ubicación</h3>
                    <p><img src="maps.png" alt="Ubicación" class="icon"> Cra 14 No. 89-48 (Of. 202)</p>
                    <p><img src="maps.png" alt="Ciudad" class="icon"> Bogotá - Colombia</p>
                </div>

                <div class="contact">
                    <h3>Contacto</h3>
                    <p><img src="celular.png" alt="PBX" class="icon"> <span> PBX: </span> +57 (1) 519 00 77</p>
                    <p><img src="celular.png" alt="Servicio al cliente" class="icon"> <span>Servicio al cliente:</span> +57 323 449 9666</p>
                    <p><img src="correo.png" alt="Correo" class="icon"> <span>Correo:</span> <a href="mailto:servicioalcliente@parking.net.co">servicioalcliente@gmail.com </a></p>
                </div>

                <div class="legal">
                    <h3>Legal</h3>
                    <p><img src="icono doc.png" class="icon"> <a href="#">Término y condiciones politica de privacidad </a></p>
                    <p><img src="icono doc.png" alt="Superintendencia" class="icon"> <a href="#">Superintendencia de Industria y Comercio</a></p>
                    <p><img src="icono doc.png" alt="Cumplimiento" class="icon"> <a href="#">Cumplimiento</a></p>
                </div>

                <div class="social">
                    <a href="https://web.facebook.com/gaming/play/?store_visit_source=gaming_tab"><img src="facebook.png" alt="Facebook"></a>
                    <a href="https://www.instagram.com/"><img src="instagram.png" alt="Instagram"></a>
                </div>
            </div>

            <div class="copyright">
                <p>©2020 Parking - Todos los derechos reservados</p>
            </div>
        </div>
    </footer>




</body>

</html>