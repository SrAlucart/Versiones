<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiénes Somos - Refugio Rodante</title>
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="vista/css/proposito.css">
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
            <img src="proposito.png" alt="Parqueadero">
        </div>
        <div class="text">
        <?php $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 'proposito';
?>

<nav>
    <a href="index.php?pagina=quienessomos" class="<?= ($pagina == 'quienessomos') ? 'activo' : '' ?>">Historia</a> |
    <a href="index.php?pagina=proposito" class="<?= ($pagina == 'proposito') ? 'activo' : '' ?>">Propósito</a> |
    <a href="index.php?pagina=politicas" class="<?= ($pagina == 'politicas') ? 'activo' : '' ?>">Políticas de calidad</a> |
    <a href="index.php?pagina=sgc" class="<?= ($pagina == 'sgc') ? 'activo' : '' ?>">SGC</a> |
</nav>


<div class="valores">
    <h2>Refugio Rodante cerca de ti, cuidando lo que valoras.</h2>
    <p class="subtitulo">Tenemos una cobertura de calidad con una experiencia memorablemente positiva.</p>

    <ul class="lista-valores">
        <li><span class="icono">✔</span> <strong>Respeto:</strong> En Parking todos son bienvenidos</li> 
        <li><span class="icono">✔</span> <strong>Lealtad:</strong> Estamos comprometidos con nuestros clientes</li>
        <li><span class="icono">✔</span> <strong>Integridad:</strong> Hacemos lo que prometemos y hacemos lo correcto</li>
        <li><span class="icono">✔</span> <strong>Disciplina:</strong> La constancia nos ha permitido entregar más de 40 años de servicio</li>
        <li><span class="icono">✔</span> <strong>Compromiso:</strong> Damos lo mejor de nosotros, ya contamos con más de 180 parqueaderos</li>
        <li><span class="icono">✔</span> <strong>Confianza:</strong> La tranquilidad de contar con un equipo de expertos</li>
    </ul>
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