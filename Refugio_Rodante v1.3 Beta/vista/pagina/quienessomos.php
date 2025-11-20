<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiénes Somos - Refugio Rodante</title>
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="vista/css/quienessomos.css">
    <link rel="stylesheet" href="vista/css/index.css">
    <style>
        p {
            color: black;
        }
    </style>

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



    <!-- ______________________________________________________ -->


    <div class="historia">
        <div class="image">
            <!-- Reemplaza 'imagen.jpg' con la imagen del parqueadero -->
            <img src="historia.png" alt="Parqueadero">
        </div>
        <div class="text">
        <?php
// Detecta la página actual desde la URL
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 'quienessomos';
?>

<nav>
    <a href="index.php?pagina=quienessomos" class="<?= ($pagina == 'quienessomos') ? 'activo' : '' ?>">Historia</a> |
    <a href="index.php?pagina=proposito" class="<?= ($pagina == 'proposito') ? 'activo' : '' ?>">Propósito</a> |
    <a href="index.php?pagina=politicas" class="<?= ($pagina == 'politicas') ? 'activo' : '' ?>">Políticas de calidad</a> |
    <a href="index.php?pagina=sgc" class="<?= ($pagina == 'sgc') ? 'activo' : '' ?>">SGC</a> |
</nav>





            <div class="contenedor">
                <h1>Somos la compañía colombiana líder en la industria de estacionamientos desde 1978</h1>

                <p>
                    Por más de 40 años hemos consolidado nuestro crecimiento en segmentos de la economía dentro de los cuales
                    se encuentran Hospitales, Universidades, Clínicas, Grandes Superficies, Centros Comerciales y Centros Empresariales,
                    ubicados en Bogotá, Medellín, Cartagena, Cúcuta, Santa Marta, Barranquilla, Villavicencio, Pereira y Cali.
                </p>

                <!-- Imagen en el centro -->
                <div class="logotipo">
                    <center> <img src="logo park.jfif" alt="Icono Parqueadero"></center>
                </div>

                <p>
                    Actualmente contribuimos a la movilidad de estas ciudades con una oferta que supera los 15.000 cupos de parqueo,
                    dotados de moderna tecnología, para brindar un servicio seguro y de calidad en la red de parqueaderos más amplia del país,
                    donde tenemos la oportunidad de ofrecer un portafolio de productos y servicios diseñados para suplir las necesidades de nuestros clientes.
                </p>
            </div>

        </div>
    </div>























    <!-- ==============================================FOOTER============================================0 -->

    <style>
        .logo img {
            transform: scale(1.5);
            margin-bottom: 20px;
            margin: 20px;
            border-radius: 5px;
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