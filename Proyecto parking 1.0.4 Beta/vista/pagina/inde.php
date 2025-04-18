<!DOCTYPE html>
<html lang="es">

<head>
<!-- https://sweetalert2.github.io/   documentacion-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Inicio </title>
    <link rel="stylesheet" href="vista/css/index.css">
    <link rel="shortcut icon" href="https://cdn.sstatic.net/Sites/es/img/favicon.ico?v=a8def514be8a"> 
</head>
<style>
    .logo img {
        transform: scale(1.5);
        margin-bottom: 20px;
        margin: 20px;
    }

    .hero {
        position: relative;
        width: 100%;
        height: 500px;
        /* Ajusta la altura según sea necesario */
        background-image: url('img/principal.png');
        /* Reemplaza con la ruta de tu imagen */
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        /* Asegura que el texto sea visible */
    }

    .hero::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        /* Agrega un fondo oscuro para mejorar la visibilidad del texto */
    }

    .hero-content {
        position: relative;
        z-index: 1;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        color: black;

        text-decoration: none;
        font-weight: bold;
        border-radius: 5px;
        transition: 0.3s;
    }


    .btn:hover {
        background: #0056b3;
    }
</style>




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


    <section class="hero">
        <div class="hero-content">
            <h1 style="color: white;">¡Protege tu vehículo con nosotros!</h1>
            <p style="color: white;">Ofrecemos el mejor servicio de parqueadero, seguro, económico y a tu alcance.</p>
            <a href="index.php?pagina=login" class="btn">Reserva tu Espacio</a>
        </div>
    </section>

    <br><br><br><br>


    <!-- ==============================================FOOTER============================================0 -->
    <footer class="footer">
        <div class="container">
            <div class="logo">
                <img src="img/refugiorodante2.png" alt="Parking Logo">
            </div>
            
            <div class="content">
                <div class="ubicacion">
                    <h3>Ubicación</h3>
                    <p><img src="img/maps.png" alt="Ubicación" class="icon"> Cra 14 No. 89-48 (Of. 202)</p>
                    <p><img src="img/maps.png" alt="Ciudad" class="icon"> Medellin - Colombia</p>
                </div>

                <div class="contact">
                    <h3>Contacto</h3>
                    <p><img src="img/celular.png" alt="PBX" class="icon"> <span> PBX: </span> +57 (1) 519 00 77</p>
                    <p><img src="img/celular.png" alt="Servicio al cliente" class="icon"> <span>Servicio al cliente:</span> +57 323 449 9666</p>
                    <p><img src="img/correo.png" alt="Correo" class="icon"> <span>Correo:</span> <a href="mailto:servicioalcliente@parking.net.co">servicioalcliente@gmail.com </a></p>
                </div>

                <div class="legal">
                    <h3>Legal</h3>
                    <p><img src="img/icono doc.png" class="icon"> <a href="index.php?pagina=termino-y-condiciones">Término y condiciones politica de privacidad </a></p>
                    <p><img src="img/icono doc.png" alt="Cumplimiento" class="icon"> <a href="#">Cumplimiento</a></p>
                </div>

                <div class="social">
                    <a href="https://web.facebook.com/gaming/play/?store_visit_source=gaming_tab"><img src="img/facebook.png" alt="Facebook"></a>
                    <a href="https://www.instagram.com/"><img src="img/instagram.png" alt="Instagram"></a>
                </div>
            </div>

            <div class="copyright">
                <p style="color: black;">©2020 Parking - Todos los derechos reservados</p>
            </div>
        </div>
    </footer>



</body>

</html>